<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArisansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arisans', function (Blueprint $table) {
            $table->Increments('id');
            $table->unsignedInteger('id_user');
            $table->string('namaArisan', 60);
            $table->Integer('iuran');
            $table->Integer('kapasitas');
            $table->text('deskripsi')->nullable();
            $table->date('tglMulai')->nullable();
            $table->date('tglAkhir')->nullable();
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
        Schema::dropIfExists('arisans');
    }
}
