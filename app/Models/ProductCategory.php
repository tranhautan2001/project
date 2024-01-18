<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ProductCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'image',
        'slug',
        'status',
        'parent_id'

    ];
    public function parent()
    {
        return $this->belongsTo(ProductCategory::class, 'parent_id');
    }
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($category) {
            $category->slug = Str::slug($category->name);
        });
    }
    public function children()
    {
        return $this->hasMany(ProductCategory::class, 'parent_id');
    }

    public function getTotalProductsCount()
    {
        $totalProducts = $this->products()->count();

        foreach ($this->children as $childCategory) {
            $totalProducts += $childCategory->getTotalProductsCount();
        }

        return $totalProducts;
    }
    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }
    public function ancestors()
    {
        $ancestors = collect();
        $parent = $this->parent;

        while ($parent) {
            $ancestors->push($parent);
            $parent = $parent->parent;
        }

        return $ancestors->reverse();
    }
   
}
