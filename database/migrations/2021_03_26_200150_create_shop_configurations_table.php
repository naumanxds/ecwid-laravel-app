<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopConfigurationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_configurations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('shop_url')->unique();
            $table->text('client_id')->nullable();
            $table->text('client_secret')->nullable();
            $table->text('public_token')->nullable();
            $table->text('secret_token')->nullable();
            $table->integer('number_field')->nullable();
            $table->boolean('configuration_success')->default(0);
            $table->timestamps();

            $table->foreign('user_id', 'shop_configurations_n_users_fk')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_configurations');
    }
}
