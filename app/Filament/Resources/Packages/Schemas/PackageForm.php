<?php

namespace App\Filament\Resources\Packages\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class PackageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('General')
                    ->schema([
                        TextInput::make('slug')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->helperText('URL slug, e.g. "quick"'),
                        Select::make('icon')
                            ->options([
                                'flaticon-clean' => 'Clean',
                                'flaticon-clean-1' => 'Clean 1',
                                'flaticon-clean-2' => 'Clean 2',
                                'flaticon-clean-3' => 'Clean 3',
                                'flaticon-mop' => 'Mop',
                                'flaticon-vacuum' => 'Vacuum',
                                'flaticon-brush' => 'Brush',
                                'flaticon-house' => 'House',
                                'flaticon-stopwatch' => 'Stopwatch',
                                'flaticon-truck' => 'Truck',
                                'flaticon-moving-truck' => 'Moving Truck',
                            ])
                            ->searchable()
                            ->helperText('Choose an icon for this package'),
                        FileUpload::make('image')
                            ->label('Background Image')
                            ->image()
                            ->directory('coralclean/packages')
                            ->disk('public')
                            ->visibility('public')
                            ->imagePreviewHeight('150')
                            ->preserveFilenames()
                            ->acceptedFileTypes(['image/png', 'image/jpeg', 'image/jpg', 'image/webp'])
                            ->maxSize(5120)
                            ->helperText('Upload package background image. Max 5MB. Recommended: 800x600px')
                            ->columnSpanFull(),
                        Select::make('column_span')
                            ->options([
                                4 => 'col-lg-4 (3 per row)',
                                6 => 'col-lg-6 (2 per row)',
                            ])
                            ->default(4),
                        TextInput::make('sort_order')
                            ->numeric()
                            ->default(0),
                        Toggle::make('is_active')
                            ->default(true),
                    ])->columns(2),

                Section::make('Translations')
                    ->schema([
                        Repeater::make('translations')
                            ->relationship()
                            ->schema([
                                Select::make('locale')
                                    ->options([
                                        'ru' => 'Русский',
                                        'et' => 'Eesti',
                                        'en' => 'English',
                                    ])
                                    ->required(),
                                TextInput::make('title')
                                    ->required(),
                                TextInput::make('subtitle'),
                                Textarea::make('description')
                                    ->rows(3),
                                TextInput::make('price')
                                    ->helperText('e.g. "от 45 €"'),
                                TextInput::make('btn_text')
                                    ->label('Button Text')
                                    ->helperText('e.g. "Заказать уборку"'),
                                TagsInput::make('features')
                                    ->helperText('Add each feature line as a separate tag'),
                            ])
                            ->columns(1)
                            ->defaultItems(3)
                            ->addActionLabel('Add Translation')
                            ->collapsible()
                            ->deleteAction(
                                fn ($action) => $action->requiresConfirmation()
                            )
                            ->itemLabel(fn (array $state): ?string => match($state['locale'] ?? null) {
                                'ru' => '🇷🇺 Русский',
                                'et' => '🇪🇪 Eesti',
                                'en' => '🇬🇧 English',
                                default => 'Translation',
                            }),
                    ]),
            ]);
    }
}
