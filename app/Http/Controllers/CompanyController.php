<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Excursion;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::orderBy('created_at', 'desc')->get();
        return view('app.company.index', compact('companies'));
    }

    public function detail(string $slug)
    {
        $company = Company::where('slug', $slug)->get()[0];
        return view('app.company.detail', compact('company'));
    }

    public function excursions(string $slug)
    {
        $excursions = Excursion::whereHas('company', function($query) use ($slug){
            $query->where('slug', $slug);
        })->get();
        return view('app.company.excursion', compact('excursions'));
    }
}
