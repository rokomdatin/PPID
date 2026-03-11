<?php

namespace App\Filament\Admin\Resources\PermohonanInformasis;

use App\Filament\Admin\Resources\PermohonanInformasis\Pages\CreatePermohonanInformasi;
use App\Filament\Admin\Resources\PermohonanInformasis\Pages\EditPermohonanInformasi;
use App\Filament\Admin\Resources\PermohonanInformasis\Pages\ListPermohonanInformasis;
use App\Filament\Admin\Resources\PermohonanInformasis\Schemas\PermohonanInformasiForm;
use App\Filament\Admin\Resources\PermohonanInformasis\Tables\PermohonanInformasisTable;
use App\Models\PermohonanInformasi;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PermohonanInformasiResource extends Resource
{
    protected static ?string $model = PermohonanInformasi::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedFolder;
    protected static ?string $navigationLabel = 'Permohonan Informasi';

    protected static ?string $recordTitleAttribute = 'nomor_registrasi';

    public static function form(Schema $schema): Schema
    {
        return PermohonanInformasiForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PermohonanInformasisTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPermohonanInformasis::route('/'),
            'create' => CreatePermohonanInformasi::route('/create'),
            'edit' => EditPermohonanInformasi::route('/{record}/edit'),
        ];
    }
}
