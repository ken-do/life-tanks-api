<?php

namespace App\Http\Controllers;
use App\Models\Tag;
use App\Http\Controllers\Traits\CRUDTrait;

use Illuminate\Http\Request;

class TagController extends Controller
{
    use CRUDTrait;
    
    public function __construct()
    {
        $this->model =  '\\App\\Models\\Tag';
    }

}
