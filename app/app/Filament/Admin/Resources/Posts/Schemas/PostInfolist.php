<?php

namespace App\Filament\Admin\Resources\Posts\Schemas;

use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class PostInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('title'),
                TextEntry::make('slug'),
                TextEntry::make('content')
                    ->columnSpanFull(),
                TextEntry::make('excerpt')
                    ->placeholder('-')
                    ->columnSpanFull(),
                ImageEntry::make('featured_image')
                    ->placeholder('-'),
                TextEntry::make('status'),
                TextEntry::make('published_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('category.name')
                    ->label('Category'),
                TextEntry::make('user.name')
                    ->label('User'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
