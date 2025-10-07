<?php

namespace App\Filament\Resources\ProfilDesaResource\Pages;

use App\Filament\Resources\ProfilDesaResource;
use Filament\Resources\Pages\CreateRecord;

class CreateProfilDesa extends CreateRecord
{
    protected static string $resource = ProfilDesaResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Profil Desa berhasil ditambahkan';
    }
}