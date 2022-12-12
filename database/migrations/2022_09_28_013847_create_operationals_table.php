<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOperationalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operationals', function (Blueprint $table) {
            $table->id();
            $table->enum('mutasi', ['Pemasukan', 'Pengeluaran'])->nullable();
            $table->enum('type', ['Transaksi', 'PO', 'Operational', 'Sponsorship', 'Other'])->nullable();
            $table->integer('nominal')->nullable();
            $table->string('keterangan')->nullable();
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
        Schema::dropIfExists('operationals');
    }
}
