<?php

namespace App\Filament\Resources\Products;

use App\Filament\Resources\Products\Pages\ManageProducts;
use App\Models\Sv23810310085Product;
use BackedEnum;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class ProductResource extends Resource
{
    protected static ?string $model = Sv23810310085Product::class;

    protected static ?string $slug = 'sv23810310085-products';

    protected static ?string $navigationLabel = 'Sv23810310085 Products';

    protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-shopping-bag';

    protected static ?string $recordTitleAttribute = 'name';

    public static function getPages(): array
    {
        return [
            'index' => ManageProducts::route('/'),
        ];
    }

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Grid::make(2)->schema([
                Select::make('category_id')
                    ->relationship('category', 'name')
                    ->required(),

                TextInput::make('name')
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn ($state, callable $set) =>
                        $set('slug', Str::slug($state)))
                    ->required(),

                TextInput::make('slug')
                    ->required(),

                TextInput::make('price')
                    ->numeric()
                    ->minValue(0)
                    ->required(),

                TextInput::make('stock_quantity')
                    ->integer()
                    ->minValue(0)
                    ->required(),

                TextInput::make('discount_percent')
                    ->numeric()
                    ->minValue(0)
                    ->maxValue(100),

                FileUpload::make('image_path')
                    ->image()
                    ->maxFiles(1)
                    ->directory('products'),

                Select::make('status')
                    ->options([
                        'draft' => 'Draft',
                        'published' => 'Published',
                        'out_of_stock' => 'Out of Stock',
                    ]),

                RichEditor::make('description')
                    ->columnSpanFull(),
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->searchable(),
                TextColumn::make('category.name')->label('Category'),
                TextColumn::make('price')->money('VND'),
                TextColumn::make('discount_percent')->suffix('%'),
                TextColumn::make('stock_quantity'),
                BadgeColumn::make('status'),
            ])
            ->filters([
                SelectFilter::make('category_id')
                    ->label('Category')
                    ->relationship('category', 'name'),
            ]);
    }
}