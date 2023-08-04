<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'excursions';
    protected $guarded = [];
    protected $fillable = [];

    // Привязка записей бронирования к пользователю (много записей бронирования к одному пользователю)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    // Привязка записей бронирования к экскурсиям (много записей бронирования к одной экскурсии)
    public function excursion()
    {
        return $this->belongsTo(Excursion::class, 'excursion_id', 'id');
    }
}
