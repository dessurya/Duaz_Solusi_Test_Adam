<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CraeteTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ds_transaksi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('konsumen')->nullable();
            $table->string('no_polisi')->nullable();
            $table->string('tgl_masuk')->nullable();
            $table->string('waktu_masuk')->nullable();
            $table->string('waktu_keluar')->nullable();
            $table->integer('biaya')->nullable();
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
        Schema::dropIfExists('ds_transaksi');
    }
}
