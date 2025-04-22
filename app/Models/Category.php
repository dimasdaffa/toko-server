<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = ['id'];

    protected $fillable = ['name', 'description', 'created_by'];

    protected $table='categories';

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'created_by');
    }
}
