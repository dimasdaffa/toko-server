<?php

namespace App\Filament\Resources\AdminResource\Api\Handlers;

use App\Filament\Resources\SettingResource;
use App\Filament\Resources\AdminResource;
use Rupadana\ApiService\Http\Handlers;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Http\Request;
use App\Filament\Resources\AdminResource\Api\Transformers\AdminTransformer;

class DetailHandler extends Handlers
{
    public static string | null $uri = '/{id}';
    public static string | null $resource = AdminResource::class;


    /**
     * Show Admin
     *
     * @param Request $request
     * @return AdminTransformer
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

        return new AdminTransformer($query);
    }
}
