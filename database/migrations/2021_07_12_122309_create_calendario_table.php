<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalendarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calendario', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('date')->nullable();
            $table->string('hour')->nullable();
            $table->string('title');
            $table->string('stream')->nullable();
            $table->string('t1logo')->default('/img/zklogo.png');
            $table->string('t1score')->nullable();
            $table->string('t1name')->nullable();
            $table->string('t2logo')->default('/img/nologo.png');
            $table->string('t2score')->nullable();
            $table->string('t2name')->nullable();
            $table->string('type')->nullable();
            $table->string('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('calendario');
    }
}
