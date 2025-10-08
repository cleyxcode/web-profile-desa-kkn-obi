<?php

namespace App\Filament\Resources\ProfilDesaResource\Pages;

use App\Filament\Resources\ProfilDesaResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use Filament\Infolists;
use Filament\Infolists\Infolist;

class ViewProfilDesa extends ViewRecord
{
    protected static string $resource = ProfilDesaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
            Actions\DeleteAction::make(),
        ];
    }

    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Infolists\Components\Section::make('Informasi Desa')
                    ->schema([
                        Infolists\Components\ImageEntry::make('logo_desa')
                            ->label('Logo Desa')
                            ->circular()
                            ->size(100),

                        Infolists\Components\TextEntry::make('nama_desa')
                            ->label('Nama Desa')
                            ->size(Infolists\Components\TextEntry\TextEntrySize::Large)
                            ->weight('bold'),

                        Infolists\Components\TextEntry::make('tagline')
                            ->label('Tagline')
                            ->icon('heroicon-o-sparkles')
                            ->color('primary'),

                        Infolists\Components\TextEntry::make('alamat_lengkap')
                            ->label('Alamat Lengkap')
                            ->icon('heroicon-o-map-pin'),

                        Infolists\Components\TextEntry::make('kontak')
                            ->label('Kontak')
                            ->icon('heroicon-o-phone'),

                        Infolists\Components\TextEntry::make('email')
                            ->label('Email')
                            ->icon('heroicon-o-envelope')
                            ->copyable(),

                        Infolists\Components\TextEntry::make('website')
                            ->label('Website')
                            ->icon('heroicon-o-globe-alt')
                            ->url(fn ($record) => $record->website)
                            ->openUrlInNewTab(),
                    ])
                    ->columns(2),

                Infolists\Components\Section::make('Kepala Desa')
                    ->schema([
                        Infolists\Components\ImageEntry::make('foto_kepala_desa')
                            ->label('Foto')
                            ->circular()
                            ->size(120),

                        Infolists\Components\TextEntry::make('nama_kepala_desa')
                            ->label('Nama')
                            ->weight('bold'),

                        Infolists\Components\TextEntry::make('nip_kepala_desa')
                            ->label('NIP'),

                        Infolists\Components\TextEntry::make('masa_jabatan_mulai')
                            ->label('Masa Jabatan Mulai')
                            ->date('d F Y'),

                        Infolists\Components\TextEntry::make('masa_jabatan_selesai')
                            ->label('Masa Jabatan Selesai')
                            ->date('d F Y')
                            ->badge()
                            ->color(fn ($record) => $record->is_kepala_desa_aktif ? 'success' : 'danger'),

                        Infolists\Components\TextEntry::make('sisa_masa_jabatan')
                            ->label('Sisa Masa Jabatan')
                            ->formatStateUsing(fn ($state) => $state ? "$state hari lagi" : 'Sudah berakhir')
                            ->badge()
                            ->color(fn ($state) => $state > 365 ? 'success' : ($state > 0 ? 'warning' : 'danger')),
                    ])
                    ->columns(3)
                    ->collapsible(),

                Infolists\Components\Section::make('Media')
                    ->schema([
                        Infolists\Components\ImageEntry::make('banner')
                            ->label('Banner Desa')
                            ->columnSpanFull(),

                        Infolists\Components\ImageEntry::make('struktur_image')
                            ->label('Struktur Organisasi')
                            ->columnSpanFull(),

                        Infolists\Components\ImageEntry::make('galeri')
                            ->label('Galeri Foto')
                            ->columnSpanFull()
                            ->limit(6)
                            ->limitedRemainingText(),
                    ])
                    ->collapsible(),

                Infolists\Components\Section::make('Lokasi')
                    ->schema([
                        Infolists\Components\TextEntry::make('latitude')
                            ->label('Latitude')
                            ->copyable(),

                        Infolists\Components\TextEntry::make('longitude')
                            ->label('Longitude')
                            ->copyable(),

                        Infolists\Components\TextEntry::make('luas_wilayah')
                            ->label('Luas Wilayah')
                            ->suffix(' km²'),

                        Infolists\Components\TextEntry::make('ketinggian')
                            ->label('Ketinggian')
                            ->suffix(' mdpl'),
                    ])
                    ->columns(4)
                    ->collapsible(),

                Infolists\Components\Section::make('Sejarah')
                    ->schema([
                        Infolists\Components\TextEntry::make('sejarah')
                            ->label('')
                            ->html()
                            ->columnSpanFull(),
                    ])
                    ->collapsible()
                    ->collapsed(),

                Infolists\Components\Section::make('Visi & Misi')
                    ->schema([
                        Infolists\Components\TextEntry::make('visi')
                            ->label('Visi')
                            ->columnSpanFull(),

                        Infolists\Components\TextEntry::make('misi')
                            ->label('Misi')
                            ->columnSpanFull(),
                    ])
                    ->collapsible()
                    ->collapsed(),

                Infolists\Components\Section::make('Social Media')
                    ->schema([
                        Infolists\Components\TextEntry::make('facebook')
                            ->label('Facebook')
                            ->url(fn ($record) => $record->facebook)
                            ->openUrlInNewTab()
                            ->icon('heroicon-o-globe-alt')
                            ->visible(fn ($record) => !empty($record->facebook)),

                        Infolists\Components\TextEntry::make('instagram')
                            ->label('Instagram')
                            ->url(fn ($record) => $record->instagram)
                            ->openUrlInNewTab()
                            ->icon('heroicon-o-camera')
                            ->visible(fn ($record) => !empty($record->instagram)),

                        Infolists\Components\TextEntry::make('youtube')
                            ->label('YouTube')
                            ->url(fn ($record) => $record->youtube)
                            ->openUrlInNewTab()
                            ->icon('heroicon-o-play-circle')
                            ->visible(fn ($record) => !empty($record->youtube)),
                    ])
                    ->columns(3)
                    ->collapsible()
                    ->collapsed(),
            ]);
    }
}