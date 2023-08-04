<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Photo\StoreRequest;
use App\Http\Requests\Admin\Photo\UpdateRequest;
use App\Models\Company;
use App\Models\Photo;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Company $company)
    {
        $photos = $company->photos()->orderBy('id', 'desc')->get();

        return view('admin.photos.index', compact('company', 'photos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Company $company)
    {
        return view('admin.photos.create', compact('company'));
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
    public function show(Photo $photo)
    {
        return view('admin.photos.show', compact('photo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Photo $photo)
    {
        return view('admin.photos.edit', compact('photo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Photo $photo)
    {
        $data = $request->validated();

        // Сохранение картинки в хранилище
        if (isset($data['photo'])) {
            $data['photo'] = Storage::disk('public')->put('/images', $data['photo']);
        }

        $photo->update($data);

        return redirect()->route('admin.photos.show', compact('photo'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Photo $photo)
    {
        $company = $photo->company()->get()[0];
        // Отвязываем фото от компании, сохраняем изменения и удаляем фото
        $photo->company()->dissociate();
        $photo->save();
        $photo->delete();

        return redirect()->route('admin.companies.photos.index', compact('company'));
    }
}
