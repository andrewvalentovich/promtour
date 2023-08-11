<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CompanyPhoto\StoreRequest;
use App\Http\Requests\Admin\CompanyPhoto\UpdateRequest;
use App\Models\Company;
use App\Models\CompanyPhoto;
use App\Models\Excursion;
use Illuminate\Support\Facades\Storage;

class CompanyPhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Company $company)
    {
        $photos = $company->photos()->orderBy('id', 'desc')->get();

        return view('admin.company_photos.index', compact('company', 'photos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Company $company)
    {
        return view('admin.company_photos.create', compact('company'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request, Company $company)
    {
        $data = $request->validated();

        // Сохранение картинки в хранилище
        $data['photo'] = Storage::disk('public')->put('/images', $data['photo']);

        $company->photos()->create($data);

        return redirect()->route('admin.companies.photos.index', compact('company'));
    }

    /**
     * Display the specified resource.
     */
    public function show(CompanyPhoto $photo)
    {
        return view('admin.company_photos.show', compact('photo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CompanyPhoto $photo)
    {
        return view('admin.company_photos.edit', compact('photo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, CompanyPhoto $photo)
    {
        $data = $request->validated();

        // Сохранение картинки в хранилище
        if (isset($data['photo'])) {
            $data['photo'] = Storage::disk('public')->put('/images', $data['photo']);
        }

        $photo->update($data);

        $company = Company::find($photo->company_id);

        return redirect()->route('admin.companies.photos.index', compact('company'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CompanyPhoto $photo)
    {
        $company = $photo->company()->get()[0];
        // Отвязываем фото от компании, сохраняем изменения и удаляем фото
        $photo->company()->dissociate();
        $photo->save();
        $photo->delete();

        return redirect()->route('admin.companies.photos.index', compact('company'));
    }
}
