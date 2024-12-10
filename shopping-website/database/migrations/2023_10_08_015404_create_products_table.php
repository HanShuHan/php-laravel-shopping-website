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
        Schema::create('products', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name')->nullable('false');
            $table->text('description')->nullable('false');
            $table->decimal('price')->nullable('true');
            $table->integer('rating')->default(0)->unsigned()->comment('Rating from 0 to 5');
            $table->integer('rating_count')->default(0)->unsigned();
            $table->boolean('is_on_sale')->nullable('true')->default(0);
            $table->boolean('is_best_seller')->nullable('true')->default(0);
            $table->boolean('is_new_release')->nullable('true')->default(0);
            $table->boolean('is_todays_deal')->nullable('true')->default(0);
            $table->foreignId('category_id')->references('id')->on('product_categories');
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
