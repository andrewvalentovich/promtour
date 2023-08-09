<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Excursion;
use Illuminate\Http\Request;

class ExcursionController extends Controller
{
    public function index()
    {
        $excursions = Excursion::orderBy('created_at', 'desc')->get();
        return view('app.excursion.index', compact('excursions'));
    }

    public function detail(string $slug)
    {
        $excursion = Excursion::where('slug', $slug)->get()[0];
        return view('app.excursion.detail', compact('excursion'));
    }
}
