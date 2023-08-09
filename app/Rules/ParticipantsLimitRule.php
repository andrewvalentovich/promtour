<?php

namespace App\Rules;

use App\Models\Booking;
use App\Models\Excursion;
use Closure;
use Illuminate\Contracts\Validation\DataAwareRule;
use Illuminate\Contracts\Validation\InvokableRule;

class ParticipantsLimitRule implements DataAwareRule, InvokableRule
{
    /**
     * All of the data under validation.
     *
     * @var array<string, mixed>
     */
    protected $data = [];

    /**
     * Run the validation rule.
     *
     * @param string $attribute
     * @param mixed $value
     * @param \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function __invoke(string $attribute, mixed $value, \Closure $fail)
    {
        $excursion = Excursion::find($this->data['excursion_id']);
        $bookings = Booking::where('excursion_id', $this->data['excursion_id'])
            ->where('booking_time', date("H:i:s", strtotime($this->data['booking_time'])))
            ->where('booking_date', str_replace(":", "-", $this->data['booking_date']))
            ->get();
        $participants_count = 0;

        foreach ($bookings as $booking) {
            $participants_count += $booking->participants_count;
        }

        if ($value > $excursion->max_participants_count_client) {
            $fail('Максимальное количество человек в одной группе '.$excursion->max_participants_count_client);
        }

        if ($value > $excursion->max_participants_count_group - $participants_count) {
            $fail('Осталось всего '.$excursion->max_participants_count_group - $participants_count.' мест');
        }
    }

    /**
     * Set the data under validation.
     *
     * @param  array<string, mixed>  $data
     */
    public function setData(array $data)
    {
        $this->data = $data;

        return $this;
    }
}
