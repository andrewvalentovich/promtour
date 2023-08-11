<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $guarded = [];
    protected $fillable = [];

    const EXCURSIONS = 0;
    const COMPANIES = 1;

    static function getTypes() {
        return [
            self::EXCURSIONS => 'Экскурсии',
            self::COMPANIES => 'Компании'
        ];
    }

    public function getTypesAttribute() {
        return self::getTypes();
    }

    public function getTypeNameAttribute() {
        return self::getTypes()[$this->type];
    }

    // Привязка категории к компаниям (одна категория имеет несколько компаний)
    public function companies()
    {
        return $this->HasMany(Company::class);
    }

    // Привязка категории к экскурсиям (одна категория имеет несколько экскурсий)
    public function excursions()
    {
        return $this->HasMany(Excursion::class);
    }
}
