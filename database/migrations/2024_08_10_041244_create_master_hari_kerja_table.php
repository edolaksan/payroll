<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterHariKerjaTable extends Migration
{
    public function up()
    {
        Schema::create('master_hari_kerja', function (Blueprint $table) {
            $table->id();
            $table->string('hari_kerja');
            $table->time('jam_masuk');
            $table->time('jam_pulang');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('master_hari_kerja');
    }
}
