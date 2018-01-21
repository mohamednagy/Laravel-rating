<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('ratings')) {
            Schema::create('ratings', function (Blueprint $table) {
                $table->increments('id');

                $table->unsignedInteger('model_id');
                $table->string('model_type');

                $table->unsignedInteger('rateable_id');
                $table->string('rateable_type');

                $table->decimal('value', 2, 1);

                $table->timestamps();
            });
        }
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasTable('ratings')) {
            Schema::drop('ratings');
        }
    }
}