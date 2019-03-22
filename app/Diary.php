<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diary extends Model
{

    protected $guarded = array('id');

    protected $fillable = [
        'title', 'body', 'image_path',
    ];

    public static $rules = array(
      'title' => 'required',
      'body' => 'required'
    );

    public function user()
    {
      return $this->belongsTo('App\User');
    }
}
