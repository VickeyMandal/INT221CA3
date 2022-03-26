<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMyDaysTable extends Migration
{
    public function up()
    {
        Schema::create('my_days', function (Blueprint $table) {
            $table->id();
            $table->string("description");
            $table->boolean("isCompleted")->default(false);
            $table->timestamp("created_at");
        });
    }

    public function down()
    {
        Schema::dropIfExists('my_days');
    }
}