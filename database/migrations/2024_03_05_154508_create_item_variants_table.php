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
        Schema::create('item_variants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('item_id')->constrained()->onDelete('cascade');
            $table->string('brand');
            $table->string('variant_description')->nullable();
            $table->string('status')->nullable();
            $table->unsignedBigInteger('unit_id')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('unit_id')->references('id')->on('units')->onDelete('set null');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
            $table->string('equipment_label')->nullable();
            $table->string('serial_number')->nullable();
            $table->timestamp('last_calibration_date')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('item_variants', function (Blueprint $table) {
            $table->dropForeign(['units_id']);
            $table->dropForeign(['categories_id']);
            $table->dropColumn(['units_id', 'categories_id']);
        });
    }
};
