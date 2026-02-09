<?php

namespace App\Filament\Resources\Translations\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class TranslationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('locale')
                    ->options([
                        'ru' => 'Русский',
                        'et' => 'Eesti',
                        'en' => 'English',
                    ])
                    ->required(),
                TextInput::make('group')
                    ->required()
                    ->helperText('Translation group, e.g. "home"')
                    ->datalist([
                        'home',
                        'nav',
                        'form',
                        'footer',
                        'hero',
                        'packages',
                        'services',
                        'about',
                        'faq',
                        'reviews',
                        'trust',
                        'cta',
                        'stats',
                    ]),
                TextInput::make('key')
                    ->required()
                    ->helperText('Translation key, e.g. "hero_title"'),
                Textarea::make('value')
                    ->required()
                    ->rows(4)
                    ->columnSpanFull(),
            ]);
    }
}
