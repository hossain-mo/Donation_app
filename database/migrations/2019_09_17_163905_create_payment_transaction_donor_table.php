<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentTransactionDonorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_transaction_donors', function (Blueprint $table) {            
            $table->unsignedinteger('payment_transaction_id');
            $table->string('mobile');
            $table->string('name');
            $table->foreign('payment_transaction_id')->references('id')->on('payment_transactions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment_transaction_user');
    }
}
