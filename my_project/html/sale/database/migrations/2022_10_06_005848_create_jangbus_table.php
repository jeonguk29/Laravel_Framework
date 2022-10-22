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
		 Schema::create('jangbus', function (Blueprint $table) {
					$table->id();
					
					$table->tinyinteger('io42')->nullable();
					$table->date('writeday42')->nullable();
					$table->integer('products_id42')->nullable();
					$table->integer('price42')->nullable();
					$table->integer('numi42')->nullable();
					$table->integer('numo42')->nullable();
					$table->integer('prices42')->nullable();
					$table->string('bigo42',20)->nullable();
					
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
        Schema::dropIfExists('jangbus');
    }
};
