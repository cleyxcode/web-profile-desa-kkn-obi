<?php

namespace App\Filament\Resources\KontakResource\Pages;

use App\Filament\Resources\KontakResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewKontak extends ViewRecord
{
    protected static string $resource = KontakResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make()
                ->label('Tandai Status'),
            Actions\DeleteAction::make(),
        ];
    }

    // Auto mark as read when viewing
    protected function mutateFormDataBeforeFill(array $data): array
    {
        if (!$data['sudah_dibaca']) {
            $this->record->update(['sudah_dibaca' => true]);
        }
        
        return $data;
    }
}