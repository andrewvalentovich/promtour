<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory, Sluggable;

    protected $table = 'companies';
    protected $guarded = [];
    protected $fillable = [];

    // Привязка компании к фотографиям (одна компания имеет несколько фотографий)
    public function photos()
    {
        return $this->HasMany(CompanyPhoto::class);
    }

    // Привязка компании к экскурсиям (одна компания имеет несколько экскурсий)
    public function excursions()
    {
        return $this->HasMany(Excursion::class);
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
