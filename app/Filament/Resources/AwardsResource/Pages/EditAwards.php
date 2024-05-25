<?php

namespace App\Filament\Resources\AwardsResource\Pages;

use App\Filament\Resources\AwardsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAwards extends EditRecord
{
    protected static string $resource = AwardsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
