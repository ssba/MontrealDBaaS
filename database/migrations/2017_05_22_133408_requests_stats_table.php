<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RequestsStatsTable extends Migration
{
    public $timestamps = false;

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests_stats', function (Blueprint $table) {

            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->enum('method', ['get', 'post','put', 'delete']);
            $table->enum('type', ['rest', 'graph']);
            $table->uuid('database');
            $table->string('ip');
            $table->string('country');
            $table->string('deviceFamily');
            $table->string('deviceModel');
            $table->unsignedInteger('responseCode');
            $table->boolean('responseError');
            $table->dateTime('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->foreign('database')->references('id')->on('databases')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requests_stats');
    }
}
