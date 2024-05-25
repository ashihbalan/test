<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovieDetail extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function roles()
    {
        return $this->belongsToMany(Role::class, MovieRole::class);
    }



    public function peoples()
    {
        return $this->belongsToMany(People::class, MovieRole::class);
    }
    public function movies()
    {
        return $this->belongsToMany(Movie::class, MovieRole::class);
    }


}
