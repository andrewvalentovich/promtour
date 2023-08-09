<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $bookings = Booking::where('user_id', $user->id)->where('booking_date', '>', date(now()))->get();
        return view('profile', compact('bookings'));
    }
}
