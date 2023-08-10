<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Admin\ExcursionRequest;
use App\Models\Booking;
use App\Models\Excursion;
use Illuminate\Http\Request;

class ExcursionController extends Controller
{
    /**
     * Listing of the resource.
     */
    public function admin(ExcursionRequest $request)
    {
        $data = $request->validated();
        $excursion = Excursion::find($data['excursion_id']);

        $return_arr = [];
        $return_data['info'] = ['excursion_id' => $excursion->id, 'name' => $excursion->name, 'max_participants_count' => $excursion->max_participants_count_group];

        for($i = 0; $i <= $excursion->active_days_for_booking; $i++) {

            $times = $excursion->decode_schedule[$excursion->days_of_the_week_array[date("w", strtotime(now()) + 86400 * $i)]];
            foreach ($times as $key => $value) {
                $arr = [];
                $arr[] = explode(":", $value);

                $bookings_arr = $excursion->bookings->where('booking_date', date("Y-m-d", strtotime(now()) + 86400 * $i))->where('booking_time', date("H:i:s", strtotime($value) + 86400 * $i));

                $participants_count = 0;

                foreach ($bookings_arr as $booking) {
                    $participants_count += $booking->participants_count;
                }

                $return_data['booking'][] = [
                    "date" => date("d.m.Y", strtotime(now()) + 86400 * $i),
                    "time" => $value,
                    "left_participants_count" => $excursion->max_participants_count_group - $participants_count,
                ];
            }
        }


        return response()->json(array_values($return_data));
    }
}
