<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $table = 'photos';
    protected $guarded = [];
    protected $fillable = [];

    public function getPhotoUrlAttribute()
    {
        return url('storage/' . $this->photo);
    }

    // Привязка фотографии к компании (много фото к одной компании)
    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }
}
