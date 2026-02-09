<?php

namespace App\Filament\Resources\SiteSettings\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class SiteSettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Setting')
                    ->schema([
                        TextInput::make('key')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->helperText('Unique key, e.g. "phone", "email", "company_name"'),
                        TextInput::make('label')
                            ->helperText('Human-readable label for this setting'),
                        Select::make('group')
                            ->options([
                                'contact' => 'Contact Information',
                                'company' => 'Company Details',
                                'social' => 'Social Media',
                                'general' => 'General',
                                'seo' => 'SEO',
                            ])
                            ->default('general')
                            ->required(),
                        Select::make('type')
                            ->options([
                                'text' => 'Text',
                                'textarea' => 'Textarea',
                                'email' => 'Email',
                                'tel' => 'Phone',
                                'url' => 'URL',
                            ])
                            ->default('text'),
                    ])->columns(2),

                Section::make('Values (per language)')
                    ->schema([
                        TextInput::make('value.ru')
                            ->label('🇷🇺 Русский'),
                        TextInput::make('value.en')
                            ->label('🇬🇧 English'),
                        TextInput::make('value.et')
                            ->label('🇪🇪 Eesti'),
                    ]),
            ]);
    }
}
