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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('token')->unique()->nullable();
            $table->string('service_name')->index();
            $table->string('service_code')->index();
            $table->string('service_description', 500);
            $table->string('service_more', 1500);
            $table->string('service_provider')->nullable();
            $table->foreign('service_provider')
            ->references('name')
            ->on('users')
            ->onDelete('cascade')
            ->onUpdate('cascade')->nullable;
            // $table->string('service_icon', 50);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
