<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    protected $table = "suppliers";
    protected $fillable = [
        'name', 'email', 'phone', 'address', 'shopname', 'photo'
    ];

    // public function product()
    // {
    //     return $this->hasMany(Product::class, 'supplier_id');
    // }
}
