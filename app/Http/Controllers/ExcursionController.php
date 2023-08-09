<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExcursionController extends Controller
{
    public function index()
    {
        return view('excursions');
    }
}
