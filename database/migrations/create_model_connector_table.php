<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private string $table;

    public function __construct()
    {
        $this->table = config('model-connector.table');
    }

    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->id();
            $table->string('model');
            $table->integer('model_id');
            $table->json('connected_with');
            $table->json('connected_data')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop($this->table);
    }
};
