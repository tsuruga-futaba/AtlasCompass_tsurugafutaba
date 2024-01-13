<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostSubCategory extends Model
{
    protected $fillable = [
        'post_id','sub_category_id',
    ];
      public $timestamps = false; // 追加
}
