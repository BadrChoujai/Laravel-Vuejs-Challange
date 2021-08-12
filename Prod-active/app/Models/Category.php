<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Category extends Model
{
    use HasFactory;

    // public $primaryKey = 'category_id';

    protected $fillable = [
        'name',
    ];

    public function Product()
    {
        return $this->hasMany(Product::class);
    }
}
