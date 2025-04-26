<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Interfaces\HasAllowedFields;
use App\Interfaces\HasAllowedSorts;
use App\Interfaces\HasAllowedFilters;
use Rupadana\ApiService\Contracts\HasAllowedFields as ContractsHasAllowedFields;
use Rupadana\ApiService\Contracts\HasAllowedFilters as ContractsHasAllowedFilters;
use Rupadana\ApiService\Contracts\HasAllowedSorts as ContractsHasAllowedSorts;
use Spatie\QueryBuilder\AllowedFilter;

class Item extends Model implements ContractsHasAllowedFields, ContractsHasAllowedSorts, ContractsHasAllowedFilters
{
    protected $guarded = ['id'];
    protected $fillable = ['name', 'description', 'price', 'quantity', 'category_id', 'supplier_id', 'created_by'];
    protected $table = 'items';

    public static function getAllowedFields(): array
    {
        return [
            'id',
            'name',
            'description',
            'price',
            'quantity',
            'category_id',
            'supplier_id',
            'created_by',
            'created_at',
            'updated_at'
        ];
    }

    public static function getAllowedSorts(): array
    {
        return [
            'id',
            'name',
            'description',
            'price',
            'quantity',
            'category_id',
            'supplier_id',
            'created_by',
            'created_at',
            'updated_at'
        ];
    }

    public static function getAllowedFilters(): array
    {
        return [
            'id',
            'name',
            'description',
            'price',
            'quantity',
            'category_id',
            'supplier_id',
            'created_by',
            'created_at',
            'updated_at',
            AllowedFilter::callback('quantity_below', function ($query, $value) {
                return $query->where('quantity', '<', $value);
            }),
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }
}
