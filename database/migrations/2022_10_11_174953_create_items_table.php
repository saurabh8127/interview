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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
			$table->unsignedBigInteger('company_id'); 
			$table->unsignedBigInteger('category_id'); 
			$table->unsignedBigInteger('color_id');
			$table->string('name');
			$table->string('description');
			$table->date('date');
			$table->bigInteger('quentity');
            $table->timestamps();
			$table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
			$table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
			$table->foreign('color_id')->references('id')->on('colors')->onDelete('cascade');  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
};
