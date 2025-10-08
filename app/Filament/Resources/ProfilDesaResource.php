<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProfilDesaResource\Pages;
use App\Models\ProfilDesa;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ProfilDesaResource extends Resource
{
    protected static ?string $model = ProfilDesa::class;

    protected static ?string $navigationIcon = 'heroicon-o-home';
    
    protected static ?string $navigationLabel = 'Profil Desa';
    
    protected static ?string $modelLabel = 'Profil Desa';
    
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Tabs::make('Profil Desa')
                    ->tabs([
                        // Tab 1: Informasi Dasar
                        Forms\Components\Tabs\Tab::make('Informasi Dasar')
                            ->icon('heroicon-o-information-circle')
                            ->schema([
                                Forms\Components\Section::make('Identitas Desa')
                                    ->schema([
                                        Forms\Components\TextInput::make('nama_desa')
                                            ->label('Nama Desa')
                                            ->required()
                                            ->maxLength(255)
                                            ->columnSpanFull(),

                                        Forms\Components\Textarea::make('tagline')
                                            ->label('Tagline/Motto Desa')
                                            ->placeholder('Contoh: Desa Sejahtera, Masyarakat Bahagia')
                                            ->rows(2)
                                            ->maxLength(255)
                                            ->columnSpanFull(),

                                        Forms\Components\TextInput::make('kecamatan')
                                            ->label('Kecamatan')
                                            ->maxLength(255),

                                        Forms\Components\TextInput::make('kabupaten')
                                            ->label('Kabupaten/Kota')
                                            ->maxLength(255),

                                        Forms\Components\TextInput::make('provinsi')
                                            ->label('Provinsi')
                                            ->maxLength(255),

                                        Forms\Components\TextInput::make('kode_pos')
                                            ->label('Kode Pos')
                                            ->maxLength(10)
                                            ->placeholder('97xxx'),
                                    ])
                                    ->columns(2),

                                Forms\Components\Section::make('Kontak & Alamat')
                                    ->schema([
                                        Forms\Components\Textarea::make('alamat')
                                            ->label('Alamat Kantor Desa')
                                            ->rows(3)
                                            ->maxLength(65535)
                                            ->columnSpanFull(),

                                        Forms\Components\TextInput::make('kontak')
                                            ->label('No. Telepon/HP')
                                            ->tel()
                                            ->maxLength(255)
                                            ->placeholder('0812-3456-7890'),

                                        Forms\Components\TextInput::make('email')
                                            ->label('Email')
                                            ->email()
                                            ->maxLength(255)
                                            ->placeholder('desa@example.com'),

                                        Forms\Components\TextInput::make('website')
                                            ->label('Website')
                                            ->url()
                                            ->maxLength(255)
                                            ->placeholder('https://desa.example.com'),
                                    ])
                                    ->columns(2),

                                Forms\Components\Section::make('Wilayah Administratif')
                                    ->schema([
                                        Forms\Components\TextInput::make('jumlah_dusun')
                                            ->label('Jumlah Dusun')
                                            ->numeric()
                                            ->default(0)
                                            ->minValue(0)
                                            ->suffix('dusun'),

                                        Forms\Components\TextInput::make('jumlah_rw')
                                            ->label('Jumlah RW')
                                            ->numeric()
                                            ->default(0)
                                            ->minValue(0)
                                            ->suffix('RW'),

                                        Forms\Components\TextInput::make('jumlah_rt')
                                            ->label('Jumlah RT')
                                            ->numeric()
                                            ->default(0)
                                            ->minValue(0)
                                            ->suffix('RT'),

                                        Forms\Components\TextInput::make('luas_wilayah')
                                            ->label('Luas Wilayah')
                                            ->numeric()
                                            ->suffix('km²')
                                            ->step(0.01)
                                            ->placeholder('0.00'),

                                        Forms\Components\TextInput::make('ketinggian')
                                            ->label('Ketinggian')
                                            ->numeric()
                                            ->suffix('mdpl')
                                            ->placeholder('0')
                                            ->helperText('Meter di atas permukaan laut'),
                                    ])
                                    ->columns(3),
                            ]),

                        // Tab 2: Kepala Desa
                        Forms\Components\Tabs\Tab::make('Kepala Desa')
                            ->icon('heroicon-o-user-circle')
                            ->schema([
                                Forms\Components\Section::make('Data Kepala Desa')
                                    ->schema([
                                        Forms\Components\FileUpload::make('foto_kepala_desa')
                                            ->label('Foto Kepala Desa')
                                            ->image()
                                            ->directory('profil-desa/kepala-desa')
                                            ->maxSize(2048)
                                            ->imageEditor()
                                            ->avatar()
                                            ->helperText('Upload foto kepala desa (max 2MB)')
                                            ->columnSpanFull(),

                                        Forms\Components\TextInput::make('nama_kepala_desa')
                                            ->label('Nama Lengkap')
                                            ->maxLength(255)
                                            ->placeholder('Nama Kepala Desa'),

                                        Forms\Components\TextInput::make('nip_kepala_desa')
                                            ->label('NIP')
                                            ->maxLength(255)
                                            ->placeholder('NIP Kepala Desa (jika PNS)'),

                                        Forms\Components\DatePicker::make('masa_jabatan_mulai')
                                            ->label('Masa Jabatan Mulai')
                                            ->native(false)
                                            ->displayFormat('d M Y'),

                                        Forms\Components\DatePicker::make('masa_jabatan_selesai')
                                            ->label('Masa Jabatan Selesai')
                                            ->native(false)
                                            ->displayFormat('d M Y')
                                            ->after('masa_jabatan_mulai'),

                                        Forms\Components\RichEditor::make('sambutan_kepala_desa')
                                            ->label('Sambutan Kepala Desa')
                                            ->toolbarButtons([
                                                'bold',
                                                'italic',
                                                'underline',
                                                'bulletList',
                                                'orderedList',
                                                'link',
                                                'undo',
                                                'redo',
                                            ])
                                            ->columnSpanFull(),
                                    ])
                                    ->columns(2),
                            ]),

                        // Tab 3: Lokasi Desa
                        Forms\Components\Tabs\Tab::make('Lokasi & Peta')
                            ->icon('heroicon-o-map-pin')
                            ->schema([
                                Forms\Components\Section::make('Lokasi Desa')
                                    ->schema([
                                        Forms\Components\Grid::make(3)
                                            ->schema([
                                                Forms\Components\TextInput::make('latitude')
                                                    ->label('Latitude')
                                                    ->numeric()
                                                    ->step(0.00000001)
                                                    ->placeholder('-3.6500')
                                                    ->helperText('Contoh: -3.6500 untuk Ambon')
                                                    ->reactive()
                                                    ->afterStateUpdated(fn (Set $set, ?string $state) => $set('latitude', $state)),
                                                
                                                Forms\Components\TextInput::make('longitude')
                                                    ->label('Longitude')
                                                    ->numeric()
                                                    ->step(0.00000001)
                                                    ->placeholder('128.1900')
                                                    ->helperText('Contoh: 128.1900 untuk Ambon')
                                                    ->reactive()
                                                    ->afterStateUpdated(fn (Set $set, ?string $state) => $set('longitude', $state)),
                                                
                                                Forms\Components\TextInput::make('zoom_level')
                                                    ->label('Zoom Level')
                                                    ->numeric()
                                                    ->default(15)
                                                    ->minValue(1)
                                                    ->maxValue(18)
                                                    ->helperText('1-18 (semakin besar semakin zoom)'),
                                            ]),
                                        
                                        Forms\Components\Placeholder::make('map_instruction')
                                            ->label('')
                                            ->content('💡 Tips: Klik pada peta di bawah untuk mengatur lokasi desa secara otomatis, atau masukkan koordinat secara manual di atas.')
                                            ->columnSpanFull(),
                                        
                                        Forms\Components\ViewField::make('map_selector')
                                            ->label('Pilih Lokasi di Peta')
                                            ->view('filament.forms.components.map-selector')
                                            ->afterStateHydrated(function (Forms\Components\ViewField $component, Get $get) {
                                                $component->state([
                                                    'latitude' => $get('latitude') ?? -3.6500,
                                                    'longitude' => $get('longitude') ?? 128.1900,
                                                    'zoom_level' => $get('zoom_level') ?? 15,
                                                ]);
                                            })
                                            ->columnSpanFull(),
                                    ])
                                    ->description('Tentukan lokasi desa Anda di peta untuk ditampilkan di website'),
                            ]),

                        // Tab 4: Media & Banner
                        Forms\Components\Tabs\Tab::make('Media')
                            ->icon('heroicon-o-photo')
                            ->schema([
                                Forms\Components\Section::make('Logo & Banner')
                                    ->schema([
                                        Forms\Components\FileUpload::make('logo_desa')
                                            ->label('Logo Desa')
                                            ->image()
                                            ->directory('profil-desa/logo')
                                            ->maxSize(2048)
                                            ->imageEditor()
                                            ->helperText('Upload logo desa (max 2MB)'),

                                        Forms\Components\FileUpload::make('banner')
                                            ->label('Banner Desa')
                                            ->image()
                                            ->directory('profil-desa/banner')
                                            ->maxSize(2048)
                                            ->imageEditor()
                                            ->helperText('Upload foto banner desa (max 2MB)'),
                                        
                                        Forms\Components\FileUpload::make('struktur_image')
                                            ->label('Gambar Struktur Organisasi')
                                            ->image()
                                            ->directory('profil-desa/struktur')
                                            ->maxSize(2048)
                                            ->imageEditor()
                                            ->helperText('Upload gambar struktur pemerintahan desa (max 2MB)'),
                                    ])
                                    ->columns(2),

                                Forms\Components\Section::make('Galeri Foto Desa')
                                    ->schema([
                                        Forms\Components\FileUpload::make('galeri')
                                            ->label('Galeri Foto')
                                            ->image()
                                            ->multiple()
                                            ->directory('profil-desa/galeri')
                                            ->maxSize(2048)
                                            ->imageEditor()
                                            ->reorderable()
                                            ->maxFiles(20)
                                            ->helperText('Upload hingga 20 foto kegiatan/fasilitas desa (max 2MB per foto)')
                                            ->columnSpanFull(),
                                    ]),

                                Forms\Components\Section::make('Video Profil')
                                    ->description('Tambahkan video profil desa dari YouTube')
                                    ->schema([
                                        Forms\Components\TextInput::make('video_profil_url')
                                            ->label('URL Video YouTube')
                                            ->url()
                                            ->placeholder('https://www.youtube.com/watch?v=...')
                                            ->helperText('Paste URL video YouTube profil desa')
                                            ->columnSpanFull(),

                                        Forms\Components\Textarea::make('video_profil_deskripsi')
                                            ->label('Deskripsi Video')
                                            ->rows(3)
                                            ->maxLength(500)
                                            ->placeholder('Jelaskan tentang video profil desa...')
                                            ->columnSpanFull(),
                                    ]),
                            ]),

                        // Tab 5: Sejarah & Visi Misi
                        Forms\Components\Tabs\Tab::make('Sejarah & Visi')
                            ->icon('heroicon-o-book-open')
                            ->schema([
                                Forms\Components\Section::make('Sejarah Desa')
                                    ->schema([
                                        Forms\Components\RichEditor::make('sejarah')
                                            ->label('Sejarah Desa')
                                            ->toolbarButtons([
                                                'bold',
                                                'italic',
                                                'underline',
                                                'strike',
                                                'bulletList',
                                                'orderedList',
                                                'h2',
                                                'h3',
                                                'link',
                                                'undo',
                                                'redo',
                                            ])
                                            ->columnSpanFull(),
                                    ]),

                                Forms\Components\Section::make('Visi & Misi')
                                    ->schema([
                                        Forms\Components\Textarea::make('visi')
                                            ->label('Visi Desa')
                                            ->rows(4)
                                            ->maxLength(65535)
                                            ->placeholder('Tuliskan visi desa...')
                                            ->columnSpanFull(),
                                        
                                        Forms\Components\Textarea::make('misi')
                                            ->label('Misi Desa')
                                            ->rows(8)
                                            ->maxLength(65535)
                                            ->helperText('Pisahkan setiap poin misi dengan enter')
                                            ->placeholder("1. Misi pertama\n2. Misi kedua\n3. Misi ketiga")
                                            ->columnSpanFull(),
                                    ]),

                                Forms\Components\Section::make('Struktur Pemerintahan')
                                    ->schema([
                                        Forms\Components\RichEditor::make('struktur_pemerintahan')
                                            ->label('Struktur Pemerintahan (Teks)')
                                            ->toolbarButtons([
                                                'bold',
                                                'italic',
                                                'bulletList',
                                                'orderedList',
                                                'h3',
                                                'undo',
                                                'redo',
                                            ])
                                            ->helperText('Anda bisa menuliskan daftar perangkat desa di sini, atau cukup upload gambar struktur di tab Media')
                                            ->columnSpanFull(),
                                    ]),
                            ]),

                        // Tab 6: Social Media
                        Forms\Components\Tabs\Tab::make('Social Media')
                            ->icon('heroicon-o-globe-alt')
                            ->schema([
                                Forms\Components\Section::make('Akun Media Sosial Desa')
                                    ->description('Tambahkan link media sosial resmi desa untuk memudahkan warga mengikuti informasi')
                                    ->schema([
                                        Forms\Components\TextInput::make('facebook')
                                            ->label('Facebook')
                                            ->url()
                                            ->placeholder('https://facebook.com/desaanda')
                                            ->prefixIcon('heroicon-o-globe-alt')
                                            ->maxLength(255),

                                        Forms\Components\TextInput::make('instagram')
                                            ->label('Instagram')
                                            ->url()
                                            ->placeholder('https://instagram.com/desaanda')
                                            ->prefixIcon('heroicon-o-camera')
                                            ->maxLength(255),

                                        Forms\Components\TextInput::make('twitter')
                                            ->label('Twitter/X')
                                            ->url()
                                            ->placeholder('https://twitter.com/desaanda')
                                            ->prefixIcon('heroicon-o-chat-bubble-left')
                                            ->maxLength(255),

                                        Forms\Components\TextInput::make('youtube')
                                            ->label('YouTube')
                                            ->url()
                                            ->placeholder('https://youtube.com/@desaanda')
                                            ->prefixIcon('heroicon-o-play-circle')
                                            ->maxLength(255),

                                        Forms\Components\TextInput::make('tiktok')
                                            ->label('TikTok')
                                            ->url()
                                            ->placeholder('https://tiktok.com/@desaanda')
                                            ->prefixIcon('heroicon-o-musical-note')
                                            ->maxLength(255),
                                    ])
                                    ->columns(2),
                            ]),

                        // Tab 7: Pengaturan
                        Forms\Components\Tabs\Tab::make('Pengaturan')
                            ->icon('heroicon-o-cog-6-tooth')
                            ->schema([
                                Forms\Components\Section::make('Status Publikasi')
                                    ->schema([
                                        Forms\Components\Toggle::make('is_published')
                                            ->label('Publikasikan Profil Desa')
                                            ->default(true)
                                            ->helperText('Aktifkan untuk menampilkan profil desa di website')
                                            ->inline(false),
                                        
                                        Forms\Components\Placeholder::make('publish_info')
                                            ->label('')
                                            ->content('ℹ️ Jika dinonaktifkan, profil desa tidak akan ditampilkan di website publik, tetapi tetap dapat diakses dari admin panel.')
                                            ->columnSpanFull(),
                                    ]),
                            ]),
                    ])
                    ->columnSpanFull()
                    ->persistTabInQueryString(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('logo_desa')
                    ->label('Logo')
                    ->circular()
                    ->defaultImageUrl(url('/images/default-logo.png')),

                Tables\Columns\TextColumn::make('nama_desa')
                    ->label('Nama Desa')
                    ->searchable()
                    ->sortable()
                    ->description(fn ($record) => $record->tagline)
                    ->weight('bold'),

                Tables\Columns\TextColumn::make('nama_kepala_desa')
                    ->label('Kepala Desa')
                    ->searchable()
                    ->toggleable()
                    ->icon('heroicon-o-user-circle'),
                
                Tables\Columns\TextColumn::make('kontak')
                    ->label('Kontak')
                    ->searchable()
                    ->toggleable()
                    ->icon('heroicon-o-phone')
                    ->copyable(),
                
                Tables\Columns\IconColumn::make('latitude')
                    ->label('Lokasi')
                    ->boolean()
                    ->trueIcon('heroicon-o-map-pin')
                    ->falseIcon('heroicon-o-x-circle')
                    ->trueColor('success')
                    ->falseColor('danger')
                    ->getStateUsing(fn ($record) => !is_null($record->latitude) && !is_null($record->longitude))
                    ->tooltip(fn ($record) => $record->latitude && $record->longitude ? 
                        "Lat: " . number_format($record->latitude, 4) . ", Lng: " . number_format($record->longitude, 4) : 'Lokasi belum diatur'),

                Tables\Columns\IconColumn::make('is_published')
                    ->label('Status')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle')
                    ->trueColor('success')
                    ->falseColor('danger')
                    ->tooltip(fn ($record) => $record->is_published ? 'Dipublikasikan' : 'Draft')
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Terakhir Diupdate')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->toggleable()
                    ->since()
                    ->description(fn ($record) => $record->updated_at->format('d M Y H:i')),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('is_published')
                    ->label('Status Publikasi')
                    ->placeholder('Semua')
                    ->trueLabel('Dipublikasikan')
                    ->falseLabel('Draft'),
                
                Tables\Filters\Filter::make('has_location')
                    ->label('Memiliki Lokasi')
                    ->query(fn ($query) => $query->whereNotNull('latitude')->whereNotNull('longitude')),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
                Tables\Actions\Action::make('preview')
                    ->label('Preview')
                    ->icon('heroicon-o-eye')
                    ->url(fn ($record) => route('profil-desa.show', $record))
                    ->openUrlInNewTab()
                    ->color('info')
                    ->visible(fn ($record) => $record->is_published),
                
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\Action::make('duplicate')
                        ->label('Duplikasi')
                        ->icon('heroicon-o-document-duplicate')
                        ->action(function ($record) {
                            $newRecord = $record->replicate();
                            $newRecord->nama_desa = $record->nama_desa . ' (Copy)';
                            $newRecord->is_published = false;
                            $newRecord->save();
                            
                            return redirect()->route('filament.admin.resources.profil-desas.edit', $newRecord);
                        })
                        ->requiresConfirmation()
                        ->color('warning'),
                    
                    Tables\Actions\DeleteAction::make(),
                ]),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\BulkAction::make('publish')
                        ->label('Publikasikan')
                        ->icon('heroicon-o-check-circle')
                        ->action(fn ($records) => $records->each->update(['is_published' => true]))
                        ->deselectRecordsAfterCompletion()
                        ->color('success'),
                    
                    Tables\Actions\BulkAction::make('unpublish')
                        ->label('Jadikan Draft')
                        ->icon('heroicon-o-x-circle')
                        ->action(fn ($records) => $records->each->update(['is_published' => false]))
                        ->deselectRecordsAfterCompletion()
                        ->color('warning'),
                ]),
            ])
            ->emptyStateHeading('Belum ada profil desa')
            ->emptyStateDescription('Silakan tambahkan profil desa untuk ditampilkan di website.')
            ->emptyStateIcon('heroicon-o-home')
            ->emptyStateActions([
                Tables\Actions\CreateAction::make()
                    ->label('Buat Profil Desa')
                    ->icon('heroicon-o-plus'),
            ])
            ->defaultSort('updated_at', 'desc')
            ->striped()
            ->paginated([10, 25, 50]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProfilDesas::route('/'),
            'create' => Pages\CreateProfilDesa::route('/create'),
            'edit' => Pages\EditProfilDesa::route('/{record}/edit'),
            'view' => Pages\ViewProfilDesa::route('/{record}'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getNavigationBadgeColor(): ?string
    {
        $count = static::getModel()::count();
        
        if ($count === 0) {
            return 'danger';
        } elseif ($count === 1) {
            return 'success';
        }
        
        return 'warning';
    }

    public static function getNavigationBadgeTooltip(): ?string
    {
        $count = static::getModel()::count();
        
        if ($count === 0) {
            return 'Belum ada profil desa';
        } elseif ($count === 1) {
            return 'Profil desa sudah dibuat';
        }
        
        return "Total {$count} profil desa";
    }
}