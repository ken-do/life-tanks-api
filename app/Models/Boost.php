<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Tank;
use App\Models\Activity;

class Boost extends Model
{
    public $incrementing = true;
 
        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tank_id', 'activity_id', 'level', 'notes'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

    protected $appends = [
        'tank_name', 'activity_name', 'level_name' 
    ];

    public function getTankNameAttribute(){
        return Tank::whereId($this->attributes['tank_id'])->first()->name;
    }

    public function getActivityNameAttribute(){
        return Activity::whereId($this->attributes['activity_id'])->first()->name;
    }

    public function getLevelNameAttribute(){
        return config('params.boost_levels')[$this->attributes['level']];
    }
}
