<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barangs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_barang');
            // $table->string('kategori_barang');
            // $table->foreignId('kategori_id')->constrained('kategoris');
            $table->string('harga_beli')->default(0);
            $table->string('harga_jual');
            $table->string('harga_grosir');
            $table->string('stok');
            // $table->foreignId('satuan_id')->constrained('satuans');
            $table->string('keterangan')->nullable();
            $table->string('status');
            $table->string('is_delete')->default(0);
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
        Schema::dropIfExists('barangs');
    }
}
