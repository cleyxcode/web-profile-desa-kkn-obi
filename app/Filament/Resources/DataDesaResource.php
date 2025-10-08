<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DataDesaResource\Pages;
use App\Models\DataDesa;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class DataDesaResource extends Resource
{
    protected static ?string $model = DataDesa::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office-2';

    protected static ?string $navigationLabel = 'Data Desa';

    protected static ?string $pluralLabel = 'Data Desa';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Tabs::make('Data Desa')
                    ->tabs([
                        // Tab 1: Data Kependudukan
                        Forms\Components\Tabs\Tab::make('Kependudukan')
                            ->icon('heroicon-o-users')
                            ->schema([
                                Forms\Components\Section::make('Data Kependudukan')
                                    ->schema([
                                        Forms\Components\TextInput::make('jumlah_penduduk')
                                            ->label('Jumlah Penduduk')
                                            ->required()
                                            ->numeric()
                                            ->default(0)
                                            ->minValue(0)
                                            ->suffix('jiwa')
                                            ->placeholder('0'),

                                        Forms\Components\TextInput::make('jumlah_kk')
                                            ->label('Jumlah Kepala Keluarga (KK)')
                                            ->required()
                                            ->numeric()
                                            ->default(0)
                                            ->minValue(0)
                                            ->suffix('KK')
                                            ->placeholder('0'),

                                        Forms\Components\TextInput::make('jumlah_pria')
                                            ->label('Jumlah Penduduk Pria')
                                            ->numeric()
                                            ->default(0)
                                            ->minValue(0)
                                            ->suffix('jiwa')
                                            ->placeholder('0'),

                                        Forms\Components\TextInput::make('jumlah_wanita')
                                            ->label('Jumlah Penduduk Wanita')
                                            ->numeric()
                                            ->default(0)
                                            ->minValue(0)
                                            ->suffix('jiwa')
                                            ->placeholder('0'),
                                    ])
                                    ->columns(2),
                            ]),

                        // Tab 2: Data Wilayah
                        Forms\Components\Tabs\Tab::make('Wilayah')
                            ->icon('heroicon-o-map')
                            ->schema([
                                Forms\Components\Section::make('Data Wilayah')
                                    ->schema([
                                        Forms\Components\TextInput::make('luas_wilayah')
                                            ->label('Luas Wilayah')
                                            ->numeric()
                                            ->suffix('Ha (Hektar)')
                                            ->placeholder('0.00')
                                            ->step(0.01),

                                        Forms\Components\Textarea::make('mata_pencaharian_utama')
                                            ->label('Mata Pencaharian Utama')
                                            ->placeholder('Contoh: Petani, Nelayan, Pedagang')
                                            ->rows(2)
                                            ->helperText('Sebutkan mata pencaharian utama masyarakat')
                                            ->columnSpanFull(),
                                    ])
                                    ->columns(2),

                                Forms\Components\Section::make('Batas Wilayah')
                                    ->schema([
                                        Forms\Components\KeyValue::make('batas_wilayah')
                                            ->label('Batas Wilayah')
                                            ->keyLabel('Arah')
                                            ->valueLabel('Berbatasan dengan')
                                            ->addActionLabel('Tambah Batas')
                                            ->default([
                                                'Utara' => '',
                                                'Selatan' => '',
                                                'Timur' => '',
                                                'Barat' => '',
                                            ])
                                            ->helperText('Sebutkan wilayah yang berbatasan di setiap arah')
                                            ->columnSpanFull(),
                                    ]),
                            ]),

                        // Tab 3: Pendidikan
                        Forms\Components\Tabs\Tab::make('Pendidikan')
                            ->icon('heroicon-o-academic-cap')
                            ->schema([
                                Forms\Components\Section::make('Data Sekolah Dasar (SD)')
                                    ->schema([
                                        Forms\Components\TextInput::make('jumlah_sd')
                                            ->label('Jumlah SD')
                                            ->required()
                                            ->numeric()
                                            ->default(0)
                                            ->minValue(0)
                                            ->suffix('sekolah')
                                            ->placeholder('0'),

                                        Forms\Components\Textarea::make('nama_sd')
                                            ->label('Nama-nama SD')
                                            ->placeholder('Contoh: SD Negeri 1, SD Negeri 2')
                                            ->rows(3)
                                            ->helperText('Pisahkan dengan koma atau enter jika lebih dari satu')
                                            ->columnSpanFull(),
                                    ])
                                    ->columns(2),

                                Forms\Components\Section::make('Data Sekolah Menengah Pertama (SMP)')
                                    ->schema([
                                        Forms\Components\TextInput::make('jumlah_smp')
                                            ->label('Jumlah SMP')
                                            ->required()
                                            ->numeric()
                                            ->default(0)
                                            ->minValue(0)
                                            ->suffix('sekolah')
                                            ->placeholder('0'),

                                        Forms\Components\Textarea::make('nama_smp')
                                            ->label('Nama-nama SMP')
                                            ->placeholder('Contoh: SMP Negeri 1, SMP Swasta')
                                            ->rows(3)
                                            ->helperText('Pisahkan dengan koma atau enter jika lebih dari satu')
                                            ->columnSpanFull(),
                                    ])
                                    ->columns(2),

                                Forms\Components\Section::make('Data Sekolah Menengah Atas (SMA/SMK)')
                                    ->schema([
                                        Forms\Components\TextInput::make('jumlah_sma')
                                            ->label('Jumlah SMA/SMK')
                                            ->numeric()
                                            ->default(0)
                                            ->minValue(0)
                                            ->suffix('sekolah')
                                            ->placeholder('0'),

                                        Forms\Components\Textarea::make('nama_sma')
                                            ->label('Nama-nama SMA/SMK')
                                            ->placeholder('Contoh: SMA Negeri 1, SMK Swasta')
                                            ->rows(3)
                                            ->helperText('Pisahkan dengan koma atau enter jika lebih dari satu')
                                            ->columnSpanFull(),
                                    ])
                                    ->columns(2),
                            ]),

                        // Tab 4: Tempat Ibadah & Kesehatan
                        Forms\Components\Tabs\Tab::make('Fasilitas Umum')
                            ->icon('heroicon-o-building-library')
                            ->schema([
                                Forms\Components\Section::make('Tempat Ibadah')
                                    ->schema([
                                        Forms\Components\TextInput::make('jumlah_gereja')
                                            ->label('Jumlah Gereja')
                                            ->required()
                                            ->numeric()
                                            ->default(0)
                                            ->minValue(0)
                                            ->suffix('gereja')
                                            ->placeholder('0'),

                                        Forms\Components\Textarea::make('nama_gereja')
                                            ->label('Nama-nama Gereja')
                                            ->placeholder('Contoh: Gereja A, Gereja B')
                                            ->rows(3)
                                            ->helperText('Pisahkan dengan koma atau enter jika lebih dari satu')
                                            ->columnSpanFull(),

                                        Forms\Components\TextInput::make('jumlah_masjid')
                                            ->label('Jumlah Masjid')
                                            ->required()
                                            ->numeric()
                                            ->default(0)
                                            ->minValue(0)
                                            ->suffix('masjid')
                                            ->placeholder('0'),

                                        Forms\Components\Textarea::make('nama_masjid')
                                            ->label('Nama-nama Masjid')
                                            ->placeholder('Contoh: Masjid Al-Ikhlas, Masjid Nurul Huda')
                                            ->rows(3)
                                            ->helperText('Pisahkan dengan koma atau enter jika lebih dari satu')
                                            ->columnSpanFull(),
                                    ])
                                    ->columns(2),

                                Forms\Components\Section::make('Fasilitas Kesehatan')
                                    ->schema([
                                        Forms\Components\TextInput::make('jumlah_puskesmas')
                                            ->label('Jumlah Puskesmas/Pustu')
                                            ->numeric()
                                            ->default(0)
                                            ->minValue(0)
                                            ->suffix('unit')
                                            ->placeholder('0'),

                                        Forms\Components\Textarea::make('nama_puskesmas')
                                            ->label('Nama Puskesmas/Pustu')
                                            ->placeholder('Contoh: Puskesmas Desa A, Pustu Desa B')
                                            ->rows(2)
                                            ->columnSpanFull(),

                                        Forms\Components\TextInput::make('jumlah_posyandu')
                                            ->label('Jumlah Posyandu')
                                            ->numeric()
                                            ->default(0)
                                            ->minValue(0)
                                            ->suffix('posyandu')
                                            ->placeholder('0'),
                                    ])
                                    ->columns(2),
                            ]),

                        // Tab 5: Produk Unggulan
                        Forms\Components\Tabs\Tab::make('Produk Unggulan')
                            ->icon('heroicon-o-sparkles')
                            ->badge(fn ($record) => $record?->total_produk_unggulan)
                            ->schema([
                                Forms\Components\Section::make('Produk Unggulan Desa')
                                    ->description('Tambahkan produk unggulan desa seperti kopra, hasil pertanian, kerajinan, dll.')
                                    ->schema([
                                        Forms\Components\Repeater::make('produk_unggulan')
                                            ->label('')
                                            ->schema([
                                                Forms\Components\TextInput::make('nama_produk')
                                                    ->label('Nama Produk')
                                                    ->required()
                                                    ->placeholder('Contoh: Kopra, Cengkeh, Pala')
                                                    ->maxLength(255),

                                                Forms\Components\Select::make('kategori')
                                                    ->label('Kategori')
                                                    ->options([
                                                        'pertanian' => 'Pertanian',
                                                        'perkebunan' => 'Perkebunan',
                                                        'perikanan' => 'Perikanan',
                                                        'peternakan' => 'Peternakan',
                                                        'kerajinan' => 'Kerajinan',
                                                        'kuliner' => 'Kuliner',
                                                        'lainnya' => 'Lainnya',
                                                    ])
                                                    ->required()
                                                    ->searchable(),

                                                Forms\Components\Textarea::make('deskripsi')
                                                    ->label('Deskripsi Singkat')
                                                    ->placeholder('Jelaskan tentang produk ini...')
                                                    ->rows(3)
                                                    ->maxLength(500)
                                                    ->columnSpanFull(),

                                                Forms\Components\TextInput::make('produksi_tahunan')
                                                    ->label('Produksi/Tahun')
                                                    ->placeholder('Contoh: 500 ton, 1000 kg')
                                                    ->maxLength(100),

                                                Forms\Components\TextInput::make('harga_rata')
                                                    ->label('Harga Rata-rata')
                                                    ->placeholder('Contoh: Rp 15.000/kg')
                                                    ->maxLength(100),

                                                Forms\Components\FileUpload::make('foto_produk')
                                                    ->label('Foto Produk')
                                                    ->image()
                                                    ->directory('produk-unggulan')
                                                    ->maxSize(2048)
                                                    ->imageEditor()
                                                    ->helperText('Upload foto produk (max 2MB)'),

                                                Forms\Components\Toggle::make('is_active')
                                                    ->label('Aktif/Tampilkan')
                                                    ->default(true)
                                                    ->inline(false)
                                                    ->helperText('Produk akan ditampilkan di website jika aktif'),
                                            ])
                                            ->columns(3)
                                            ->itemLabel(fn (array $state): ?string => $state['nama_produk'] ?? null)
                                            ->collapsed()
                                            ->cloneable()
                                            ->collapsible()
                                            ->addActionLabel('Tambah Produk Unggulan')
                                            ->defaultItems(0)
                                            ->reorderableWithButtons()
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
                Tables\Columns\TextColumn::make('jumlah_penduduk')
                    ->label('Penduduk')
                    ->numeric()
                    ->suffix(' jiwa')
                    ->sortable()
                    ->icon('heroicon-o-users'),

                Tables\Columns\TextColumn::make('jumlah_kk')
                    ->label('KK')
                    ->numeric()
                    ->suffix(' KK')
                    ->sortable()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('total_produk_unggulan')
                    ->label('Produk Unggulan')
                    ->badge()
                    ->color('success')
                    ->icon('heroicon-o-sparkles'),

                Tables\Columns\TextColumn::make('jumlah_sd')
                    ->label('SD')
                    ->numeric()
                    ->sortable()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('jumlah_smp')
                    ->label('SMP')
                    ->numeric()
                    ->sortable()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('jumlah_gereja')
                    ->label('Gereja')
                    ->numeric()
                    ->sortable()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('jumlah_masjid')
                    ->label('Masjid')
                    ->numeric()
                    ->sortable()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('luas_wilayah')
                    ->label('Luas Wilayah')
                    ->suffix(' Ha')
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Terakhir Diubah')
                    ->dateTime('d M Y H:i')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                
            ])
            ->emptyStateHeading('Data desa belum tersedia')
            ->emptyStateDescription('Silakan tambahkan data desa.')
            ->emptyStateIcon('heroicon-o-building-office-2');
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
            'index' => Pages\ListDataDesas::route('/'),
            'edit' => Pages\EditDataDesa::route('/{record}/edit'),
        ];
    }

    
    public static function canCreate(): bool
    {
        return DataDesa::count() === 0;
    }
}