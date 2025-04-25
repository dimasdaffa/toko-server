<?php
namespace App\Filament\Resources\AdminResource\Api\Handlers;

use Illuminate\Http\Request;
use Rupadana\ApiService\Http\Handlers;
use App\Filament\Resources\AdminResource;
use App\Filament\Resources\AdminResource\Api\Requests\CreateAdminRequest;

class CreateHandler extends Handlers {
    public static string | null $uri = '/';
    public static string | null $resource = AdminResource::class;
    public static bool $public = true;

    public static function getMethod()
    {
        return Handlers::POST;
    }

    public static function getModel() {
        return static::$resource::getModel();
    }

    /**
     * Create Admin
     *
     * @param CreateAdminRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function handler(CreateAdminRequest $request)
    {
        $model = new (static::getModel());

        $model->fill($request->all());

        $model->save();

        return static::sendSuccessResponse($model, "Successfully Create Resource");
    }
}
