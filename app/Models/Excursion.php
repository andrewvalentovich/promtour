<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Excursion extends Model
{
    use HasFactory;

    protected $table = 'excursions';
    protected $guarded = [];
    protected $fillable = [];

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
}
