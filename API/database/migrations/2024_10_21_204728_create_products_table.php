<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Model;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();  // Auto-incrementing primary key
            $table->string('name');
            $table->text('description')->nullable();
            $table->decimal('price', 10, 2);
            $table->integer('stock');
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->string('image_url')->nullable();  // Store image URL or path
            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}

class Product extends Model
{
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
}
