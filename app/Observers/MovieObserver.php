<?php

namespace App\Observers;

use App\Models\Movie;
use Illuminate\Support\Str;

class MovieObserver
{
    /**
     * Handle the Movie "created" event.
     */


    public function creating(Movie $movie): void
    {
        $movie->slug = Str::slug($movie->title);
    }


    public function created(Movie $movie): void
    {
        //
    }



    /**
     * Handle the Movie "updated" event.
     */
    public function updated(Movie $movie): void
    {
        //
    }

    /**
     * Handle the Movie "deleted" event.
     */
    public function deleted(Movie $movie): void
    {
        //
    }

    /**
     * Handle the Movie "restored" event.
     */
    public function restored(Movie $movie): void
    {
        //
    }

    /**
     * Handle the Movie "force deleted" event.
     */
    public function forceDeleted(Movie $movie): void
    {
        //
    }
}
