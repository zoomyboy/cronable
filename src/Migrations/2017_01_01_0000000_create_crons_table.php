<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCronsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crons', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('weekday')->default(0)->nullable();
			$table->integer('day')->nullable()->default(0);
			$table->time('time')->default('00:00');
			$table->integer('interval')->default(0);
			$table->string('cron_type');
			$table->integer('cron_id');
		
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
        Schema::dropIfExists('crons');
    }
}
