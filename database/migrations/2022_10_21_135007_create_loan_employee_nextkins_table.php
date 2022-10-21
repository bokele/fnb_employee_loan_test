<?php

use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Testing\Constraints\SoftDeletedInDatabase;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan_employee_nextkins', function (Blueprint $table) {
            $table->id();
            $table->foreignId('created_by')->constrained();
            $table->foreignId('loan_id')->constrained();
            $table->string('kin_fullname');
            $table->string('kin_id_type')->default('nrc');
            $table->text('kin_id_number');
            $table->text('kin_phone_number');
            $table->string('kin_gender');
            $table->string('kin_relationship')->nullable();
            $table->string('kin_marital_status')->nullable();
            $table->string('kin_nationality')->nullable();
            $table->string('kin_occupation')->nullable();
            $table->string('kin_residential_address');
            $table->string('kin_id_path')->nullable();
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
        Schema::dropIfExists('loan_employee_nextkins');
    }
};
