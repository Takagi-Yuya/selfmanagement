<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OtherAnswer extends Model
{

    protected $guarded = array('id');

    protected $fillable = [
        'answer', 'reason', 'user_id'
    ];

    public static $rules = array(
        'answer' => 'required',
        'reason' => 'required'
    );

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function other_questions()
    {
        return $this->belongsTo('App\OtherQuestion', 'question_id');
    }

}
