<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('laravel_model_connector_table', function (Blueprint $table) {
            $table->id();
            $table->string('model');
            $table->integer('model_id');
            $table->json('connected_with');
            $table->json('connected_data')->nullable();
            $table->timestamps();
        });
    }
};
