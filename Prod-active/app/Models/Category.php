<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Product;

class Category extends Model
{
    use HasFactory;
    public function product()
    {
        return $this->hasMany(Product::class);
    }
    public $primaryKey = 'category_id';
    protected $fillable = [
        'name',
    ];
}
