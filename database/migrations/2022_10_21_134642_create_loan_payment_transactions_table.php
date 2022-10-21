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
        Schema::create('loan_payment_transactions', function (Blueprint $table) {
            $table->id();
            $table->string("hashid")->nullable();
            $table->foreignId('approved_by')->nullable();
            $table->foreignId('created_by')->nullable();
            $table->foreignId("loan_id")->constrained();
            $table->boolean("trans_status")->default(false);
            $table->string("status")->default('wait');;
            $table->unsignedBigInteger('trans_amount')->default(0);
            $table->unsignedBigInteger('trans_charge')->default(0);
            $table->unsignedBigInteger('old_amount')->default(0);
            $table->unsignedBigInteger('update_amount')->default(0);
            $table->string('message')->nullable();
            $table->string('trans_refference')->unique();
            $table->string('payment_type')->nullable();
            $table->string('chaque_number')->nullable();
            $table->string('being_payment_for')->nullable();
            $table->string('paid_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loan_payment_transactions');
    }
};
