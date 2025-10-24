<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('sku')
                ->unique()
                ->default(null)
                ->nullable();
            $table->integer('barcode')
                ->unique()
                ->default(null)
                ->nullable();
            $table->string('name');
            $table->integer('category')
                ->nullable()
                ->default(null);
            $table->integer('unit_qty');
            $table->string('unit_id');
            $table->text('description')
                ->nullable()
                ->default(null);
            $table->timestamp('expiration_date')
                ->nullable()
                ->default(null);
            $table->timestamps();
            $table->string('created_by')
                ->nullable()
                ->default(null);
            $table->string('updated_by')
                ->nullable()
                ->default(null);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
