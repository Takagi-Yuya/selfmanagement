<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $primaryKey = 'user_id';

    protected $guarded = ['user_id'];

    public static $rules = array(
        'item_a' => 'required',
        'item_b' => 'required',
        'item_c' => 'required',
        'value_before_a' => 'required',
        'value_before_b' => 'required',
        'value_before_c' => 'required',
        'value_after_a' => 'required',
        'value_after_b' => 'required',
        'value_after_c' => 'required'
    );

}
