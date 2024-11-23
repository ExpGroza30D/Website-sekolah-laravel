<?php

namespace App\Filament\Resources\HeadmasterResource\Pages;

use App\Filament\Resources\HeadmasterResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageHeadmasters extends ManageRecords
{
    protected static string $resource = HeadmasterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}