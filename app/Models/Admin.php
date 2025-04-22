<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $fillable = [
        'username',
        'email',
        'password',
    ];

    public function categories()
    {
        return $this->hasMany(Category::class, 'username_id');
    }
}
