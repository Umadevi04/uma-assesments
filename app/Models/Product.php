<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'detail','category_id','sub_category_id',
    ];     

    public function subcategories()
    {
        return $this->belongsTo(SubCategory::class);
    }
    
    // public function categories(): HasManyThrough
    // {
    //     return $this->hasManyThrough(Category::class, SubCategory::class);
    // }
    public function categories()
    {
    return $this->hasManyThrough(
        Category::class,
        Subcategory::class,
        'category_id',
    );
    }

}

