<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function peoples()
    {
        return $this->hasMany(People::class);
    }

    public function roles()
    {
        return $this->hasMany(Role::class);
    }
    public function movies()
    {
        return $this->hasMany(Movie::class);
    }

}
