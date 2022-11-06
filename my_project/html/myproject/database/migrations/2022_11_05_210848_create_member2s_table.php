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
        Schema::create('member2s', function (Blueprint $table) {
            $table->id();
            $table->string('uid42',20);  // 군번
			$table->string('pwd42',20);	// 주민번호
			$table->string('gun42',20);	// 총기번호
			$table->string('name42',20); // 이름 
			$table->string('rank42',20); // 계급 
			$table->integer('division42')->nullable(); // 소대
			$table->string('position42',20); // 보직
			$table->string('tel42',11)->nullable(); // 전화번호
			$table->date('writeday42')->nullable();  // 생일 
			$table->date('dday42')->nullable(); // 전역일
			$table->string('juso42',100); // 계급 
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
        Schema::dropIfExists('member2s');
    }
};
