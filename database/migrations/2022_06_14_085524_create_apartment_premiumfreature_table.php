<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApartmentPremiumfreatureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartment_premiumfreature', function (Blueprint $table) {
            // $table->id();
            $table->integer('apartment_id')->constrained();
            $table->integer('premiumFeature_id')->constrained();
            $table->datetime('started_at');
            $table->datetime('expiring_at');
            $table->primary(['apartment_id', 'premiumFeature_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apartment_premiumfreature');
    }
}
