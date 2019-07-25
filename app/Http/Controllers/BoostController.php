<?php

namespace App\Http\Controllers;
use App\Models\Boost;
use App\Http\Controllers\Traits\CRUDTrait;

use Illuminate\Http\Request;

class BoostController extends Controller
{
    use CRUDTrait;
    
    public function __construct()
    {
        $this->model =  '\\App\\Models\\Boost';
    }

}
