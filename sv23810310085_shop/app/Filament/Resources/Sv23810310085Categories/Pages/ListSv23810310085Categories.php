<?php

namespace App\Filament\Resources\Sv23810310085Categories\Pages;

use App\Filament\Resources\Sv23810310085Categories\Sv23810310085CategoryResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSv23810310085Categories extends ListRecords
{
    protected static string $resource = Sv23810310085CategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
