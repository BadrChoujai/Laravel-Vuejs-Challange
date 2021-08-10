<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Category;
class Product extends Model
{
    use HasFactory;
    public function category()
    {
        return $this->belongesTo(Category::class);
    }
    public $primaryKey = 'product_id'; 
    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
        'category_id'
    ];
}
