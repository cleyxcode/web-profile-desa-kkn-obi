<?php

namespace App\Filament\Resources\DataDesaResource\Pages;

use App\Filament\Resources\DataDesaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDataDesa extends EditRecord
{
    protected static string $resource = DataDesaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
