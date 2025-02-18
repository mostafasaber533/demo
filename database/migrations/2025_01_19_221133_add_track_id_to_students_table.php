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
        Schema::table('students', function (Blueprint $table) {
            if (!Schema::hasColumn('students', 'track_id')) {
                $table->foreignId('track_id')->nullable()->constrained()
                    ->onDelete('CASCADE')->onUpdate('CASCADE');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('students', function (Blueprint $table) {
            if (Schema::hasColumn('students', 'track_id')) {
                $table->dropForeign(['track_id']);
                $table->dropColumn('track_id');
            }
        });
    }
};
