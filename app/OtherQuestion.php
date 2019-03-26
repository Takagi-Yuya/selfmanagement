<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OtherQuestion extends Model
{

    protected $guarded = array('id');

    protected $fillable = [
        'question', 'user_id'
    ];

    public static $rules = array(
        'question' => 'required'
    );

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function profile()
    {
        return $this->belongsTo('App\Profile', 'user_id');
    }

    public function other_answers()
    {
        return $this->hasmany('App\OtherAnswer', 'question_id');
    }

}
