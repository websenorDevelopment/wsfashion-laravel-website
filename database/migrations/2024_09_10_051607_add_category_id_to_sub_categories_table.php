<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('sub_categories', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id')->after('id');  // Place it after 'id' or any other appropriate column

            // Optionally, add a foreign key constraint
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('sub_categories', function (Blueprint $table) {
            // Drop the foreign key and the column if necessary
            $table->dropForeign(['category_id']);
            $table->dropColumn('category_id');
        });
    }
};
