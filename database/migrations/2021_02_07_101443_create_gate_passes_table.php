<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGatePassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gate_passes', function (Blueprint $table) {
            $table->id();
            $table->string('party_id')->nullable();
            $table->integer('invoice_id')->nullable();
            $table->integer('author')->nullable();
            $table->string('product')->nullable();
            $table->longText('desc')->nullable();
            $table->integer('qty')->nullable();
            $table->text('unit')->nullable();
            $table->integer('rate')->nullable();
            $table->integer('amount')->nullable();
            $table->integer('type')->nullable();
            $table->integer('node')->nullable()->default(0);
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
        Schema::dropIfExists('gate_passes');
    }
}
