<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Excursion\StoreRequest;
use App\Http\Requests\Admin\Excursion\UpdateRequest;
use App\Models\Company;
use App\Models\Excursion;

class ExcursionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Company $company)
    {
        $excursions = $company->excursions()->orderBy('id', 'desc')->get();

        return view('admin.excursions.index', compact('company', 'excursions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Company $company)
    {
        return view('admin.excursions.create', compact('company'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request, Company $company)
    {
        $schedule = [];
        $data = $request->validated();

        foreach ($data['schedule'] as $key => $value) {
            $arr = [];
            preg_match_all("/[0-2]{0,1}[0-9]{0,1}:[0-5]{0,1}[0-9]{0,1}/", $data['schedule'][$key], $arr);
            $schedule[$key] = $arr[0];

            unset($arr);
        }

        $data['schedule'] = json_encode($schedule, JSON_UNESCAPED_UNICODE);
        unset($schedule);

        $company->excursions()->create($data);

        return redirect()->route('admin.companies.excursions.index', compact('company'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Excursion $excursion)
    {
        return view('admin.excursions.show', compact('excursion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Excursion $excursion)
    {
        return view('admin.excursions.edit', compact('excursion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Excursion $excursion)
    {
        $schedule = [];
        $data = $request->validated();

        foreach ($data['schedule'] as $key => $value) {
            $arr = [];
            preg_match_all("/[0-2]{0,1}[0-9]{0,1}:[0-5]{0,1}[0-9]{0,1}/", $data['schedule'][$key], $arr);
            $schedule[$key] = $arr[0];

            unset($arr);
        }

        $data['schedule'] = json_encode($schedule, JSON_UNESCAPED_UNICODE);
        unset($schedule);

        return redirect()->route('admin.excursions.show', compact('excursion'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Excursion $excursion)
    {
        $company = $excursion->company()->get()[0];
        // Отвязываем фото от компании, сохраняем изменения и удаляем экскурсию
        $excursion->company()->dissociate();
        $excursion->save();
        $excursion->delete();

        return redirect()->route('admin.companies.excursions.index', compact('company'));
    }
}