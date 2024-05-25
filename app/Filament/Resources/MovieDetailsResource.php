<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MovieDetailsResource\Pages;
use App\Filament\Resources\MovieDetailsResource\RelationManagers;
use App\Models\MovieDetail;
use App\Models\MovieDetails;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MovieDetailsResource extends Resource
{
    protected static ?string $model = MovieDetail::class;

    protected static ?string $navigationIcon = 'heroicon-o-film';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('role'),
                ImageColumn::make('people'),
                TextColumn::make('movie'),

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
            'index' => Pages\ListMovieDetails::route('/'),
            'create' => Pages\CreateMovieDetails::route('/create'),
            'edit' => Pages\EditMovieDetails::route('/{record}/edit'),
        ];
    }
}
