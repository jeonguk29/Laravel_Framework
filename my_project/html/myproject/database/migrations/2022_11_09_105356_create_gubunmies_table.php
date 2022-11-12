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
        Schema::create('gubunmies', function (Blueprint $table) {
            $table->id();
			$table->string('name42',20); 
			$table->string('leader42',20);
			$table->string('subleader42',20);
			$table->string('pic42',255)->nullable();
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
        Schema::dropIfExists('gubunmies');
    }
};
