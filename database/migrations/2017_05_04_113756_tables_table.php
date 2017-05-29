<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tables', function (Blueprint $table) {

            $table->engine = 'InnoDB';
            $table->uuid('id')->unique();
            $table->uuid('database');
            $table->string('name');
            $table->enum('charset', ['utf8'])->default('utf8');
            $table->string('collation')->nullable()->default('utf8_general_ci');
            $table->text('comment')->nullable();
            $table->integer('cache')->nullable();
            $table->timestamps();
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
        Schema::dropIfExists('tables');
    }
}
