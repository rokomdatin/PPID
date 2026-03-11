<?php

namespace App\Filament\Admin\Resources\PermohonanInformasis\Pages;

use App\Filament\Admin\Resources\PermohonanInformasis\PermohonanInformasiResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPermohonanInformasis extends ListRecords
{
    protected static string $resource = PermohonanInformasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
