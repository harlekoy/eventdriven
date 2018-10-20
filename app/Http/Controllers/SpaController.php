<?php

namespace App\Http\Controllers;

use App\Http\Controllers\API\v1\Controller;
use Illuminate\Http\Request;

class SpaController extends Controller
{
    public function index()
    {
        return view('index');
    }
}
