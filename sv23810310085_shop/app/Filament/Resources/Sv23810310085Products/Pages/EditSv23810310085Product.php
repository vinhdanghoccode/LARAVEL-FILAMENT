<?php

namespace App\Filament\Resources\Sv23810310085Products\Pages;

use App\Filament\Resources\Sv23810310085Products\Sv23810310085ProductResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditSv23810310085Product extends EditRecord
{
    protected static string $resource = Sv23810310085ProductResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
