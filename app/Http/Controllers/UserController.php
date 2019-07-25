<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Http\Controllers\Traits\CRUDTrait;

use Illuminate\Http\Request;

class UserController extends Controller
{
    use CRUDTrait;
    
    public function __construct()
    {
        $this->model =  '\\App\\Models\\User';
    }

}
