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
        Schema::table('dishes', function (Blueprint $table) {
            $table->foreign(['type_id'], 'dishes_ibfk_1')->references(['id'])->on('dish_types')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['addition_id'], 'dishes_ibfk_2')->references(['id'])->on('additions')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['addition_id'], 'dishes_ibfk_3')->references(['id'])->on('additions')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('dishes', function (Blueprint $table) {
            $table->dropForeign('dishes_ibfk_1');
            $table->dropForeign('dishes_ibfk_2');
            $table->dropForeign('dishes_ibfk_3');
        });
    }
};
