<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactResource\Pages;
use App\Models\Contact;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Select;
use Filament\Schemas\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use UnitEnum;

class ContactResource extends Resource
{
    protected static ?string $model = Contact::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedPhone;

    protected static ?string $navigationLabel = 'Contacts';

    protected static string|UnitEnum|null $navigationGroup = 'Settings';

    protected static ?int $navigationSort = 10;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('locale')
                    ->label('Locale')
                    ->options([
                        'ru' => 'Русский (RU)',
                        'et' => 'Eesti (ET)',
                        'en' => 'English (EN)',
                    ])
                    ->required()
                    ->unique(ignoreRecord: true),

                Section::make('Phone Information')
                    ->schema([
                        TextInput::make('phone')
                            ->label('Phone (formatted)')
                            ->placeholder('+372 893 720 1025')
                            ->required()
                            ->maxLength(255),

                        TextInput::make('phone_clean')
                            ->label('Phone (clean, no spaces)')
                            ->placeholder('3728937201025')
                            ->required()
                            ->maxLength(255),

                        TextInput::make('whatsapp')
                            ->label('WhatsApp Link')
                            ->placeholder('https://wa.me/3728937201025')
                            ->url()
                            ->required()
                            ->maxLength(255),
                    ])
                    ->columns(3),

                Section::make('Contact Details')
                    ->schema([
                        TextInput::make('email')
                            ->label('Email')
                            ->email()
                            ->required()
                            ->maxLength(255),

                        TextInput::make('address')
                            ->label('Address')
                            ->maxLength(255),
                    ])
                    ->columns(2),

                Section::make('Social Media')
                    ->schema([
                        TextInput::make('instagram')
                            ->label('Instagram URL')
                            ->url()
                            ->maxLength(255),

                        TextInput::make('facebook')
                            ->label('Facebook URL')
                            ->url()
                            ->maxLength(255),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('locale')
                    ->label('Locale')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'ru' => 'danger',
                        'et' => 'info',
                        'en' => 'success',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => strtoupper($state))
                    ->sortable(),

                TextColumn::make('phone')
                    ->label('Phone')
                    ->copyable()
                    ->sortable()
                    ->searchable(),

                TextColumn::make('email')
                    ->label('Email')
                    ->copyable()
                    ->sortable()
                    ->searchable(),

                TextColumn::make('whatsapp')
                    ->label('WhatsApp')
                    ->limit(30)
                    ->tooltip(fn ($record) => $record->whatsapp),

                TextColumn::make('updated_at')
                    ->label('Last Updated')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('locale')
                    ->options([
                        'ru' => 'Russian',
                        'et' => 'Estonian',
                        'en' => 'English',
                    ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListContacts::route('/'),
            'create' => Pages\CreateContact::route('/create'),
            'edit' => Pages\EditContact::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
}
