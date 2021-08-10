<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParkirTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parkiran', function (Blueprint $table) {
            $table->id();
            $table->string('plat_no')->unique();
            $table->string('jenis_kendaraan');
            $table->string('foto');
            $table->string('biaya')->default('1-2 jam');
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
        Schema::dropIfExists('parkiran');        
    }
}
