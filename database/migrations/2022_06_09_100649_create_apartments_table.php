<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartments', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->string('thumb', 255);
            $table->text('description');
            $table->string('category');
            $table->foreignId('user_id')->constrained();
            //$table->foreignId('category_id')->constrained();  //TODO: if we want to use category in another table
            $table->tinyInteger('rooms_n');
            $table->tinyInteger('beds_n');
            $table->tinyInteger('bathrooms_n');
            $table->integer('area');
            $table->integer('price');
            $table->string('address');
            $table->decimal('latitude', 8, 6);
            $table->decimal('longitude', 9, 6);
            $table->boolean('visible')->default(1);
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
        Schema::dropIfExists('apartments');
    }
}
