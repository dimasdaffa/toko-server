<?php
namespace App\Filament\Resources\SupplierResource\Api\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Supplier;

/**
 * @property Supplier $resource
 */
class SupplierTransformer extends JsonResource
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
