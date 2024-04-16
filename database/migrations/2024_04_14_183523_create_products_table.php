<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->unique();
            $table->string('name');
            $table->text('description');
            $table->decimal('value', 10, 2);
            $table->integer('quantity');
            $table->timestamps();
        });

        
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
}
