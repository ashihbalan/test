<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function knownfors()
    {
        return $this->hasMany(KnownFor::class);
    }

    public function awards()
    {
        return $this->belongsToMany(Award::class, PeopleAward::class);
    }
    public function PeopleAward()
    {
        return $this->hasMany(PeopleAward::class);
    }
}
