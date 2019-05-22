<?php

namespace App\Models;
use App\Models\Movie;
use Illuminate\Database\Eloquent\Model;

class TypeMovie extends Model
{
    protected $fillable=[
        'id',
        'name',
    ];
    
    public function movies(){
    return $this->hasMany(Movie::class);
    }
   
}
