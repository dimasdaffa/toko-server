<?php
namespace App\Filament\Resources\AdminResource\Api\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Admin;

/**
 * @property Admin $resource
 */
class AdminTransformer extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return $this->resource->toArray();
    }
}
