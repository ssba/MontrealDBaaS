<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {

            $table->engine = 'InnoDB';
            $table->uuid('id')->unique();
            $table->string('fname');
            $table->string('lname');
            $table->enum('type', ['manager', 'superadmin']);
            $table->string('email')->unique();
            $table->binary('password');
            $table->enum('gender', ['m', 'f']);
            $table->rememberToken();
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
        Schema::dropIfExists('admins');
    }
}
