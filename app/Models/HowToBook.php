<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HowToBook extends Model
{
    use HasFactory;

    protected $table = 'how_to_books';
    protected $guarded = [];
    protected $fillable = [];
}
