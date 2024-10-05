<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SaleResource\Pages;
use App\Filament\Resources\SaleResource\RelationManagers;
use App\Models\Sale;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SaleResource extends Resource
{
    protected static ?string $model = Sale::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\Select::make('producto_id')
                ->relationship('producto', 'nombre') // 'nombre' es el campo a mostrar
                ->required(),

            Forms\Components\Select::make('cliente_id')
                ->relationship('cliente', 'nombre') // 'nombre' es el campo a mostrar
                ->required(),

            Forms\Components\TextInput::make('cantidad')
                ->required()
                ->numeric(),

            Forms\Components\TextInput::make('precio_venta')
                ->required()
                ->numeric(),
        ]);
}

public static function table(Table $table): Table
{
    return $table
        ->columns([
            Tables\Columns\TextColumn::make('producto.nombre')
                ->sortable(),
            Tables\Columns\TextColumn::make('cliente.nombre')
                ->sortable(),
            Tables\Columns\TextColumn::make('cantidad')
                ->sortable()
                ->numeric(),
            Tables\Columns\TextColumn::make('precio_venta')
                ->sortable()
                ->numeric(),
            Tables\Columns\TextColumn::make('created_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            Tables\Columns\TextColumn::make('updated_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
        ])
        ->filters([
            // Puedes agregar filtros aquí si es necesario
        ])
        ->actions([
            Tables\Actions\EditAction::make(),
        ])
        ->bulkActions([
            Tables\Actions\BulkActionGroup::make([
                Tables\Actions\DeleteBulkAction::make(),
            ]),
        ]);
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
            'index' => Pages\ListSales::route('/'),
            'create' => Pages\CreateSale::route('/create'),
            'edit' => Pages\EditSale::route('/{record}/edit'),
        ];
    }
}
