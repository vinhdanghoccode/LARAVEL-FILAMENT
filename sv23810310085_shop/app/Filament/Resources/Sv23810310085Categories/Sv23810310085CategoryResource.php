<?php

namespace App\Filament\Resources\Sv23810310085Categories;

use App\Filament\Resources\Sv23810310085Categories\Pages\CreateSv23810310085Category;
use App\Filament\Resources\Sv23810310085Categories\Pages\EditSv23810310085Category;
use App\Filament\Resources\Sv23810310085Categories\Pages\ListSv23810310085Categories;
use App\Filament\Resources\Sv23810310085Categories\Schemas\Sv23810310085CategoryForm;
use App\Filament\Resources\Sv23810310085Categories\Tables\Sv23810310085CategoriesTable;
use App\Models\Sv23810310085Category;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class Sv23810310085CategoryResource extends Resource
{
    protected static ?string $model = Sv23810310085Category::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        TextInput::make('name')
        ->live(onBlur: true)
        ->afterStateUpdated(fn ($state, callable $set) =>
            $set('slug', Str::slug($state)))
        ->required(),

        TextInput::make('slug')->required(),

        Textarea::make('description'),

        Toggle::make('is_visible')
        return Sv23810310085CategoryForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        TextColumn::make('name')->searchable(),
        IconColumn::make('is_visible')->boolean(),
        return Sv23810310085CategoriesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListSv23810310085Categories::route('/'),
            'create' => CreateSv23810310085Category::route('/create'),
            'edit' => EditSv23810310085Category::route('/{record}/edit'),
        ];
    }
}
