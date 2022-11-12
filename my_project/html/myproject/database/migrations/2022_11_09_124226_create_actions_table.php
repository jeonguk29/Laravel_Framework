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
        Schema::create('actions', function (Blueprint $table) {
        		$table->id();
					$table->date('writeday42')->nullable(); // 작전 날짜 
					$table->integer('divisions_id42')->nullable(); // 소대명 
					$table->string('operation42',20)->nullable();  // 작전명 
					$table->string('code42',20)->nullable();   // 암구호
					$table->string('location42',20)->nullable();	 // 작전 위치 
					$table->string('manager42',20)->nullable(); // 담당 간부 
					$table->string('bigo42',20)->nullable();  // 상세 작전 계획
					
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
        Schema::dropIfExists('actions');
    }
};
