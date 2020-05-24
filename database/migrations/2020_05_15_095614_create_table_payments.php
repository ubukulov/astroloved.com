<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePayments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->bigInteger('pg_payment_id')->nullable();
            $table->bigInteger('sum');
            $table->enum('tariff', [
                'free', 'week', 'month', 'year'
            ]);
            $table->string('pg_salt')->nullable();
            $table->string('pg_sig')->nullable();
            $table->enum('status', [
                'processing', 'paid', 'canceled'
            ]);
            $table->timestamp('actived_at')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
