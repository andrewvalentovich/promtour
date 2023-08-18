<?php

namespace App\Http\Controllers;

use App\Http\Filters\ExcursionFilter;
use App\Http\Requests\App\Excursion\FilterRequest;
use App\Models\Category;
use App\Models\Company;
use App\Models\Excursion;
use Illuminate\Http\Request;

class ExcursionController extends Controller
{
    public function index(FilterRequest $request)
    {
        $data = $request->validated();
        $filter = app()->make(ExcursionFilter::class, ['queryParams' => $data]);
        $excursions = Excursion::filter($filter)->with('photos')->with('category')->orderBy('created_at', 'desc')->get();

        $age_limit_arr = [3, 6, 12, 16, 18];
        $categories = Category::where('type', 0)->get();
        return view('app.excursion.index', compact('excursions', 'categories', 'age_limit_arr'));
    }

    public function detail(string $slug)
    {
        $excursion = Excursion::where('slug', $slug)->get()[0];
        return view('app.excursion.detail', compact('excursion'));
    }
}
