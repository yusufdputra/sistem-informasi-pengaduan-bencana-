<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengaduanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengaduan', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_warga');
            $table->string('kode');
            $table->bigInteger('id_bencana');
            $table->string('bencana_lain')->nullable();
            $table->bigInteger('id_daerah');
            $table->text('almt_lengkap');
            $table->date('tgl_kejadian');
            $table->time('jam_kejadian');
            $table->text('penyebab');
            $table->string('jns_kerusakan');
            $table->string('penanggulangan');
            $table->string('bantuan');
            $table->string('kerugian');
            $table->string('id_korban');
            $table->text('foto1');
            $table->text('foto2');
            $table->text('foto3');
            $table->text('foto4');
            $table->text('keterangan');
            $table->string('status');
            $table->text('alasan_tolak')->nullable();
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengaduan');
    }
}
