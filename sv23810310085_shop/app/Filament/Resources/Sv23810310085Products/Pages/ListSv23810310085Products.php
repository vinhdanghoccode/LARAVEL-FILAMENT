<?php

namespace App\Filament\Resources\Sv23810310085Products\Pages;

use App\Filament\Resources\Sv23810310085Products\Sv23810310085ProductResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSv23810310085Products extends ListRecords
{
    protected static string $resource = Sv23810310085ProductResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
