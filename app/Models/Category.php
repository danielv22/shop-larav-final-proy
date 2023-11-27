<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    use HasFactory;

    protected $primaryKey = 'category_id';

    protected $fillable = [
        'category_name'
    ];

    public function products():BelongsToMany
    {
        return $this->belongsToMany(
            Product::class,
            'product_category',
            'fk_category_id',
            'fk_product_id  '
        );
    }
}
