<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFilterWordsTable extends Migration
{
    /**
     * Run the migration.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('filter_words', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->string('name')->unique();
            $table->integer('range')->default(0);       // 0 means global
            $table->enum('status', ['enable', 'disable'])->default('enable');
        });
    }


    public function down()
    {
        Schema::drop('filter_words');
    }
}
