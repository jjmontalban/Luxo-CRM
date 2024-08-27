<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Models\Product;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-cube';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('reference')
                    ->required()
                    ->unique(Product::class, 'reference', ignoreRecord: true),
                Forms\Components\TextInput::make('price_excluding_tax')
                    ->required()
                    ->numeric()
                    ->minValue(0),
                Forms\Components\Select::make('tax')
                    ->options([
                        0 => '0%',
                        10 => '10%',
                        21 => '21%',
                    ])
                    ->required(),
                Forms\Components\TextInput::make('stock')
                    ->required()
                    ->numeric()
                    ->minValue(0),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('reference'),
                Tables\Columns\TextColumn::make('price_excluding_tax'),
                Tables\Columns\TextColumn::make('tax')
                    ->label('Tax (%)'),
                Tables\Columns\TextColumn::make('stock')
                    ->sortable(),
            ])
            ->filters([
                // Agregar filtros si es necesario
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            // Relacionar productos con categorías
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
