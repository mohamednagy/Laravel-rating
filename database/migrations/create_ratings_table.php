<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaravelRatingTable extends Migration
{
    public function up()
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('type')->nullable();
            $table->morphs('model');
            $table->morphs('rateable');
            $table->decimal('value', 2, 1);

            $table->timestamps();
        });
    }

   public function down()
   {
       Schema::dropIfExists('ratings');
   }
}
