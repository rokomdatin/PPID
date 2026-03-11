<?php

namespace App\Filament\Admin\Resources\KeberatanInformasiResource;

use App\Filament\Admin\Resources\KeberatanInformasiResource\Pages;
use App\Models\KeberatanInformasi;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Radio;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use UnitEnum;

class KeberatanInformasiResource extends Resource
{
    protected static ?string $model = KeberatanInformasi::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedExclamationTriangle;

    protected static ?string $navigationLabel = 'Keberatan Informasi';

    protected static ?string $pluralModelLabel = 'Keberatan Informasi';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nomor_registrasi')
                    ->label('Nomor Registrasi Keberatan')
                    ->disabled()
                    ->dehydrated(false),
                TextInput::make('nomor_permohonan')
                    ->label('Nomor Permohonan Informasi')
                    ->required(),
                Textarea::make('tujuan_penggunaan')
                    ->label('Tujuan Penggunaan Informasi')
                    ->required()
                    ->columnSpanFull(),
                Select::make('status')
                    ->options([
                        'Menunggu Verifikasi' => 'Menunggu Verifikasi',
                        'Diproses' => 'Diproses',
                        'Diterima' => 'Diterima',
                        'Ditolak' => 'Ditolak',
                    ])
                    ->required()
                    ->default('Menunggu Verifikasi'),
                TextInput::make('nama_pemohon')
                    ->required(),
                TextInput::make('pekerjaan_pemohon')
                    ->required(),
                TextInput::make('telepon_pemohon')
                    ->tel()
                    ->required(),
                Textarea::make('alamat_pemohon')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('nama_kuasa'),
                TextInput::make('telepon_kuasa')
                    ->tel(),
                Textarea::make('alamat_kuasa')
                    ->columnSpanFull(),
                Radio::make('alasan_keberatan')
                    ->options([
                        'Permohonan Informasi Ditolak' => 'Permohonan Informasi Ditolak',
                        'Informasi Berkala Tidak Disediakan' => 'Informasi Berkala Tidak Disediakan',
                        'Permohonan Informasi Tidak Ditanggapi' => 'Permohonan Informasi Tidak Ditanggapi',
                        'Permohonan Informasi Ditanggapi Tidak Sebagaimana yang Diminta' => 'Permohonan Informasi Ditanggapi Tidak Sebagaimana yang Diminta',
                        'Permohonan Informasi Tidak Dipenuhi' => 'Permohonan Informasi Tidak Dipenuhi',
                        'Biaya yang Dikenakan Tidak Wajar' => 'Biaya yang Dikenakan Tidak Wajar',
                        'Informasi Disampaikan Melebihi Jangka Waktu yang Ditentukan' => 'Informasi Disampaikan Melebihi Jangka Waktu yang Ditentukan',
                    ])
                    ->required()
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('created_at')
                    ->label('Tanggal')
                    ->date()
                    ->sortable(),
                TextColumn::make('nomor_registrasi')
                    ->searchable()
                    ->sortable()
                    ->copyable(),
                TextColumn::make('nama_pemohon')
                    ->searchable(),
                TextColumn::make('nomor_permohonan')
                    ->label('No. Permohonan Awal')
                    ->searchable(),
                TextColumn::make('alasan_keberatan')
                    ->limit(30)
                    ->tooltip(fn (KeberatanInformasi $record): ?string => $record->alasan_keberatan),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn (?string $state): string => match ($state) {
                        'Menunggu Verifikasi' => 'warning',
                        'Diproses'            => 'primary',
                        'Diterima'            => 'success',
                        'Ditolak'             => 'danger',
                        default               => 'gray',
                    }),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        'Menunggu Verifikasi' => 'Menunggu Verifikasi',
                        'Diproses'            => 'Diproses',
                        'Diterima'            => 'Diterima',
                        'Ditolak'             => 'Ditolak',
                    ]),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListKeberatanInformasis::route('/'),
            'create' => Pages\CreateKeberatanInformasi::route('/create'),
            'edit'   => Pages\EditKeberatanInformasi::route('/{record}/edit'),
        ];
    }
}