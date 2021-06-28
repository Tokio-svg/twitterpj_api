<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $guarded = array('id');

    // レコード取得時のcreated_atのフォーマット指定
    public function getCreatedAtAttribute($date)
    {
        return date('Y-m-d H:i:s', strtotime($date));
    }
}
