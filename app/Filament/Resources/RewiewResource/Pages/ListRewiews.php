<?php

namespace App\Filament\Resources\RewiewResource\Pages;

use App\Filament\Resources\RewiewResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRewiews extends ListRecords
{
    protected static string $resource = RewiewResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
