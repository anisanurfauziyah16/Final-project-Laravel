<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Review;


class Film extends Model
{
    use HasFactory;
    protected $table = 'films';
    protected $fillable = ["title", "summary", "release_year", "poster", "genre_id"];

    public function genres()
    {
        return $this->belongsTo(genres::class, "genre_id");
    }

    
    public function ListReview()
    {
        return $this->hasMany(Review::class, "film_id");
    }
}
