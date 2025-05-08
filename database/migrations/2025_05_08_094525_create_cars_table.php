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
        Schema::create('cars', function (Blueprint $table) {
            $table->id('car_id');
            $table->unsignedBigInteger('make');
            $table->string('model');
            $table->string('engine');
            $table->unsignedBigInteger('body_style');
            $table->string('drivetrain');
            $table->string('transmission');
            $table->integer('horsepower');
            $table->integer('mileage');
            $table->string('vin')->unique();
            $table->string('status')->default('available');
            $table->string('exterior_color');
            $table->string('interior_color');
            $table->string('condition');
            $table->decimal('price', 10, 2);
            $table->text('car_description');
            $table->boolean('modified')->default(false);
            $table->unsignedBigInteger('listed_by');
            $table->unsignedBigInteger('bought_by')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('make')->references('brand_id')->on('brands')->onDelete('cascade');
            $table->foreign('body_style')->references('body_id')->on('bodies')->onDelete('cascade');
            $table->foreign('listed_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('bought_by')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
