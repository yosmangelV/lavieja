<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViejaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('viejas', function (Blueprint $table) {
            $table->increments('id');
            $table->char('c1',1)->nullable();
            $table->char('c2',1)->nullable();
            $table->char('c3',1)->nullable();
            $table->char('c4',1)->nullable();
            $table->char('c5',1)->nullable();
            $table->char('c6',1)->nullable();
            $table->char('c7',1)->nullable();
            $table->char('c8',1)->nullable();
            $table->char('c9',1)->nullable();
            $table->boolean('status');
            $table->char('turn',1);
            $table->char('win',1)->nullable();
            $table->integer('move');
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
        Schema::dropIfExists('viejas');
    }
}
