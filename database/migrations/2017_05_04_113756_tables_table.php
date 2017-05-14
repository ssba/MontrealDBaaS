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
            $table->enum('type', [
                'INT',
                'VARCHAR',
                'TEXT',
                'DATE',
                'TINYINT',
                'SMALLINT',
                'MEDIUMINT',
                'FLOAT',
                'DOUBLE',
                'REAL',
                'BOOLEAN',
                'DATETIME',
                'TIMESTAMP',
                'TIME',
                'YEAR',
                'CHAR',
                'TINYTEXT',
                'MEDIUMTEXT',
                'LONGTEXT',
                'BINARY',
                'VARBINARY',
                'BLOB',
                'ENUM'
            ]);
            $table->string('values');
            $table->string('default');
            $table->string('collation');
            $table->string('attributes');
            $table->boolean('NULL');
            $table->enum('index', [
                'PRIMARY',
                'UNIQUE',
                'INDEX',
                'FULLTEXT',
                'SPATIAL'
            ]);
            $table->boolean('ai');
            $table->text('comments');
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
