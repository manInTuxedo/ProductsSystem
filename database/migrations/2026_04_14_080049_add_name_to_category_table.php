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
        if (!Schema::hasColumn('category', 'name')) {
            Schema::table('category', function (Blueprint $table) {
                $table->string('name')->after('id');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasColumn('category', 'name')) {
            Schema::table('category', function (Blueprint $table) {
                $table->dropColumn('name');
            });
        }
    }
};
