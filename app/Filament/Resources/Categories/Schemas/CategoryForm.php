<?php

namespace App\Filament\Resources\Categories\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class CategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make([
                    Grid::make()
                        ->schema([
                            TextInput::make('name')
                                ->live()
                                ->afterStateUpdated(fn(string $operation, $state, Set $set) => $operation == "create" ? $set("slug", Str::slug($state)) : null)
                                ->required(),
                            TextInput::make('slug')
                                ->required()
                                ->dehydrated(),
                        ]),
                        
                    FileUpload::make('image')
                        ->image(),
                        
                    Toggle::make('is_active')
                        ->required(),
                ])
            ]);
    }
}
