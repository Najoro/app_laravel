<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Enums\Operation;
use Tiptap\Editor;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informations personnelles')
                    ->description('General Information')
                    ->schema([
                        Grid::make(2) // 2 colonnes
                            ->schema([
                                TextInput::make('name')
                                    ->required()
                                    ->maxLength(255)
                                    ->columnSpanFull(), // Prend 1 colonne sur 2
                                TextInput::make('email')
                                    ->required()
                                    ->maxLength(255)
                                    ->email()
                                    ->columnSpanFull(), // Prend 1 colonne sur 2
                            ]),
                    ])
                    ->columns(1), // Section avec 2 colonnes
                
                Section::make('Security')
                    ->description('Define params secure')
                    ->schema([
                        TextInput::make('password')
                            ->label('Password')
                            ->required()
                            ->maxLength(255)
                            ->password()
                            ->revealable()
                            ->hiddenOn(Operation::Edit)
                            ->columnSpanFull(), // Prend toute la largeur (1 row)
                        TextInput::make("password_confirm")
                            ->label("Password Confirm")
                            ->password()
                            ->revealable()
                            ->required()
                            ->maxLength(255)
                            ->same("password")
                            ->hiddenOn(Operation::Edit)
                            ->columnSpanFull(), // Prend toute la largeur (1 row)
                    ])
                    ->columns(1), // Section avec 1 colonne
            ]);
    }
}
