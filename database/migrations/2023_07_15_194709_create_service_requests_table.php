<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        Schema::create('service_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id')->index();
            // $table->foreign('client_id')
            //     ->references('id')
            //     ->on('users')
            //     ->onDelete('cascade')
            //     ->onUpdate('cascade'); //this is the id on the users table
            $table->string('token')->unique()->nullable();
            $table->string('Customer_Name')->index();
            $table->string('Customer_Email')->index();
            $table->string('Customer_Phone')->index();
            $table->string('Service_Requested')->index();
            $table->string('Short_Description', 1500);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_requests');
    }
};
