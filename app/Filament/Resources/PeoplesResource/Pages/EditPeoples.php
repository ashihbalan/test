<?php

namespace App\Filament\Resources\PeoplesResource\Pages;

use App\Filament\Resources\PeoplesResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPeoples extends EditRecord
{
    protected static string $resource = PeoplesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
