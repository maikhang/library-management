<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $collection) {
            $collection->string('name')->nullable(false);
            $collection->category('category')->nullable(false);
            $collection->author('author')->nullable(false);
            $collection->text('summary')->nullable(true);
            $collection->enum('status', ['In Stock', 'Out of Stock'])->nullable(false);
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
