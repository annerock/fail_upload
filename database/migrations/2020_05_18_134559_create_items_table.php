<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('description');
            $table->string('amount')->default('1 Stück');
            $table->double('maxPrice');
            $table->bigInteger('shoppinglist_id')->unsigned()->nullable();
            $table->foreign('shoppinglist_id')->references('id')->on('shoppinglists')->onDelete('cascade');
        });

        /*
        Schema::table('items', function (Blueprint $table) {
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
        Schema::dropIfExists('items');
    }
}
