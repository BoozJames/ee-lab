<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsInventoryItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports_inventory_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_reports_inventory')->constrained('reports_inventory')->onDelete('cascade');
            $table->string('item_id');
            $table->string('item_name');
            $table->text('item_description')->nullable();
            $table->string('variant_id');
            $table->string('brand');
            $table->text('variant_description')->nullable();
            $table->string('status');
            $table->string('unit');
            $table->string('category');
            $table->string('equipment_label');
            $table->string('serial_number');
            $table->date('last_calibration_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reports_inventory_items');
    }
}
