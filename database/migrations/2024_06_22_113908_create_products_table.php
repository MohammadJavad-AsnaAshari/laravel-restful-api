<?php

use App\Enums\Product\ProductStatus;
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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('seller_id')->references('id')->on('users');
            $table->string('name');
            $table->string('description', 1000);
            $table->integer('quantity')->unsigned();
            $table->string('status')->default(ProductStatus::UNAVAILABLE_PRODUCT->value);
            $table->string('image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
