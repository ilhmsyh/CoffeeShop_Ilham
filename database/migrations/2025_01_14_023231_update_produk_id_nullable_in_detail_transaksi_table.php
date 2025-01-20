<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateProdukIdNullableInDetailTransaksiTable extends Migration
{
    public function up()
    {
        Schema::table('detail_transaksi', function (Blueprint $table) {
            $table->unsignedBigInteger('produk_id')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('detail_transaksi', function (Blueprint $table) {
            $table->unsignedBigInteger('produk_id')->nullable(false)->change();
        });
    }
}
