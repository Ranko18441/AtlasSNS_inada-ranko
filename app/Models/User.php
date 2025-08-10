<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Auth; 

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'bio', 
        'icon_image',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    //フォローしているユーザー
    public function following()
    {
        return $this->belongsToMany(User::class, 'follows','following_id', 'followed_id');
        
        
    }

    // following_id 私のID  followed_idは相手のID 

    //フォローされているユーザー
    public function followed()
    {
        
        return $this->belongsToMany(User::class, 'follows','followed_id','following_id');
        
    }

    // 各ユーザーがフォローされているか判定する記述
    public function is_following($user_id)
    // このIDを中間テーブルに探しに行く
    {
         return $this->following()->where('followed_id', $user_id)->first(['follows.id']);

        //  whereとかをつかっていても探して終わりになっていた。firstを記載することで一番最初の値をとってきた。
        
                                    // ->where('followed_id', $user->id)
                                    // ->exists();
        
    }
    
}
