<?php

namespace App\Http\Controllers\Authenticated\Calendar\General;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Calendars\General\CalendarView;
use App\Models\Calendars\ReserveSettings;
use App\ReserveSettingUsers;
use App\Models\Calendars\Calendar;
use App\Models\USers\User;
use Auth;
use DB;

class CalendarsController extends Controller
{
    public function show()
    {
        $calendar = new CalendarView(time());
        return view('authenticated.calendar.general.calendar', compact('calendar'));
    }

    public function reserve(Request $request)
    {
        DB::beginTransaction();
        try {
            $getPart = $request->getPart;
            //予約が入っていない日があっても正常に予約できるように修正する。
            // dd($getPart);
            $getDate = $request->getData;
            // dd($getDate);
            $reserveDays = array_filter(array_combine($getDate, $getPart));
            foreach ($reserveDays as $key => $value) {
                $reserve_settings = ReserveSettings::where('setting_reserve', $key)->where('setting_part', $value)->first();
                $reserve_settings->decrement('limit_users');
                $reserve_settings->users()->attach(Auth::id());
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
        }
        return redirect()->route('calendar.general.show', ['user_id' => Auth::id()]);
    }

    public function delete(Request $request)
    {
        $user_id = Auth::user()->id;
        $reserve_setting_id = ReserveSettings::where([
            ['setting_reserve', $request->date],
            ['setting_part', $request->part],
        ])->first();
        dd($reserve_setting_id);
        ReserveSettingUsers::where([
            ['user_id', $user_id],
            ['reserve_setting_id', $reserve_setting_id],
        ])->delete();
        return redirect()->route('calendar.general.show', ['user_id' => Auth::id()]);
    }
}
