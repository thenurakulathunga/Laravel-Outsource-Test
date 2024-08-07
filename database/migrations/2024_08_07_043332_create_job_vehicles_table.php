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
        Schema::create('service_job_vehicles', function (Blueprint $table) {
            $table->id();
$table->bigInteger('vehicle_id')->unsigned();
$table->bigInteger('job_id')->unsigned();

$table->foreign('job_id')
      ->references('id')
      ->on('jobs')
      ->onDelete('cascade');

$table->foreign('vehicle_id')
      ->references('id')
      ->on('vehicles')
      ->onDelete('cascade');

$table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_vehicles');
    }
};
