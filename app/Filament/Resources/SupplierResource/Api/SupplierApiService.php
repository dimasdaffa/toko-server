<?php
namespace App\Filament\Resources\SupplierResource\Api;

use Rupadana\ApiService\ApiService;
use App\Filament\Resources\SupplierResource;
use Illuminate\Routing\Router;


class SupplierApiService extends ApiService
{
    protected static string | null $resource = SupplierResource::class;

    public static function handlers() : array
    {
        return [
            Handlers\CreateHandler::class,
            Handlers\UpdateHandler::class,
            Handlers\DeleteHandler::class,
            Handlers\PaginationHandler::class,
            Handlers\DetailHandler::class
        ];

    }
}
