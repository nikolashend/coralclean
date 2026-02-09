<?php

namespace App\Filament\Resources\ContactRequests\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ContactRequestForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email(),
                TextInput::make('phone')
                    ->tel()
                    ->required(),
                TextInput::make('service')
                    ->label('Service Type'),
                DatePicker::make('preferred_date')
                    ->label('Preferred Date')
                    ->displayFormat('d.m.Y')
                    ->native(false),
                Textarea::make('message')
                    ->columnSpanFull(),
                TextInput::make('locale')
                    ->required()
                    ->default('ru'),
                Select::make('status')
                    ->options([
            'new' => 'New',
            'processing' => 'Processing',
            'completed' => 'Completed',
            'cancelled' => 'Cancelled',
        ])
                    ->default('new')
                    ->required(),
            ]);
    }
}
