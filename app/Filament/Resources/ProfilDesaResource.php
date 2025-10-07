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
                Forms\Components\Section::make('Informasi Dasar')
                    ->schema([
                        Forms\Components\TextInput::make('nama_desa')
                            ->label('Nama Desa')
                            ->required()
                            ->maxLength(255),
                        
                        Forms\Components\Textarea::make('alamat')
                            ->label('Alamat Kantor Desa')
                            ->rows(3)
                            ->maxLength(65535),
                        
                        Forms\Components\TextInput::make('kontak')
                            ->label('Kontak (HP/WA/Email)')
                            ->maxLength(255)
                            ->placeholder('contoh: 0812-3456-7890 / email@desa.id'),
                    ])->columns(1),

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

                Forms\Components\Section::make('Banner & Struktur')
                    ->schema([
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
                    ])->columns(2),

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
                            ->maxLength(65535),
                        
                        Forms\Components\Textarea::make('misi')
                            ->label('Misi Desa')
                            ->rows(6)
                            ->maxLength(65535)
                            ->helperText('Pisahkan setiap poin misi dengan enter'),
                    ])->columns(1),

                Forms\Components\Section::make('Struktur Pemerintahan (Teks)')
                    ->schema([
                        Forms\Components\RichEditor::make('struktur_pemerintahan')
                            ->label('Struktur Pemerintahan')
                            ->toolbarButtons([
                                'bold',
                                'italic',
                                'bulletList',
                                'orderedList',
                                'h3',
                                'undo',
                                'redo',
                            ])
                            ->helperText('Anda bisa menuliskan daftar perangkat desa di sini, atau cukup upload gambar struktur di atas')
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_desa')
                    ->label('Nama Desa')
                    ->searchable()
                    ->sortable(),
                
                Tables\Columns\ImageColumn::make('banner')
                    ->label('Banner')
                    ->circular(),
                
                Tables\Columns\TextColumn::make('kontak')
                    ->label('Kontak')
                    ->searchable(),
                
                Tables\Columns\IconColumn::make('latitude')
                    ->label('Lokasi')
                    ->boolean()
                    ->trueIcon('heroicon-o-map-pin')
                    ->falseIcon('heroicon-o-x-circle')
                    ->trueColor('success')
                    ->falseColor('danger')
                    ->getStateUsing(fn ($record) => !is_null($record->latitude) && !is_null($record->longitude)),
                
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Terakhir Diupdate')
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
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateHeading('Belum ada profil desa')
            ->emptyStateDescription('Silakan tambahkan profil desa untuk ditampilkan di website.')
            ->emptyStateIcon('heroicon-o-home');
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
        ];
    }
}