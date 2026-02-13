<?php

namespace App\Filament\Resources\Services\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\KeyValue;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ServiceForm
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
                            ->helperText('URL slug, e.g. "home-cleaning"'),
                        Select::make('icon')
                            ->options([
                                'flaticon-house' => 'House',
                                'flaticon-houses' => 'Houses',
                                'flaticon-clean' => 'Clean',
                                'flaticon-clean-1' => 'Clean 1',
                                'flaticon-clean-2' => 'Clean 2',
                                'flaticon-clean-3' => 'Clean 3',
                                'flaticon-mop' => 'Mop',
                                'flaticon-vacuum' => 'Vacuum',
                                'flaticon-brush' => 'Brush',
                                'flaticon-dishwasher' => 'Dishwasher',
                                'flaticon-computer' => 'Computer',
                                'flaticon-cog' => 'Settings/Cog',
                                'flaticon-settings' => 'Settings',
                                'flaticon-clipboard' => 'Clipboard',
                                'flaticon-moving-truck' => 'Moving Truck',
                                'flaticon-truck' => 'Truck',
                            ])
                            ->searchable()
                            ->helperText('Choose an icon for this service'),
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
                                TextInput::make('short_desc')
                                    ->label('Short Description'),
                                TextInput::make('price_anchor')
                                    ->label('Price Badge (shown on homepage)')
                                    ->helperText('e.g. "от 55€" or "2.5€/м²"')
                                    ->maxLength(50),
                                Repeater::make('pricing_table')
                                    ->label('Pricing Table (for service detail page)')
                                    ->schema([
                                        TextInput::make('group_name')
                                            ->label('Group Name (optional)')
                                            ->helperText('e.g. "Квартиры" or leave empty for no grouping'),
                                        Repeater::make('items')
                                            ->schema([
                                                TextInput::make('name')
                                                    ->label('Service Name'),
                                                TextInput::make('price')
                                                    ->label('Price')
                                                    ->helperText('e.g. "55€" or "2.5€/м²"'),
                                            ])
                                            ->columns(2)
                                            ->defaultItems(0)
                                            ->addActionLabel('Add Price Item')
                                            ->collapsible()
                                    ])
                                    ->columns(1)
                                    ->collapsible()
                                    ->defaultItems(0)
                                    ->addActionLabel('Add Price Group'),
                                Repeater::make('included')
                                    ->label('What\'s Included')
                                    ->schema([
                                        TextInput::make('item')
                                            ->label('Item')
                                    ])
                                    ->addActionLabel('Add Item')
                                    ->collapsible()
                                    ->defaultItems(0),
                                Repeater::make('not_included')
                                    ->label('What\'s NOT Included')
                                    ->schema([
                                        TextInput::make('item')
                                            ->label('Item')
                                    ])
                                    ->addActionLabel('Add Item')
                                    ->collapsible()
                                    ->defaultItems(0),
                                Repeater::make('addons')
                                    ->label('Available Add-ons (extra services)')
                                    ->schema([
                                        TextInput::make('item')
                                            ->label('Add-on')
                                    ])
                                    ->addActionLabel('Add Add-on')
                                    ->collapsible()
                                    ->defaultItems(0),
                                Textarea::make('description')
                                    ->rows(3),
                                FileUpload::make('image_path')
                                    ->label('Service Image')
                                    ->image()
                                    ->directory('coralclean/services')
                                    ->disk('public')
                                    ->visibility('public')
                                    ->imagePreviewHeight('200')
                                    ->preserveFilenames()
                                    ->acceptedFileTypes(['image/png', 'image/jpeg', 'image/jpg', 'image/webp'])
                                    ->maxSize(5120)
                                    ->helperText('Upload new image or keep existing. Max 5MB. Recommended: 1920x800px')
                                    ->columnSpanFull(),
                                Textarea::make('text1')
                                    ->label('Text Block 1')
                                    ->rows(4),
                                Textarea::make('text2')
                                    ->label('Text Block 2')
                                    ->rows(4),
                                Repeater::make('faq')
                                    ->label('FAQ (Frequently Asked Questions)')
                                    ->schema([
                                        TextInput::make('question')
                                            ->columnSpanFull(),
                                        Textarea::make('answer')
                                            ->rows(2)
                                            ->columnSpanFull(),
                                    ])
                                    ->columns(1)
                                    ->collapsible()
                                    ->addActionLabel('Add FAQ'),
                                Textarea::make('process')
                                    ->label('How We Work / Process')
                                    ->rows(3),
                                Textarea::make('guarantee')
                                    ->label('Guarantee / Quality Assurance')
                                    ->rows(2),
                                TextInput::make('cta_text')
                                    ->label('CTA Button Text')
                                    ->helperText('e.g. "Заказать услугу"'),
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
