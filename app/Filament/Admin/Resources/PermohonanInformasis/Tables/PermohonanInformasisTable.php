<?php

namespace App\Filament\Admin\Resources\PermohonanInformasis\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class PermohonanInformasisTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nomor_registrasi')
                    ->label('No. Registrasi')
                    ->copyable()
                    ->searchable()
                    ->sortable(),
                TextColumn::make('nama')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('telepon')
                    ->searchable(),
                TextColumn::make('email')
                    ->label('Email')
                    ->searchable(),
                TextColumn::make('cara_memperoleh')
                    ->label('Cara Memperoleh')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'melihat' => 'Melihat',
                        'salinan' => 'Salinan',
                        default => $state,
                    }),
                TextColumn::make('cara_salinan')
                    ->label('Cara Salinan')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'ambil_langsung' => 'info',
                        'kurir' => 'warning',
                        'pos' => 'info',
                        'email' => 'success',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'ambil_langsung' => 'Ambil Langsung',
                        'kurir' => 'Kurir',
                        'pos' => 'Pos',
                        'email' => 'Email',
                        default => $state,
                    }),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'diterima' => 'info',
                        'diproses' => 'warning',
                        'selesai' => 'success',
                        'ditolak' => 'danger',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'diterima' => 'Diterima',
                        'diproses' => 'Diproses',
                        'selesai' => 'Selesai',
                        'ditolak' => 'Ditolak',
                        default => $state,
                    }),
                TextColumn::make('created_at')
                    ->label('Tanggal Dibuat')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: false),
                TextColumn::make('updated_at')
                    ->label('Tanggal Diubah')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        'diterima' => 'Diterima',
                        'diproses' => 'Diproses',
                        'selesai' => 'Selesai',
                        'ditolak' => 'Ditolak',
                    ]),
                SelectFilter::make('cara_memperoleh')
                    ->label('Cara Memperoleh')
                    ->options([
                        'melihat' => 'Melihat',
                        'salinan' => 'Salinan',
                    ]),
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
