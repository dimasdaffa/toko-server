<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ItemResource\Pages;
use App\Filament\Resources\ItemResource\RelationManagers;
use App\Models\Item;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ItemResource extends Resource
{
    protected static ?string $model = Item::class;

    protected static ?string $navigationIcon = 'heroicon-o-cube';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(100)
                    ->label('Nama Item'),

                Forms\Components\Textarea::make('description')
                    ->required()
                    ->label('Deskripsi'),

                Forms\Components\TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->label('Price'),

                Forms\Components\TextInput::make('quantity')
                    ->required()
                    ->numeric()
                    ->label('Quantity'),

                Forms\Components\Select::make('category_id')
                    ->label('Kategori')
                    ->relationship('category', 'name')
                    ->required()
                    ->preload()
                    ->searchable(),

                Forms\Components\Select::make('supplier_id')
                    ->label('Supplier')
                    ->relationship('supplier', 'name')
                    ->required()
                    ->preload()
                    ->searchable(),

                Forms\Components\Select::make('created_by')
                    ->label('Admin Pembuat')
                    ->relationship('admin', 'username')
                    ->required()
                    ->preload()
                    ->searchable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->label('Nama')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('description')->label('Deskripsi')->limit(30),
                Tables\Columns\TextColumn::make('price')->label('Harga'),
                Tables\Columns\TextColumn::make('quantity')->label('Jumlah'),
                Tables\Columns\TextColumn::make('category.name')->label('Kategori'),
                Tables\Columns\TextColumn::make('supplier.name')->label('Supplier'),
                Tables\Columns\TextColumn::make('admin.username')->label('Dibuat Oleh'),
                Tables\Columns\TextColumn::make('created_at')->label('Dibuat Pada')->dateTime()->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListItems::route('/'),
            // 'create' => Pages\CreateItem::route('/create'),
            // 'edit' => Pages\EditItem::route('/{record}/edit'),
        ];
    }
}
