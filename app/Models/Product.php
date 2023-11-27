<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;

    protected $primaryKey = 'product_id';
    protected $fillable = [
        'reference',
        'name',
        'description',
        'stock',
        'price',
        'photo_name'
    ];

    public function categories():BelongsToMany
    {
        return  $this->belongsToMany(
            Category::class,
            'product_category',
            'fk_product_id',
            'fk_category_id'
        );
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
