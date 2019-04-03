<?php

namespace App;

use App\Notifications\ResetPasswordNotification;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    public function sendEmailVerificationNotification()
    {
        $this->notify(new \App\Notifications\VerifyEmailJapanese);
    }

    Public function profile()
    {
      return $this->hasOne('App\Profile');
    }

    public function diaries()
    {
        return $this->hasMany('App\Diary');
    }

    public function analyses()
    {
        return $this->hasMany('App\Analysis');
    }

    public function other_answers()
    {
        return $this->hasMany('App\OtherAnswer');
    }

    public function other_questions()
    {
        return $this->hasMany('App\OtherQuestion');
    }

//＿多対多のリレーション
//フォロワーを取得
    public function followers()
    {
        return $this->belongsToMany(self::class, 'followers', 'follows_id', 'user_id')
                    ->withTimestamps();
    }
//自分がフォローしているユーザーを取得
    public function follows()
    {
        return $this->belongsToMany(self::class, 'followers', 'user_id', 'follows_id')
                    ->withTimestamps();
    }

//＿ヘルパ関数
//フォローする
    public function follow($userId)
    {
        $this->follows()->attach($userId);
        return $this;
    }
//アンフォローする
    public function unfollow($userId)
    {
        $this->follows()->detach($userId);
        return $this;
    }
//フォロー中かどうかを返す
    public function isFollowing($userId)
    {
        return (boolean) $this->follows()->where('follows_id', $userId)->first(['id']);
    }
}
