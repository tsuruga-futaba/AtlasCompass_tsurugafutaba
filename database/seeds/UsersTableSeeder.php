<?php

use Illuminate\Database\Seeder;
use App\Models\Users\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['over_name'=>'佐藤',
            'under_name'=>'太郎',
            'over_name_kana'=>'サトウ',
            'under_name_kana'=>'タロウ',
            'mail_address'=>'satoutarou@com.com',
            'sex'=>'1',
            'birth_day'=>'2003_10_12',
            'role'=>'1',
            'password'=>'satoutarou20031012',
            'remember_token'=>'123456',]
        ]);

    }
}
