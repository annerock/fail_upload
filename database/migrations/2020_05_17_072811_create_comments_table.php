<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('text');

            $table->bigInteger('written_by_id')->unsigned();
            $table->bigInteger('shoppinglist_id')->unsigned();

            $table->foreign('written_by_id')->references('id')->on('users');
            $table->foreign('shoppinglist_id')->references('id')->on('shoppinglists')->onDelete('cascade');

        });

        /*
        Schema::table('comments', function (Blueprint $table){
            $table->foreign('written_by_id')->references('id')->on('users');
            $table->foreign('list_id')->references('id')->on('lists')->onDelete('cascade');
        });
        */
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
