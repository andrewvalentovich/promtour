<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory, Sluggable, Filterable;

    protected $table = 'companies';
    protected $guarded = [];
    protected $fillable = [];

    // Привязка компании к категории (много компаний к одной категории)
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

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
