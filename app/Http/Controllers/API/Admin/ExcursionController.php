<?php

namespace App\Http\Controllers\API\Admin;

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
    public function __invoke(ExcursionRequest $request)
    {
        $data = $request->validated();
        $excursion = Excursion::find($data['excursion_id']);
        $bookings = Booking::where('excursion_id', $data['excursion_id'])->get();


        $return_arr = [];


        for($i = 0; $i <= $excursion->active_days_for_booking; $i++) {
            $times = $excursion->decode_schedule[$excursion->days_of_the_week_array[date("w", strtotime(now()) + 86400 * $i)]];

            foreach ($times as $key => $value) {

                $arr = [];
                $arr[] = explode(":", $value);

                $bookings_arr = $bookings->where('booking_date', date("Y-m-d", strtotime(now()) + 86400 * $i))->where('booking_time', date("H:i:s", strtotime($value) + 86400 * $i));

                $participants_count = 0;

                foreach ($bookings_arr as $booking) {
                    $participants_count += $booking->participants_count;
                }

                $return_arr[] = [
                    "title" =>  "Участников $participants_count из $excursion->max_participants_count_group",
                    "start_d" =>  (int) date("d", strtotime(now()) + 86400 * $i),
                    "start_m" =>  (int) date("m", strtotime(now()) + 86400 * $i),
                    "start_y" =>  (int) date("Y", strtotime(now()) + 86400 * $i),
                    "start_h" =>  (int) date("h", strtotime($value) + 86400 * $i),
                    "start_i" =>  (int) date("i", strtotime($value) + 86400 * $i),
                    "end_d" =>  (int) date("d", strtotime(now()) + 86400 * $i),
                    "end_m" =>  (int) date("m", strtotime(now()) + 86400 * $i),
                    "end_y" =>  (int) date("Y", strtotime(now()) + 86400 * $i),
                    "end_h" =>  (int) date("h", strtotime($value) + strtotime($excursion->duration) + 86400 * $i),
                    "end_i" =>  (int) date("i", strtotime($value) + strtotime($excursion->duration) + 86400 * $i),
                ];
                unset($arr);
            }

        }
        return response()->json(array_values($return_arr));
    }
}
