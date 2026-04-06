<?php

namespace App\Filament\Resources\Sv23810310085Products;

use App\Filament\Resources\Sv23810310085Products\Pages\CreateSv23810310085Product;
use App\Filament\Resources\Sv23810310085Products\Pages\EditSv23810310085Product;
use App\Filament\Resources\Sv23810310085Products\Pages\ListSv23810310085Products;
use App\Filament\Resources\Sv23810310085Products\Schemas\Sv23810310085ProductForm;
use App\Filament\Resources\Sv23810310085Products\Tables\Sv23810310085ProductsTable;
use App\Models\Sv23810310085Product;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class Sv23810310085ProductResource extends Resource
{
    protected static ?string $model = Sv23810310085Product::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        Grid::make(2)->schema([
    Select::make('category_id')
        ->relationship('category', 'name')
        ->required(),

    TextInput::make('name')
        ->live(onBlur: true)
        ->afterStateUpdated(fn ($state, callable $set) =>
            $set('slug', Str::slug($state)))
        ->required(),

    TextInput::make('slug'),

    TextInput::make('price')
        ->numeric()
        ->minValue(0)
        ->required(),

    TextInput::make('stock_quantity')
        ->integer()
        ->required(),

    TextInput::make('discount_percent')
        ->numeric()
        ->minValue(0)
        ->maxValue(100),

    FileUpload::make('image_path')
        ->image()
        ->directory('products'),

    Select::make('status')
        ->options([
            'draft' => 'Draft',
            'published' => 'Published',
            'out_of_stock' => 'Out of Stock',
        ]),

    RichEditor::make('description')
        ->columnSpanFull(),
        ]);
        return Sv23810310085ProductForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        TextColumn::make('name')->searchable(),
        TextColumn::make('category.name'),
        TextColumn::make('price')->money('VND'),
        TextColumn::make('discount_percent')->suffix('%'),
        TextColumn::make('stock_quantity'),
        BadgeColumn::make('status'),
        return Sv23810310085ProductsTable::configure($table);
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
            'index' => ListSv23810310085Products::route('/'),
            'create' => CreateSv23810310085Product::route('/create'),
            'edit' => EditSv23810310085Product::route('/{record}/edit'),
        ];
    }
}
