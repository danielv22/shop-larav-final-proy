<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('product_category', function (Blueprint $table) {
            $table->id('id_product_category');
            $table->foreignId('fk_product_id')
                ->constrained('products', 'product_id');
            $table->foreignId('fk_category_id')
                ->constrained('categories', 'category_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_category');
    }
};
