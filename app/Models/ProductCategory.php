<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ProductCategory extends Pivot
{
    public $timestamps = false;

    protected $table = 'product_category';

    protected $primaryKey = 'product_category_id';

    protected $fillable = [
        'fk_product_id',
        'fk_category_id'
    ];
}
