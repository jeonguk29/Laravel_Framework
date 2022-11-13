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
        Schema::create('vacations', function (Blueprint $table) {
            $table->id();
			$table->date('startwriteday42')->nullable();  // 생일 
			$table->date('endwriteday42')->nullable(); // 전역일
            $table->string('uids_id42',20);  // 군번
			$table->string('name42',20); // 이름 
			$table->string('rank42',20); // 계급 
			$table->string('tel42',11)->nullable(); // 전화번호
			$table->string('area42',20); // 위치
			
	

			
			
		
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
        Schema::dropIfExists('vacations');
    }
};
