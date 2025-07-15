<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAntreanPoliTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('antrean_poli', function (Blueprint $table) {
            $table->id();

            $table->string('ssn')->nullable();
            $table->string('payer');
            $table->string('status_pasien');

            $table->string('bpjs_card_no')->nullable();
            $table->string('no_rujukan')->nullable();

            $table->string('medical_no');
            $table->string('patient_name');
            $table->date('dob');

            $table->string('kodepoli')->nullable();
            $table->string('nmpoli')->nullable();

            $table->string('namasubspesialis')->nullable();
            $table->string('namadokter')->nullable();
            $table->string('jadwal')->nullable();

            $table->integer('nomor_antrean')->nullable();
            $table->boolean('is_prioritas')->default(false);

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
        Schema::dropIfExists('antrean_poli');
    }
}
