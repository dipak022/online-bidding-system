<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name')->nullable();
            $table->string('category_id')->nullable();
            $table->string('user_id')->nullable();
            $table->text('details')->nullable();
            $table->string('regular_price')->nullable();
            $table->string('starting_bidding_amount')->nullable();
            $table->date('bidding_end_date')->nullable();
            $table->string('image')->nullable(); 
            $table->string('status')->nullable(); 
            $table->string('bidding_amount')->nullable(); 
            $table->boolean('new')->nullable()->default(1);
            $table->boolean('featured')->nullable()->default(0);
            $table->boolean('active')->nullable()->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
