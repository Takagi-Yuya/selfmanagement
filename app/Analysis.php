<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Analysis extends Model
{
    protected $guarded = array('id');

    protected $fillable = [
        'question', 'answer', 'reason'
    ];

    public static $rules = array(
        'question' => 'required',
        'answer' => 'required',
        'reason' => 'required'
    );

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
