<?php

namespace App\Filament\Resources\Sv23810310085Products\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class Sv23810310085ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('category_id')
                    ->required()
                    ->numeric(),
                TextInput::make('name')
                    ->required(),
                TextInput::make('slug')
                    ->required(),
                Textarea::make('description')
                    ->columnSpanFull(),
                TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->default(0.0)
                    ->prefix('$'),
                TextInput::make('stock_quantity')
                    ->required()
                    ->numeric()
                    ->default(0),
                FileUpload::make('image_path')
                    ->image(),
                Select::make('status')
                    ->options(['draft' => 'Draft', 'published' => 'Published', 'out_of_stock' => 'Out of stock'])
                    ->required(),
                TextInput::make('discount_percent')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
