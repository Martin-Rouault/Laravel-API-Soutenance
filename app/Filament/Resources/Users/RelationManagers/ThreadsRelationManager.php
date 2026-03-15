<?php

namespace App\Filament\Resources\Users\RelationManagers;

use App\Filament\Resources\Threads\ThreadResource;
use Filament\Actions\CreateAction;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;

class ThreadsRelationManager extends RelationManager
{
    protected static string $relationship = 'threads';

    protected static ?string $relatedResource = ThreadResource::class;

    public function table(Table $table): Table
    {
        return $table
            ->headerActions([
                CreateAction::make(),
            ]);
    }
}
