<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
    'name', 'category', 'description', 'price', 'stock','image','views','sales_count','specs'
    ];

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

}
