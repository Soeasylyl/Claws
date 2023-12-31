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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name', 30);
            $table->string('description', 500);
            $table->string('contacts', 40);
            $table->boolean('hidden');
            $table->timestamps();
        });

        Schema::table('records', function (Blueprint $table) {
            $table->bigInteger('client_id')->unsigned()->index();
        });
        Schema::table('records', function (Blueprint $table) {
            $table->bigInteger('price_id')->unsigned()->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
