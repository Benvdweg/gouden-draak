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
        Schema::create('dishes', function (Blueprint $table) {
            $table->integer('id', true)->unique('id');
            $table->string('name', 100);
            $table->decimal('price', 10);
            $table->mediumText('description')->nullable();
            $table->integer('type_id')->nullable()->index('type_id');
            $table->unsignedInteger('menu_number')->nullable();
            $table->integer('addition_id')->nullable()->index('addition_id');

            $table->primary(['id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dishes');
    }
};
