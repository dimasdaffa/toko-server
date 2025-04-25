<?php

namespace App\Filament\Resources\SupplierResource\Api\Handlers;

use App\Filament\Resources\SettingResource;
use App\Filament\Resources\SupplierResource;
use Rupadana\ApiService\Http\Handlers;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Http\Request;
use App\Filament\Resources\SupplierResource\Api\Transformers\SupplierTransformer;

class DetailHandler extends Handlers
{
    public static string | null $uri = '/{id}';
    public static string | null $resource = SupplierResource::class;
    public static bool $public = true;


    /**
     * Show Supplier
     *
     * @param Request $request
     * @return SupplierTransformer
     */
    public function handler(Request $request)
    {
        $id = $request->route('id');

        $query = static::getEloquentQuery();

        $query = QueryBuilder::for(
            $query->where(static::getKeyName(), $id)
        )
            ->first();

        if (!$query) return static::sendNotFoundResponse();

        return new SupplierTransformer($query);
    }
}
