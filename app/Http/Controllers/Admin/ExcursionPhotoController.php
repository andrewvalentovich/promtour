<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ExcursionPhoto\StoreRequest;
use App\Http\Requests\Admin\ExcursionPhoto\UpdateRequest;
use App\Models\Excursion;
use App\Models\ExcursionPhoto;
use Illuminate\Support\Facades\Storage;

class ExcursionPhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Excursion $excursion)
    {
        $photos = $excursion->photos()->orderBy('id', 'desc')->get();

        return view('admin.excursion_photos.index', compact('excursion', 'photos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Excursion $excursion)
    {
        return view('admin.excursion_photos.create', compact('excursion'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request, Excursion $excursion)
    {
        $data = $request->validated();

        // Сохранение картинки в хранилище
        $data['photo'] = Storage::disk('public')->put('/images', $data['photo']);

        $excursion->photos()->create($data);

        return redirect()->route('admin.excursions.photos.index', compact('excursion'));
    }

    /**
     * Display the specified resource.
     */
    public function show(ExcursionPhoto $photo)
    {
        return view('admin.excursion_photos.show', compact('photo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ExcursionPhoto $photo)
    {
        return view('admin.excursion_photos.edit', compact('photo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, ExcursionPhoto $photo)
    {
        $data = $request->validated();

        // Сохранение картинки в хранилище
        if (isset($data['photo'])) {
            $data['photo'] = Storage::disk('public')->put('/images', $data['photo']);
        }

        $photo->update($data);

        $excursion = Excursion::find($photo->excursion_id);

        return redirect()->route('admin.excursions.photos.index', compact('excursion'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ExcursionPhoto $photo)
    {
        $excursion = $photo->excursion()->get()[0];
        // Отвязываем фото от компании, сохраняем изменения и удаляем фото
        $photo->excursion()->dissociate();
        $photo->save();
        $photo->delete();

        return redirect()->route('admin.excursions.photos.index', compact('excursion'));
    }
}
