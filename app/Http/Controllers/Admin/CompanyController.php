<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Company\UpdateRequest;
use App\Http\Requests\Admin\Company\StoreRequest;
use App\Models\Company;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::orderBy('id', 'desc')->get();
        return view('admin.companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.companies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        Company::create($data);

        return redirect()->route('admin.companies.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        return view('admin.companies.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        return view('admin.companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Company $company)
    {
        $data = $request->validated();

        $company->update($data);

        return redirect()->route('admin.companies.show', compact('company'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        // Удаляем фотографии, принадлежащие данной компании
        foreach ($company->photos() as $photo) {
            $photo->delete();
        }

        $company->delete();
        return redirect()->route('admin.companies.index');
    }
}
