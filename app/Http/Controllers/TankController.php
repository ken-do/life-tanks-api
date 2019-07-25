<?php

namespace App\Http\Controllers;
use App\Models\Tank;
use App\Http\Controllers\Traits\CRUDTrait;

use Illuminate\Http\Request;

class TankController extends Controller
{
    use CRUDTrait;
    
    public function __construct()
    {
        $this->model =  '\\App\\Models\\Tank';
    }

}
