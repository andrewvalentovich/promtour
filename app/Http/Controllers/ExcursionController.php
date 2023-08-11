<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Company;
use App\Models\Excursion;
use Illuminate\Http\Request;

class ExcursionController extends Controller
{
    public function index()
    {
        $excursions = Excursion::orderBy('created_at', 'desc')->get();
        $categories = Category::where('type', 0)->get();
        return view('app.excursion.index', compact('excursions', 'categories'));
    }

    public function detail(string $slug)
    {
        $excursion = Excursion::where('slug', $slug)->get()[0];
        return view('app.excursion.detail', compact('excursion'));
    }
}
