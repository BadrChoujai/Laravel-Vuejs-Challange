<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
class Product extends Model
{
    use HasFactory;
    
    public $primaryKey = 'product_id'; 

    // protected $guarded = [];

    protected $fillable = [
        'name',
        'description',
        'category_id',
        'price',
        // 'image',
    ];

    public function Category()
    {
        return $this->belongesTo(Category::class);
    }
}
