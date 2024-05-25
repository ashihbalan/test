<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovieRole extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    public function role()
    {
        return $this->hasOne(Role::class, 'id', 'role_id');
    }
    public function movie()
    {
        return $this->hasOne(Movie::class, 'id', 'movie_id');
    }
    public function people()
    {
        return $this->hasOne(People::class, 'id', 'people_id');
    }


}
