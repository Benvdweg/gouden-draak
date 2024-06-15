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
        Schema::table('order_lines', function (Blueprint $table) {
            $table->foreign(['order_id'], 'order_lines_ibfk_1')->references(['id'])->on('orders')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['dish_id'], 'order_lines_ibfk_2')->references(['id'])->on('dishes')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('order_lines', function (Blueprint $table) {
            $table->dropForeign('order_lines_ibfk_1');
            $table->dropForeign('order_lines_ibfk_2');
        });
    }
};
