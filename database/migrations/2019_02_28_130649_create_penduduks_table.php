<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenduduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penduduk', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kk');
            $table->string('nik');
            $table->string('nama');
            $table->text('alamat');
            $table->date('tgl_lahir');
            $table->string('agama');
            $table->string('golongan_darah');
            $table->string('pekerjaan');
            $table->text('file_ktp');
            $table->text('file_kk');
            $table->text('file_akta');
            $table->string('rastra');
            $table->string('pakaian');
            $table->string('kesehatan');
            $table->string('tempat_tinggal');
            $table->string('pendidikan');
            $table->string('status');
            $table->boolean('kks_kps')->nullable();
            $table->boolean('kip_bsm')->nullable();
            $table->boolean('kis_bpjs')->nullable();
            $table->boolean('kis_mandiri')->nullable();
            $table->boolean('jamsostek')->nullable();
            $table->boolean('ansuransi')->nullable();
            $table->boolean('pkh')->nullable();
            $table->boolean('raskin')->nullable();
            $table->boolean('kur')->nullable();
            $table->integer('desa_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->timestamps();

            $table->foreign('desa_id')
                ->references('id')
                ->on('desa');
            $table->foreign('user_id')
                ->references('id')
                ->on('user');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penduduk');
    }
}
