<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spam', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ip_address');
            $table->string('email');
            $table->string('name');
            $table->string('code');
            $table->string('site');
            $table->string('complaints');
            $table->string('expectation')->nullable();
            $table->tinyInteger('status')->default(0);
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
        Schema::dropIfExists('spam');
    }
};