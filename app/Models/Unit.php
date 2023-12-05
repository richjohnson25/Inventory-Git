<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Unit extends Model
{
    // 1 Unit bisa memiliki lebih dari 1 barang
    // One to many
    public function products() {
        return $this->hasMany(Product::class);
    }

    protected $fillable = [
        'name',
    ];

    protected $table = 'units';
}
