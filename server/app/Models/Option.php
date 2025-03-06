<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    /** @use HasFactory<\Database\Factories\OptionFactory> */
    use HasFactory;

    protected $fillable = [
        'name', 'price_modifier', 'option_categories_id'
    ];

    public function products() {
        return $this->belongsToMany(Product::class, 'product_option');
    }
}
