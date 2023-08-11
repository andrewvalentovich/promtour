<?php

namespace App\Http\Controllers;

use App\Models\Excursion;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $excursions = Excursion::orderBy('created_at', 'desc')->take(10)->get();
        return view('index', compact('excursions'));
    }
}
