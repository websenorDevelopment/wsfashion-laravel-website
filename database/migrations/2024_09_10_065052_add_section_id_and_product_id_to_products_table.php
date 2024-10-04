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
        Schema::table('products', function (Blueprint $table) {
            //
            // Add columns
            $table->unsignedBigInteger('section_id')->nullable()->after('barcode');
            $table->unsignedBigInteger('category_id')->nullable()->after('section_id');

            // Add foreign key constraints
            $table->foreign('section_id')->references('id')->on('sections')->onDelete('set null');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
            // Replace 'other_table' with the actual table name where product_id references

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            //
            // Drop foreign key constraints
            $table->dropForeign(['section_id']);
            $table->dropForeign(['category_id']);

            // Drop columns
            $table->dropColumn('section_id');
            $table->dropColumn('category_id');
        });
    }
};



