<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKeySentimentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('key_sentiments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('keyword_id')->unsigned()->index();
            $table->integer('article_id')->unsigned()->index();
            $table->decimal('sentiment', 5, 2);
            $table->decimal('relevence', 5, 2);
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
        Schema::dropIfExists('KeySentiments');
    }
}
