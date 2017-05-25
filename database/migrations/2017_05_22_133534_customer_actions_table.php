<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CustomerActionsTable extends Migration
{
    public $timestamps = false;

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_actions', function (Blueprint $table) {

            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->enum('type', ['create', 'edit', 'update', 'delete']);
            $table->uuid('customer');
            $table->uuid('database')->nullable();
            $table->uuid('table')->nullable();
            $table->text('description');
            $table->dateTime('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->foreign('customer')->references('id')->on('customers')->onDelete('cascade');
            $table->foreign('database')->references('id')->on('databases')->onDelete('cascade');
            $table->foreign('table')->references('id')->on('tables')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_actions');
    }
}
