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
        Schema::table('stores', function (Blueprint $table) {
            $table->string('main_products')->nullable()->change();
            $table->string('main_markets')->nullable()->change();
            $table->string('certifications')->nullable()->change();
            $table->string('delivery_rate')->nullable()->change();
            $table->string('response_time')->nullable()->change();
            $table->string('num_transactions')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('stores', function (Blueprint $table) {
            $table->string('main_products')->nullable(false)->change();
            $table->string('main_markets')->nullable(false)->change();
            $table->string('certifications')->nullable(false)->change();
            $table->string('delivery_rate')->nullable(false)->change();
            $table->string('response_time')->nullable(false)->change();
            $table->string('num_transactions')->nullable(false)->change();
        });
    }
};
