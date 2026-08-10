<?php

namespace App\Filament\Resources\Attachments\Tables;

use App\Models\Attachment;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class AttachmentsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                ImageColumn::make('preview')
                    ->label('')
                    ->state(fn (Attachment $record) => $record->isImage() ? $record->url : null)
                    ->size(60)
                    ->square(),
                IconColumn::make('is_video')
                    ->label('')
                    ->state(fn (Attachment $record) => $record->isVideo())
                    ->icon(fn (bool $state) => $state ? 'heroicon-o-film' : null)
                    ->visible(fn (?Attachment $record) => $record?->isVideo() ?? true),
                TextColumn::make('title')
                    ->label('Judul')
                    ->searchable()
                    ->description(fn (Attachment $record) => $record->file_name),
                TextColumn::make('mime_type')
                    ->label('Tipe'),
                TextColumn::make('size')
                    ->label('Ukuran')
                    ->formatStateUsing(fn (?int $state) => $state ? number_format($state / 1024, 1).' KB' : '-'),
                TextColumn::make('created_at')
                    ->label('Diupload')
                    ->dateTime('d M Y H:i')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
