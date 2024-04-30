<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsInventoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports_inventory', function (Blueprint $table) {
            $table->id();
            $table->string('prepared_by');
            $table->string('prepared_by_designation');
            $table->date('date_prepared_by');
            $table->string('verified_by')->nullable();
            $table->string('verified_by_designation');
            $table->date('date_verified_by')->nullable();
            $table->string('checked_by')->nullable();
            $table->string('checked_by_designation');
            $table->date('date_checked_by')->nullable();
            $table->string('noted_by')->nullable();
            $table->string('noted_by_designation');
            $table->date('date_noted_by')->nullable();
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
        Schema::dropIfExists('reports_inventory');
    }
}
