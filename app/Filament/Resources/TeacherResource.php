<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TeacherResource\Pages;
use App\Models\Teacher;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class TeacherResource extends Resource
{
    protected static ?string $model = Teacher::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';
    
    protected static ?string $navigationGroup = 'Website Content';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Teacher Information')
                    ->schema([
                        // Mengubah FileUpload menjadi TextInput untuk URL gambar
                        Forms\Components\TextInput::make('image')
                            ->url() // Menyatakan bahwa ini adalah URL gambar
                            ->maxLength(255) // Menentukan panjang maksimal URL
                            ->nullable(), // Tidak wajib diisi
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Textarea::make('description')
                            ->required()
                            ->maxLength(500)
                            ->columnSpanFull(),
                    ]),
                Forms\Components\Section::make('Social Media Links')
                    ->schema([
                        Forms\Components\TextInput::make('facebook_url')
                            ->url()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('twitter_url')
                            ->url()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('instagram_url')
                            ->url()
                            ->maxLength(255),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image') // Masih menggunakan ImageColumn untuk menampilkan gambar
                    ->square(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([ 
                // Filter kosong, bisa ditambahkan jika perlu
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
            // Relations jika ada
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTeachers::route('/'),
            'create' => Pages\CreateTeacher::route('/create'),
            'edit' => Pages\EditTeacher::route('/{record}/edit'),
        ];
    }
}
