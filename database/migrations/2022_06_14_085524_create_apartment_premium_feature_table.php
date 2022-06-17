<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApartmentPremiumFeatureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartment_premium_feature', function (Blueprint $table) {
            // $table->id();
            $table->foreignId('apartment_id')->constrained();
            $table->foreignId('premium_feature_id')->constrained();
            $table->dateTime('started_at')->default(date('Y-m-d H:i:s'));
            $table->dateTime('expiring_at')->default(date('Y-m-d H:i:s', strtotime(' + 24 hours')));
            // $table->primary(['apartment_id', 'premium_feature_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apartment_premium_feature');
    }
}
