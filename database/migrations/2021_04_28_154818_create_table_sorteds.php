<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableSorteds extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sorteds', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("user_id")->index()->unsigned()->nullable(false);
            $table->foreign('user_id')->references('id')->on('users');
            $table->bigInteger("category_id")->index()->unsigned()->nullable(false);
            $table->foreign('category_id')->references('id')->on('categories');
            $table->integer("sorted")->nullable(false);
            $table->timestamp("created_at")->nullable(false)->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp("updated_at")->nullable(false)->default(DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sorteds');
    }
}
