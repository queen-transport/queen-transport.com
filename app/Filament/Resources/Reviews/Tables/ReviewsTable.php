<?php

namespace App\Filament\Resources\Reviews\Tables;

use App\Contracts\ReviewServiceInterface;
use App\Models\Review;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class ReviewsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                SpatieMediaLibraryImageColumn::make('photos')
                    ->label('Foto')
                    ->collection('photos')
                    ->circular()
                    ->stacked()
                    ->limit(3),

                TextColumn::make('user.name')
                    ->label('Pengguna')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('armadas.title')
                    ->label('Armada Terkait')
                    ->badge()
                    ->separator(', ')
                    ->searchable(),

                TextColumn::make('rating')
                    ->label('Rating')
                    ->formatStateUsing(fn ($state) => str_repeat('★', (int) $state).' ('.$state.'/5)')
                    ->color('warning')
                    ->sortable(),

                TextColumn::make('car_review')
                    ->label('Ulasan Mobil')
                    ->limit(35)
                    ->tooltip(fn (Review $record): string => $record->car_review)
                    ->searchable(),

                TextColumn::make('driver_review')
                    ->label('Ulasan Driver')
                    ->limit(35)
                    ->tooltip(fn (Review $record): string => $record->driver_review)
                    ->searchable(),

                TextColumn::make('facilities_review')
                    ->label('Ulasan Fasilitas')
                    ->limit(35)
                    ->tooltip(fn (Review $record): string => $record->facilities_review)
                    ->searchable(),

                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        Review::STATUS_APPROVED => 'success',
                        Review::STATUS_PENDING => 'warning',
                        Review::STATUS_REJECTED => 'danger',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        Review::STATUS_APPROVED => 'Approved',
                        Review::STATUS_PENDING => 'Pending',
                        Review::STATUS_REJECTED => 'Rejected',
                        default => ucfirst($state),
                    })
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('Tanggal')
                    ->dateTime('d M Y H:i')
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->label('Status Moderasi')
                    ->options([
                        Review::STATUS_PENDING => 'Pending (Menunggu Persetujuan)',
                        Review::STATUS_APPROVED => 'Approved (Ditayangkan)',
                        Review::STATUS_REJECTED => 'Rejected (Ditolak)',
                    ]),

                SelectFilter::make('rating')
                    ->label('Rating Bintang')
                    ->options([
                        5 => '5 Bintang',
                        4 => '4 Bintang',
                        3 => '3 Bintang',
                        2 => '2 Bintang',
                        1 => '1 Bintang',
                    ]),
            ])
            ->recordActions([
                Action::make('approve')
                    ->label('Setujui')
                    ->icon('heroicon-o-check-circle')
                    ->color('success')
                    ->visible(fn (Review $record): bool => $record->status !== Review::STATUS_APPROVED)
                    ->action(function (Review $record): void {
                        app(ReviewServiceInterface::class)->approveReview($record);
                    }),

                Action::make('reject')
                    ->label('Tolak')
                    ->icon('heroicon-o-x-circle')
                    ->color('danger')
                    ->visible(fn (Review $record): bool => $record->status !== Review::STATUS_REJECTED)
                    ->action(function (Review $record): void {
                        app(ReviewServiceInterface::class)->rejectReview($record);
                    }),

                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
