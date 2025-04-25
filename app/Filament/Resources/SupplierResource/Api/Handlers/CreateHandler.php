<?php
namespace App\Filament\Resources\SupplierResource\Api\Handlers;

use Illuminate\Http\Request;
use Rupadana\ApiService\Http\Handlers;
use App\Filament\Resources\SupplierResource;
use App\Filament\Resources\SupplierResource\Api\Requests\CreateSupplierRequest;

class CreateHandler extends Handlers {
    public static string | null $uri = '/';
    public static string | null $resource = SupplierResource::class;
    public static bool $public = true;

    public static function getMethod()
    {
        return Handlers::POST;
    }

    public static function getModel() {
        return static::$resource::getModel();
    }

    /**
     * Create Supplier
     *
     * @param CreateSupplierRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function handler(CreateSupplierRequest $request)
    {
        $model = new (static::getModel());

        $model->fill($request->all());

        $model->save();

        return static::sendSuccessResponse($model, "Successfully Create Resource");
    }
}
