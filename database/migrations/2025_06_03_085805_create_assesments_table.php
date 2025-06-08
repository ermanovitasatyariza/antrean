<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssesmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assesments', function (Blueprint $table) {
            $table->id();
            $table->string('payer'); // px-bpjs, px-personal, ekios
            $table->boolean('usia_lebih_60')->default(0);
            $table->boolean('bayi_baru_lahir')->default(0);
            $table->boolean('penyandang_disabilitas')->default(0);
            $table->unsignedInteger('nomor_antrean')->default(0);
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
        Schema::dropIfExists('assesments');
    }
}
