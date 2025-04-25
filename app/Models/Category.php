<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = ['id'];

    protected $fillable = ['name', 'description', 'created_by'];

    protected $table='categories';

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function item()
    {
        return $this->hasMany(Item::class, 'name_id');
    }
}
