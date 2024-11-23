<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VisionMissionResource\Pages;
use App\Models\VisionMission;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class VisionMissionResource extends Resource
{
    protected static ?string $model = VisionMission::class;

    protected static ?string $navigationIcon = 'heroicon-o-eye';

    protected static ?string $navigationGroup = 'Website Content';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Vision Section')
                    ->schema([
                        // Mengubah FileUpload menjadi TextInput untuk URL gambar
                        Forms\Components\TextInput::make('vision_image')
                            ->url() // Menyatakan bahwa ini adalah URL gambar
                            ->maxLength(255) // Menentukan panjang maksimal URL
                            ->nullable(), // Tidak wajib diisi
                        Forms\Components\TextInput::make('vision_title')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Textarea::make('vision_content')
                            ->required()
                            ->rows(4),
                    ]),
                Forms\Components\Section::make('Mission Section')
                    ->schema([
                        // Mengubah FileUpload menjadi TextInput untuk URL gambar
                        Forms\Components\TextInput::make('mission_image')
                            ->url() // Menyatakan bahwa ini adalah URL gambar
                            ->maxLength(255) // Menentukan panjang maksimal URL
                            ->nullable(), // Tidak wajib diisi
                        Forms\Components\TextInput::make('mission_title')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Textarea::make('mission_content')
                            ->required()
                            ->rows(6),
                    ]),
                Forms\Components\Toggle::make('is_active')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('vision_image'), // Masih menggunakan ImageColumn untuk menampilkan gambar
                Tables\Columns\TextColumn::make('vision_title')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('mission_image'), // Masih menggunakan ImageColumn untuk menampilkan gambar
                Tables\Columns\TextColumn::make('mission_title')
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('is_active'),
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListVisionMissions::route('/'),
            'create' => Pages\CreateVisionMission::route('/create'),
            'edit' => Pages\EditVisionMission::route('/{record}/edit'),
        ];
    }
}
