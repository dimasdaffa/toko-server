<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $guarded = ['id'];

    protected $fillable = ['name', 'contact_info', 'created_by'];

    protected $table='suppliers';

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function item()
    {
        return $this->hasMany(Item::class, 'name_id');
    }
}
