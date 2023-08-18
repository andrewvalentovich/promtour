<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Category;
use App\Models\Company;
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
        $categories = Category::where('type', 1)->get();
        $companies = Company::orderBy('created_at', 'desc')->take(6)->get();

        return view('index', compact('excursions', 'categories', 'companies'));
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
