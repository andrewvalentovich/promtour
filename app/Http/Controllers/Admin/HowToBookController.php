<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\HowToBook\UpdateRequest;
use App\Http\Requests\Admin\HowToBook\StoreRequest;
use App\Models\HowToBook;

class HowToBookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pages = HowToBook::orderBy('id', 'desc')->get();
        return view('admin.how_to_book.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.how_to_book.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        HowToBook::create($data);

        return redirect()->route('admin.how_to_book.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(HowToBook $how_to_book)
    {
        return view('admin.how_to_book.show', compact('how_to_book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HowToBook $how_to_book)
    {
        return view('admin.how_to_book.edit', compact('how_to_book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, HowToBook $how_to_book)
    {
        $data = $request->validated();
        $how_to_book->update($data);

        return redirect()->route('admin.how_to_book.show', compact('how_to_book'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HowToBook $how_to_book)
    {
        $how_to_book->delete();
        return redirect()->route('admin.how_to_book.index');
    }
}
