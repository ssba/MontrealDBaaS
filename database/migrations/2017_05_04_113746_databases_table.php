<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DatabasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('databases', function (Blueprint $table) {

            $table->engine = 'InnoDB';
            $table->uuid('id')->unique();
            $table->uuid('customer');
            $table->string('name');
            $table->enum('charset', ['utf8'])->default('utf8');
            $table->string('collation')->nullable()->default('utf8_general_ci');
            $table->text('options')->nullable()->default(NULL)->comment('Only CSV with ; separator');
            $table->timestamps();
            $table->foreign('customer')->references('id')->on('customers')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('databases');
    }
}



