<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApartementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartement', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('apartement_name');
            $table->date('dateFrom');
            $table->date('dateTo');
            $table->uuid('uniq_id');
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
        Schema::dropIfExists('apartement');
    }
}
