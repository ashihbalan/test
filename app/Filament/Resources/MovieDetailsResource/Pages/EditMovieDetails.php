<?php

namespace App\Filament\Resources\MovieDetailsResource\Pages;

use App\Filament\Resources\MovieDetailsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMovieDetails extends EditRecord
{
    protected static string $resource = MovieDetailsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
