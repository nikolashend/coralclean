<?php

namespace App\Filament\Resources\Services\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
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
                                    ->required()
                                    ->columnSpanFull(),

                                Tabs::make('Translation Details')
                                    ->schema([
                                        Tab::make('Basic')
                                            ->icon('heroicon-o-document-text')
                                            ->schema([
                                                TextInput::make('title')
                                                    ->required(),
                                                TextInput::make('subtitle')
                                                    ->label('Subtitle'),
                                                TextInput::make('short_desc')
                                                    ->label('Short Description'),
                                                TextInput::make('price_anchor')
                                                    ->label('Price (shown on homepage)')
                                                    ->helperText('e.g. "от 55€" or "2.5€/м²"'),
                                                TextInput::make('cta_text')
                                                    ->label('CTA Button Text')
                                                    ->helperText('e.g. "Заказать уборку"'),
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
                                                    ->helperText('Max 5MB. Recommended: 1920x800px'),
                                                Textarea::make('text1')
                                                    ->label('Text Block 1')
                                                    ->rows(3),
                                                Textarea::make('text2')
                                                    ->label('Text Block 2')
                                                    ->rows(3),
                                            ]),

                                        Tab::make('Pricing')
                                            ->icon('heroicon-o-currency-euro')
                                            ->schema([
                                                Repeater::make('pricing_table')
                                                    ->label('Pricing Table')
                                                    ->schema([
                                                        TextInput::make('group')
                                                            ->label('Group Name')
                                                            ->helperText('e.g. "Квартиры", "Дома"'),
                                                        Repeater::make('items')
                                                            ->schema([
                                                                TextInput::make('name')
                                                                    ->label('Name'),
                                                                TextInput::make('price')
                                                                    ->label('Price'),
                                                            ])
                                                            ->columns(2)
                                                            ->defaultItems(0)
                                                            ->addActionLabel('+ Item')
                                                            ->collapsible(),
                                                    ])
                                                    ->defaultItems(0)
                                                    ->addActionLabel('+ Price Group')
                                                    ->collapsible(),
                                            ]),

                                        Tab::make('Included / Excluded')
                                            ->icon('heroicon-o-check-circle')
                                            ->schema([
                                                Repeater::make('included')
                                                    ->label('✅ What\'s Included')
                                                    ->simple(
                                                        TextInput::make('value')
                                                    )
                                                    ->defaultItems(0)
                                                    ->addActionLabel('+ Item')
                                                    ->collapsible(),
                                                Repeater::make('not_included')
                                                    ->label('❌ What\'s NOT Included')
                                                    ->simple(
                                                        TextInput::make('value')
                                                    )
                                                    ->defaultItems(0)
                                                    ->addActionLabel('+ Item')
                                                    ->collapsible(),
                                                Repeater::make('addons')
                                                    ->label('➕ Available Add-ons')
                                                    ->simple(
                                                        TextInput::make('value')
                                                    )
                                                    ->defaultItems(0)
                                                    ->addActionLabel('+ Add-on')
                                                    ->collapsible(),
                                            ]),

                                        Tab::make('FAQ')
                                            ->icon('heroicon-o-question-mark-circle')
                                            ->schema([
                                                Repeater::make('faq')
                                                    ->label('Frequently Asked Questions')
                                                    ->schema([
                                                        TextInput::make('q')
                                                            ->label('Question'),
                                                        Textarea::make('a')
                                                            ->label('Answer')
                                                            ->rows(2),
                                                    ])
                                                    ->defaultItems(0)
                                                    ->addActionLabel('+ FAQ')
                                                    ->collapsible(),
                                            ]),

                                        Tab::make('Process & Guarantee')
                                            ->icon('heroicon-o-shield-check')
                                            ->schema([
                                                Textarea::make('process')
                                                    ->label('How We Work / Process')
                                                    ->rows(4),
                                                Textarea::make('guarantee')
                                                    ->label('Guarantee / Quality Assurance')
                                                    ->rows(3),
                                            ]),
                                    ])
                                    ->columnSpanFull(),
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
