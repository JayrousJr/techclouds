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
        Schema::create('service_orders', function (Blueprint $table) {
            $table->id();
            $table->string('token');

            $table->unsignedBigInteger('request_id')->index();
            $table->foreign('request_id')
                ->references('request_id')
                ->on('projects')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->unsignedBigInteger('client_id');
            $table->foreign('client_id')
                ->references('client_id')
                ->on('projects')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->string('Customer_Name');
            $table->foreign('Customer_Name')
                ->references('Customer_Name')
                ->on('service_requests')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->string('service_name')->index();
            $table->foreign('service_name')
                ->references('Service_Requested')
                ->on('projects')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->string('project_class')->index();
            $table->foreign('project_class')
                ->references('project_class')
                ->on('projects')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->string('project_status')->index();
            $table->foreign('project_status')
                ->references('status')
                ->on('projects')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->string('project_developer')->index();
            $table->foreign('project_developer')
                ->references('developer_name')
                ->on('projects')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->string('developer_image')->index()->nullable();
            $table->foreign('developer_image')
                ->references('developer_image')
                ->on('projects')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->string('project_role')->index();
            $table->foreign('project_role')
                ->references('project_role')
                ->on('projects')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->date('date_to_start')->index();
            $table->foreign('date_to_start')
                ->references('date_to_start')
                ->on('projects')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->date('date_to_finish')->index();
            $table->foreign('date_to_finish')
                ->references('date_to_finish')
                ->on('projects')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->string('Developer_Comments');
            $table->foreign('Developer_Comments')
                ->references('developer_comments')
                ->on('projects')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->string('project_name');
            $table->foreign('project_name')
                ->references('project_name')
                ->on('projects')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->string('project_image');
            $table->foreign('project_image')
                ->references('project_image')
                ->on('projects')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->boolean('paid');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_orders');
    }
};
