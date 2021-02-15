<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->text('name');
            $table->string('ip',255)->unique();
            $table->text('image')->nullable();
            $table->text('slug')->nullable();

            //Detail Page
            $table->text('webSiteUrl')->nullable();
            $table->boolean('status')->default(0);
            $table->integer('onlinePlayer')->default(0);
            $table->integer('maxPlayer')->default(0);
            $table->integer('rank')->default(0);
            $table->integer('uptime')->nullable();
            $table->dateTime('lastCheck')->nullable();
            $table->text('country')->nullable();
            $table->text('type')->nullable();
            $table->boolean('isActive')->default(0);
            $table->softDeletes();
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
        Schema::dropIfExists('servers');
    }
}
