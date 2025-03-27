<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    //Post::create() を使用してデータを保存していますが、Post モデルで fillable または guarded プロパティが適切に設定した
    protected $fillable = [
        'post',  // フィールド名
        'user_id', // ユーザーID
    ];
}


   