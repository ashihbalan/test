<?php

namespace App\Filament\Resources\AwardsResource\Pages;

use App\Filament\Resources\AwardsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAwards extends ListRecords
{
    protected static string $resource = AwardsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
