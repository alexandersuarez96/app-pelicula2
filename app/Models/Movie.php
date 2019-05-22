<?php

namespace App\Models;
use App\Models\TypeMovie;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable=[
        'id',
        'name',
        'type_movies_id',
    ];
    
    public function movies(){
    return $this->belongsTo(Movie::class);
    }
}
