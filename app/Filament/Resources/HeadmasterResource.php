<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HeadmasterResource\Pages;
use App\Models\Headmaster;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class HeadmasterResource extends Resource
{
    protected static ?string $model = Headmaster::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';



    public static function form(Form $form): Form
    {
        return $form
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
                    ->maxLength(255)
                    ->default('Kepala Sekolah'),
                Forms\Components\Textarea::make('quote')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image'), // Masih menggunakan ImageColumn untuk menampilkan gambar
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([ 
                // Filter kosong, bisa ditambahkan jika perlu
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ManageHeadmasters::route('/'),
        ];
    }
}
