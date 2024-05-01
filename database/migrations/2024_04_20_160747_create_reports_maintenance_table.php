<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsMaintenanceTable extends Migration
{
    public function up()
    {
        Schema::create('reports_maintenance', function (Blueprint $table) {
            $table->id();
            $table->year('year');
            $table->string('conducted_by');
            $table->string('verified_by');
            $table->string('category');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('reports_maintenance');
    }
}
