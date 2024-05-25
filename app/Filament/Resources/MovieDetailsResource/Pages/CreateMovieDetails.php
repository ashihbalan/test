<?php

namespace App\Filament\Resources\MovieDetailsResource\Pages;

use App\Filament\Resources\MovieDetailsResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateMovieDetails extends CreateRecord
{
    protected static string $resource = MovieDetailsResource::class;
}
