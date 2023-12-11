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
        Schema::create('users', function (Blueprint $table) {
            $table->id()->index();
            $table->string('name')->index();
            $table->string('email')->unique();
            $table->string('profile_photo_path')->index()->nullable();
            $table->string('phone', 20)->nullable();
            $table->string('nationality', 50)->nullable();
            $table->string('city', 50)->index()->nullable();
            $table->string('profession')->nullable();
            $table->foreign('profession')
                ->references('rank')
                ->on('professions')
                ->onDelete('cascade')
                ->onUpdate('cascade')->nullable;
            $table->string('languages')->nullable();
            $table->boolean('team_member')->default('0');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('role')->nullable();
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
