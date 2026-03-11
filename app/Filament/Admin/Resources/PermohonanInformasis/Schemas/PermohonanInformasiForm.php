<?php

namespace App\Filament\Admin\Resources\PermohonanInformasis\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class PermohonanInformasiForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nomor_registrasi')
                    ->label('No. Registrasi')
                    ->disabled()
                    ->dehydrated(false)
                    ->required(),
                TextInput::make('nama')
                    ->required()
                    ->maxLength(255),
                TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                TextInput::make('telepon')
                    ->label('Telepon')
                    ->tel()
                    ->required()
                    ->maxLength(20),
                Textarea::make('alamat')
                    ->label('Alamat')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('rincian_informasi')
                    ->label('Rincian Informasi yang Diminta')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('tujuan')
                    ->label('Tujuan Permintaan')
                    ->required()
                    ->columnSpanFull(),
                Select::make('cara_memperoleh')
                    ->label('Cara Memperoleh')
                    ->options([
                        'melihat' => 'Melihat',
                        'salinan' => 'Salinan',
                    ])
                    ->required(),
                Select::make('cara_salinan')
                    ->label('Cara Salinan')
                    ->options([
                        'ambil_langsung' => 'Ambil Langsung',
                        'kurir' => 'Kurir',
                        'pos' => 'Pos',
                        'email' => 'Email',
                    ])
                    ->required(),
                Select::make('status')
                    ->label('Status')
                    ->options([
                        'diterima' => 'Diterima',
                        'diproses' => 'Diproses',
                        'selesai' => 'Selesai',
                        'ditolak' => 'Ditolak',
                    ])
                    ->default('diterima')
                    ->required(),
                Textarea::make('catatan_admin')
                    ->label('Catatan Admin')
                    ->columnSpanFull(),
            ]);
    }
}
