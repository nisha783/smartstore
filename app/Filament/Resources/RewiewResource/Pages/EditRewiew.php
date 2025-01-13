<?php

namespace App\Filament\Resources\RewiewResource\Pages;

use App\Filament\Resources\RewiewResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRewiew extends EditRecord
{
    protected static string $resource = RewiewResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
