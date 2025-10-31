<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('catalogs', function (Blueprint $table) {
            $table->id();
            $table->string('carName');
            $table->string('carModel');
            $table->string('carYear');
            $table->string('carColor');
            $table->string('carImage');
            $table->integer('carMileage');
            $table->integer('carPrice');
            $table->integer('carCount');
            $table->boolean('is_new');
            $table->softDeletes();
            $table->timestamps();

            // ✅ Используем foreignId() для автоматического создания constraints
            $table->foreignId('carEngineType')
                ->nullable()
                ->constrained('car_engine_types')
                ->onDelete('set null');

            $table->foreignId('carTransmissionType')
                ->nullable()
                ->constrained('car_transmission_types')
                ->onDelete('set null');

            // Индексы создаются автоматически с foreignId, но можно добавить кастомные
            $table->index('carEngineType', 'carEngineType_idx');
            $table->index('carTransmissionType', 'carTransmissionType_idx');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('catalogs');
    }
};
