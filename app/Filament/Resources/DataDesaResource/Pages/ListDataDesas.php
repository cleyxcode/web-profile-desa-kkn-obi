<?php

namespace App\Filament\Resources\DataDesaResource\Pages;

use App\Filament\Resources\DataDesaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDataDesas extends ListRecords
{
    protected static string $resource = DataDesaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
