<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('key_wallet', function (Blueprint $table) {
            $table->id();
            $table->string('apelido')->nullable();;
            $table->text('email')->nullable();;
            $table->bigInteger('id_user')->unsigned();
            $table->text('key');
            $table->timestamps();

            $table->foreign('id_user', 'fk_users')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('key_wallet');
    }
};
