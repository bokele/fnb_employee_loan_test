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
        Schema::create('loan_collaterals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('created_by')->nullable();
            $table->foreignId('loan_id')->nullable();
            $table->foreignId('loan_collateral_type_id')->constrained();
            $table->string('collateral_physical_asset')->nullable();
            $table->string('collateral_lacation_of_item')->nullable();
            $table->string('collateral_address')->nullable();
            $table->longText('comment')->nullable();
            $table->string('collateral_file')->nullable();
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
        Schema::dropIfExists('loan_collaterals');
    }
};
