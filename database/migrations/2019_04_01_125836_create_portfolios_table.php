<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePortfoliosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('portfolios', function (Blueprint $table) {
            $table->integer('user_id');
            $table->string('item_a');
            $table->string('item_b');
            $table->string('item_c');
            $table->string('item_d')->nullable();
            $table->string('item_e')->nullable();
            $table->string('item_f')->nullable();
            $table->string('item_g')->nullable();
            $table->string('item_h')->nullable();
            $table->string('item_i')->nullable();
            $table->string('item_j')->nullable();
            $table->integer('value_before_a');
            $table->integer('value_before_b');
            $table->integer('value_before_c');
            $table->integer('value_before_d')->nullable();
            $table->integer('value_before_e')->nullable();
            $table->integer('value_before_f')->nullable();
            $table->integer('value_before_g')->nullable();
            $table->integer('value_before_h')->nullable();
            $table->integer('value_before_i')->nullable();
            $table->integer('value_before_j')->nullable();
            $table->integer('value_after_a');
            $table->integer('value_after_b');
            $table->integer('value_after_c');
            $table->integer('value_after_d')->nullable();
            $table->integer('value_after_e')->nullable();
            $table->integer('value_after_f')->nullable();
            $table->integer('value_after_g')->nullable();
            $table->integer('value_after_h')->nullable();
            $table->integer('value_after_i')->nullable();
            $table->integer('value_after_j')->nullable();
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
        Schema::dropIfExists('portfolios');
    }
}
