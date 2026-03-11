<?php

namespace App\Filament\Admin\Resources\KeberatanInformasiResource\Pages;

use App\Filament\Admin\Resources\KeberatanInformasiResource\KeberatanInformasiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKeberatanInformasis extends ListRecords
{
    protected static string $resource = KeberatanInformasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}