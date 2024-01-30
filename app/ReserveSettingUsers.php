<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReserveSettingUsers extends Model
{
    protected $fillable = [
        'user_id','reserve_setting_id',
    ];
      public $timestamps = false; // 追加
}
