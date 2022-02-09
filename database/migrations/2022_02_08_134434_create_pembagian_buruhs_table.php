<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembagianBuruhsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembagian_buruhs', function (Blueprint $table) {
            $table->unsignedBigInteger('id_payment');
            $table->foreign('id_payment')
                ->references('id')->on('payments')
                ->onDelete('cascade');
            $table->integer("no_buruh");
            $table->integer("persentasi");
            $table->integer("bonus");
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
        Schema::dropIfExists('pembagian_buruhs');
    }
}
