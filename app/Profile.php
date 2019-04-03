<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $primaryKey = 'user_id';

    protected $guarded = ['user_id'];

    public static $rules = array(
      'name' => 'required',
      'introduction' => 'required'
    );

    Public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function other_questions()
    {
        return $this->hasMany('App\OtherQuestion', 'user_id');
    }

    public function other_answers()
    {
        return $this->hasMany('App\OtherAnswer', 'user_id');
    }


}
