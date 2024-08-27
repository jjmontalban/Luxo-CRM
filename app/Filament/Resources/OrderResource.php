<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Models\Order;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('customer_id')
                    ->relationship('customer', 'name')
                    ->required(),
                Forms\Components\DateTimePicker::make('order_date')
                    ->required(),
                Forms\Components\TextInput::make('total')
                    ->required()
                    ->numeric()
                    ->minValue(0),
                Forms\Components\Select::make('payment_method')
                    ->options([
                        'cash_on_delivery' => 'Cash on Delivery',
                        'bizum' => 'Bizum',
                        'card' => 'Card',
                        'bank_transfer' => 'Bank Transfer',
                        'paypal' => 'PayPal',
                    ])
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('customer.name')
                    ->label('Customer')
                    ->sortable(),
                Tables\Columns\TextColumn::make('order_date')
                    ->sortable(),
                Tables\Columns\TextColumn::make('total')
                    ->sortable(),
                Tables\Columns\TextColumn::make('payment_method'),
            ])
            ->filters([
                // Agregar filtros personalizados si es necesario
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
            // Relacionar pedidos con productos, etc.
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
