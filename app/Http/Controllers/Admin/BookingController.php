<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Booking\CompanyRequest;
use App\Http\Requests\Admin\Booking\ExcursionRequest;
use App\Http\Requests\Admin\Booking\StoreRequest;
use App\Http\Requests\Admin\Booking\UpdateRequest;
use App\Models\Company;
use App\Models\Excursion;
use App\Models\User;
use App\Models\Booking;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(User $user)
    {
        $bookings = $user->bookings()->orderBy('id', 'desc')->get();

        return view('admin.bookings.index', compact('user', 'bookings'));
    }
    /**
     * Display a listing of the resource.
     */
    public function all()
    {
        $bookings = Booking::orderBy('id', 'desc')->get();

        return view('admin.bookings.all', compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(User $user)
    {
        $companies = Company::has('excursions')->orderBy('id', 'desc')->get();
        return view('admin.bookings.create', compact('user', 'companies'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create_company(CompanyRequest $request, User $user)
    {
        $data = $request->validated();
        $company = Company::find($data['company_id']);
        return view('admin.bookings.create_company', compact('user', 'company'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create_excursion(ExcursionRequest $request, User $user)
    {
        $data = $request->validated();
        $excursion = Excursion::find($data['excursion_id']);
        $excursion_id = $data['excursion_id'];
        $user_id = $user->id;
        return view('admin.bookings.create_excursion', compact('user', 'excursion', 'excursion_id', 'user_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request, User $user)
    {
        $data = $request->validated();
        $user->bookings()->create($data);

        return redirect()->route('admin.users.bookings.index', compact('user'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        return view('admin.bookings.show', compact('booking'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        $excursion_id = $booking->excursion->id;
        $user_id = $booking->user->id;
        $excursion = Excursion::find($excursion_id);
        return view('admin.bookings.edit', compact('booking', 'user_id', 'excursion_id', 'excursion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Booking $booking)
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

        return redirect()->route('admin.bookings.show', compact('booking'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        $user = $booking->user()->get()[0];
        // Отвязываем фото от компании, сохраняем изменения и удаляем экскурсию
        $booking->user()->dissociate();
        $booking->save();
        $booking->delete();

        return redirect()->route('admin.users.bookings.index', compact('user'));
    }
}
