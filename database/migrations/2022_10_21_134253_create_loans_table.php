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
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->string("hashid")->nullable();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('verified_by')->nullable();
            $table->foreignId('approved_by')->nullable();
            $table->foreignId('disbursed_by')->nullable();
            $table->foreignId('loan_type_id')->nullable();
            $table->string('loan_reference_number')->nullable();
            $table->string('loan_status')->default("pending");
            $table->date('requested_date')->nullable();
            $table->date('ended_date')->nullable();;
            $table->date('interest_start_date')->nullable();
            $table->date('penality_start_date')->nullable();
            $table->unsignedBigInteger('loan_min')->default(0);
            $table->unsignedBigInteger('loan_max')->default(0);
            $table->unsignedBigInteger('principal')->default(0);
            $table->unsignedBigInteger('interest_rate')->default(0);
            $table->unsignedBigInteger('loan_interest')->default(0);
            $table->unsignedBigInteger('loan_total_amount')->default(0);
            $table->unsignedBigInteger('loan_balance_amount')->default(0);
            $table->string('interest_period')->default('day'); //, array('day', 'week', 'month', 'year')
            $table->tinyInteger('override_interest')->default(0);
            $table->decimal('override_interest_amount', 10, 4)->default(0.00)->nullable();
            $table->integer('loan_duration')->nullable();
            $table->string('loan_duration_type')->default('year'); //, array('day', 'week', 'month', 'year')
            $table->string('repayment_cycle')->default('daily'); //array('daily', 'weekly', 'monthly', 'bi_monthly', 'quarterly', 'semi_annually', 'annually')
            $table->integer('grace_on_interest_charged')->nullable();
            $table->integer('loan_duration_number')->nullable();
            $table->text('description')->nullable();
            $table->dateTime('approved_at')->nullable();
            $table->dateTime('verified_at')->nullable();
            $table->dateTime('disbursed_at')->nullable();
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
        Schema::dropIfExists('loans');
    }
};
