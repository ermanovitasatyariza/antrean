<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalDokterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwal_dokter', function (Blueprint $table) {
            $table->id();
            $table->string('kodesubspesialis', 10);
            $table->tinyInteger('hari')->comment('1=Senin, 2=Selasa, 3=Rabu, 4=Kamis, 5=Jumat, 6=Sabtu, 7=Minggu, 8=Libur Nasional');
            $table->integer('kapasitaspasien');
            $table->boolean('libur')->default(0);
            $table->string('namahari', 10);
            $table->string('jadwal', 20); // contoh: 08:00 - 12:00
            $table->string('namasubspesialis', 100)->nullable();
            $table->string('namadokter', 100)->nullable();
            $table->string('kodepoli', 10)->nullable();
            $table->string('namapoli', 100)->nullable();
            $table->integer('kodedokter')->nullable();
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
        Schema::dropIfExists('jadwal_dokter');
    }
}
