<?php

namespace App\Http\Controllers\Owner;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OwnerController extends Controller
{
    public function index() 
    {
        return view('owner.index');
    }
}
