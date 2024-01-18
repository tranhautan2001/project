<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductCategory;
use Illuminate\Support\Str;
class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'img',
        'size',
        'material',
        'perimeter',
        'price',
        'sale',
        'slug',
        'status',
        'supplier_id',
        'category_id',
        'stock_status',
    ];
    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }
    public function suppliers()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($product) {
            $product->slug = Str::slug($product->name);
        });
    }
}
