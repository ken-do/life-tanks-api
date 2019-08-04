<?php

namespace App\Http\Controllers;
use App\Models\Boost;
use App\Models\Activity;
use App\Models\Tank;
use App\Http\Controllers\Traits\CRUDTrait;

use Illuminate\Http\Request;

class BoostController extends Controller
{
    use CRUDTrait;
    
    public function __construct()
    {
        $this->model =  '\\App\\Models\\Boost';
    }

    public function boostTank(Request $request)
    {
        $data = $request->post();
        $activity = null;

        if(!$data['activity_id']){
            $activity = new Activity(['name' => $data['activity_name']]);
            $activity->save();
        } else {
            $activity = Activity::whereId($data['activity_id'])->first();
        }
        
        $level = (int) $data['level'];
        $boost = new $this->model([
            'tank_id' => $data['tank_id'],
            'activity_id' => $activity->id,
            'level' => $level,
            'notes' => $data['notes']
        ]);

        $boost->save();

        $tank = Tank::whereId($data['tank_id'])->first();
        $tank->points = (int) $tank->points + config('params.boost_points')[$data['level']];
        $tank->save();

        return $tank;
    }

}
