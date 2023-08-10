<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Booking\StoreRequest;
use App\Http\Requests\API\Admin\ExcursionRequest;
use App\Models\Booking;
use App\Models\Excursion;
use App\Models\User;
use App\Rules\ParticipantsLimitRule;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class BookingController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $response = Validator::make($request->all(), [
            'user_id' => 'required|integer|exists:users,id',
            'excursion_id' => 'required|integer|exists:excursions,id',
            'booking_date' => 'required|string|max:10',
            'booking_time' => 'required|string|max:8',
            'participants_count' => ['required', 'integer', new ParticipantsLimitRule],
        ]);

        if($response->fails()){
            return response()->json(['status' => 422, 'errors' => $response->errors()], 200, [], JSON_UNESCAPED_UNICODE);
        }

//        $user = User::find($response['user_id']);
//        $user->bookings()->create($data);

        return response()->json(['status' => 200, 'success' => $response], 200, [], JSON_UNESCAPED_UNICODE);
    }
}
