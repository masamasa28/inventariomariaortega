<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CompraResource\Pages;
use App\Filament\Resources\CompraResource\RelationManagers;
use App\Models\Compra;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CompraResource extends Resource
{
    protected static ?string $model = Compra::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\TextInput::make('cantidad')
                ->required()
                ->numeric(),
            Forms\Components\TextInput::make('precio_compra')
                ->required()
                ->numeric(),
            Forms\Components\TextInput::make('valor_unidad')
                ->required()
                ->numeric(),
            Forms\Components\TextInput::make('soporte')
                ->required()
                ->maxLength(255),
           
            // Relación con Proveedor
            Forms\Components\Select::make('proveedor_id')
                ->label('Proveedor')
                ->relationship('proveedor', 'nombre')  
                ->required(),

            // Relación con Producto
            Forms\Components\Select::make('producto_id')
                ->label('Producto')
                ->relationship('producto', 'nombre')  
                ->required(),
        ]);
}

public static function table(Tables\Table $table): Tables\Table
{
    return $table
        ->columns([
            Tables\Columns\TextColumn::make('cantidad')
                ->numeric()
                ->sortable(),
            Tables\Columns\TextColumn::make('precio_compra')
                ->numeric()
                ->sortable(),
            Tables\Columns\TextColumn::make('valor_unidad')
                ->numeric()
                ->sortable(),
            Tables\Columns\TextColumn::make('soporte')
                ->searchable(),
            Tables\Columns\TextColumn::make('proveedor.nombre')  
                ->label('Proveedor')
                ->sortable(),
            Tables\Columns\TextColumn::make('producto.nombre') 
                ->label('Producto')
                ->sortable(),
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
            //
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
        'index' => Pages\ListCompras::route('/'),
        'create' => Pages\CreateCompra::route('/create'),
        'edit' => Pages\EditCompra::route('/{record}/edit'),
    ];
}
}