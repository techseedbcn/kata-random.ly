<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKatasTable extends Migration
{
    public function up()
    {
        Schema::create('katas', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description', 200);
            $table->text('level');
            $table->string('source');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('katas');
    }
}
