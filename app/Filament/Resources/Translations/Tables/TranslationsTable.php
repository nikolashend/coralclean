<?php

namespace App\Filament\Resources\Translations\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class TranslationsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('locale')
                    ->badge()
                    ->sortable(),
                TextColumn::make('group')
                    ->badge()
                    ->color('gray')
                    ->sortable(),
                TextColumn::make('key')
                    ->searchable()
                    ->limit(40),
                TextColumn::make('value')
                    ->searchable()
                    ->limit(60)
                    ->wrap(),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('group')
            ->filters([
                SelectFilter::make('locale')
                    ->options([
                        'ru' => 'Русский',
                        'et' => 'Eesti',
                        'en' => 'English',
                    ]),
                SelectFilter::make('group')
                    ->options(fn () => \App\Models\Translation::distinct()
                        ->pluck('group', 'group')
                        ->toArray()),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make()
                        ->requiresConfirmation(),
                ]),
            ]);
    }
}
