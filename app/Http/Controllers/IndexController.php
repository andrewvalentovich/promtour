<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Excursion;
use App\Models\HowToBook;
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

    /**
     * Show the application about information.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function about()
    {
        $page = About::orderby('id', 'desc')->first();
        return view('about', compact('page'));
    }

    /**
     * Show the application order information.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function how_to_book()
    {
        $page = HowToBook::orderby('id', 'desc')->first();
        return view('how_to_book', compact('page'));
    }
}
