<?php

namespace App\Filament\Resources\IndustriResource\Pages;

use App\Filament\Resources\IndustriResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageIndustris extends ManageRecords
{
    protected static string $resource = IndustriResource::class;
    protected static ?string $title = 'Mitra Industri SIJA';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
