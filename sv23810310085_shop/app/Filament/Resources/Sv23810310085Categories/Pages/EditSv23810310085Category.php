<?php

namespace App\Filament\Resources\Sv23810310085Categories\Pages;

use App\Filament\Resources\Sv23810310085Categories\Sv23810310085CategoryResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditSv23810310085Category extends EditRecord
{
    protected static string $resource = Sv23810310085CategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
