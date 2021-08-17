<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Smsprovider extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('smsproviders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('providername')->nullable();
            $table->string('sendurl')->nullable();
            $table->string('provider')->unique()->nullable();
            $table->string('apikey')->nullable();
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
        Schema::dropIfExists('users');
    }
}
