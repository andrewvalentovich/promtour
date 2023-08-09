<?php

namespace App\Http\Controllers;

use App\Models\Excursion;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index()
    {
        $excursions = Excursion::orderBy('created_at', 'desc')->get();
        return view('catalog', compact('excursions'));
    }
}
