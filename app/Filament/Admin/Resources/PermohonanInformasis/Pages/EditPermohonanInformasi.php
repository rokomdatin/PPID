<?php

namespace App\Filament\Admin\Resources\PermohonanInformasis\Pages;

use App\Filament\Admin\Resources\PermohonanInformasis\PermohonanInformasiResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPermohonanInformasi extends EditRecord
{
    protected static string $resource = PermohonanInformasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
