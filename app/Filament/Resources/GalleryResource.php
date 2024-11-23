<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GalleryResource\Pages;
use App\Filament\Resources\GalleryResource\RelationManagers;
use App\Models\Gallery;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class GalleryResource extends Resource
{
    protected static ?string $model = Gallery::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';
    protected static ?string $navigationGroup = 'Website Content';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Gallery Item')
                    ->schema([
                        // Mengubah FileUpload menjadi TextInput untuk URL gambar
                        Forms\Components\TextInput::make('image')
                            ->url() // Menyatakan bahwa ini adalah URL
                            ->maxLength(255) // Menentukan panjang maksimal URL
                            ->nullable(), // Tidak wajib diisi
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('description')
                            ->required(),
                        Forms\Components\Select::make('category')
                            ->options([
                                'kegiatan' => 'Kegiatan Sekolah',
                                'prestasi' => 'Prestasi Siswa',
                                'fasilitas' => 'Fasilitas',
                                'ekstrakurikuler' => 'Ekstrakurikuler',
                            ])
                            ->required(),
                        Forms\Components\RichEditor::make('content')
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image'), // Masih menggunakan ImageColumn untuk menampilkan gambar
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('category'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('category')
                    ->options([
                        'kegiatan' => 'Kegiatan Sekolah',
                        'prestasi' => 'Prestasi Siswa',
                        'fasilitas' => 'Fasilitas',
                        'ekstrakurikuler' => 'Ekstrakurikuler',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\CommentsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListGalleries::route('/'),
            'create' => Pages\CreateGallery::route('/create'),
            'edit' => Pages\EditGallery::route('/{record}/edit'),
        ];
    }
}
