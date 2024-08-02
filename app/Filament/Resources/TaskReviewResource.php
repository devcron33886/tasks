<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TaskReviewResource\Pages;
use App\Models\TaskReview;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class TaskReviewResource extends Resource
{
    protected static ?string $model = TaskReview::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('task_id')
                    ->relationship('task', 'name')
                    ->searchable()
                    ->native(false)
                    ->preload()
                    ->required(),
                Forms\Components\TextInput::make('link')
                    ->required(),
                Forms\Components\Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('task.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('task.user.name')
                    ->label('Supervisor')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('task.student.name')
                    ->label('Submitted by')
                    ->sortable(),
                Tables\Columns\TextColumn::make('link')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageTaskReviews::route('/'),
        ];
    }
}
