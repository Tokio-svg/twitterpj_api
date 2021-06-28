<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Carbon\Carbon;

class Post extends Model
{
    use HasFactory;

    protected $guarded = array('id');

    // リレーション設定
    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }
    public function goods()
    {
        return $this->hasMany('App\Models\Good');
    }

    // レコード取得時のcreated_atのフォーマット指定
    // public function getCreatedAtAttribute($date)
    // {
    //     // return Carbon::createFromFormat('Y-m-d H:i:s', $date)->created_at;
    //     return Carbon::parse($date)->format("Y/m/d H:i:s");
    // }
    // public function getUpdatedAtAttribute($date)
    // {
    //     return Carbon::createFromFormat('Y-m-d H:i:s', $date)->timestamps;
    // }
}
