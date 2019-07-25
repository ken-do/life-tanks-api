<?php

namespace App\Http\Controllers;
use App\Models\Activity;
use App\Http\Controllers\Traits\CRUDTrait;

use Illuminate\Http\Request;

class ActivityController extends Controller
{
    use CRUDTrait;
    
    public function __construct()
    {
        $this->model =  '\\App\\Models\\Activity';
    }

}
