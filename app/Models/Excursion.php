<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Excursion extends Model
{
    use HasFactory, Sluggable, Filterable;

    protected $table = 'excursions';
    protected $guarded = [];
    protected $fillable = [];

    // Привязка экскурсии к категории (много экскурсий к одной категории)
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    // Привязка компании к фотографиям (одна компания имеет несколько фотографий)
    public function photos()
    {
        return $this->HasMany(ExcursionPhoto::class);
    }

    // Привязка экскурсий к компании (много экскурсий к одной компании)
    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }

    // Привязка экскурсии к бронированиям (одна экскурсия имеет несколько бронирований)
    public function bookings()
    {
        return $this->HasMany(Booking::class);
    }

    // $dates[$i]["date"] - Дата в формате "Y:m:d"
    // $dates[$i]["day_of_the_week"] - День недели, например "monday"
    // $dates[$i]["booking_times"] - Массив с временем записи в конкретный день 10:00, 20:00, 24:00 (для понедельника)
    public function getDatesAttribute(): array
    {
        $dates = [];
        for($i = 0; $i <= $this->active_days_for_booking; $i++) {
            $dates[$i]["date"] = date("Y:m:d", strtotime(now()) + 86400 * $i);
            $dates[$i]["day_of_the_week"] = $this->getDaysOfTheWeekArrayAttribute()[date("w", strtotime(now()) + 86400 * $i)];
            $dates[$i]["booking_times"] = json_decode($this->schedule, true)[$dates[$i]["day_of_the_week"]];
        }
        return $dates;
    }

    // Данная функция возвращает массив, где каждый ключ массива соответствует определённому дню недели
    public function getDaysOfTheWeekArrayAttribute(): array
    {
        return [
            "0" => "sunday",
            "1" => "monday",
            "2" => "tuesday",
            "3" => "wednesday",
            "4" => "thursday",
            "5" => "friday",
            "6" => "saturday",
        ];
    }

    // Данная функция декодированный JSON объект, а именно поле schedule
    public function getDecodeScheduleAttribute(): array
    {
        return json_decode($this->schedule, true);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
