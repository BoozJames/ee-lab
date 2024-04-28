<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsMaintenanceItemsListingTable extends Migration
{
    public function up()
    {
        Schema::create('reports_maintenance_items_listing', function (Blueprint $table) {
            $table->id();
            $table->foreignId('maintenance_id')->constrained('reports_maintenance')->onDelete('cascade');
            $table->unsignedBigInteger('item_id');
            $table->foreignId('variant_id')->constrained('item_variants');
            $table->string('equipment_label');
            $table->string('status');
            $table->text('remarks')->nullable();
            $table->text('corrective_action')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::table('reports_maintenance_items_listing', function (Blueprint $table) {
            // Drop variant_id column if needed
            $table->dropForeign(['variant_id']);
            $table->dropColumn('variant_id');
        });
    }
}
