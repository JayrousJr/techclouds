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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('request_id')->index();
            $table->foreign('request_id')
                ->references('id')
                ->on('service_requests')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->unsignedBigInteger('client_id')->index();
            $table->foreign('client_id')
                ->references('client_id')
                ->on('service_requests')
                ->onDelete('cascade')
                ->onUpdate('cascade'); //this is the id on the users table
            $table->string('token')->unique()->nullable();
            $table->string('project_name', 250)->index();
            $table->string('Service_Requested')->index();
            $table->foreign('Service_Requested')
                ->references('Service_Requested')
                ->on('service_requests')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->string('project_class')->index();

            $table->string('project_client')->index();
            $table->foreign('project_client')
                ->references('Customer_Name')
                ->on('service_requests')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->string('project_role')->index();
            $table->string('project_image')->index();
            $table->date('date_to_start')->index();
            $table->date('date_to_finish')->index();
            $table->string('status')->index();
            $table->foreign('status')
                ->references('status_name')
                ->on('statuses')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->string('developer_name')->index();
            $table->foreign('developer_name')
                ->references('name')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->string('developer_image')->index();
            $table->foreign('developer_image')
                ->references('profile_photo_path')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->string('developer_comments')->index();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
