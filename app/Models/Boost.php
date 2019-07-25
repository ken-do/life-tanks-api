<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Boost extends Model
{
    public $incrementing = true;
 
        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tank_id', 'activity_id', 'notes'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];
}
