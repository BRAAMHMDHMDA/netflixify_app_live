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
        Schema::table('movies', function (Blueprint $table) {
            if (!Schema::hasColumn('movies', 'views')) {
                $table->unsignedInteger('views')->default(0)->after('category_id');
            }
        });

        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'two_factor_secret')) {
                $table->text('two_factor_secret')->nullable()->after('password');
            }

            if (!Schema::hasColumn('users', 'two_factor_recovery_codes')) {
                $table->text('two_factor_recovery_codes')->nullable()->after('two_factor_secret');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('movies', function (Blueprint $table) {
            if (Schema::hasColumn('movies', 'views')) {
                $table->dropColumn('views');
            }
        });

        Schema::table('users', function (Blueprint $table) {
            $dropColumns = [];

            if (Schema::hasColumn('users', 'two_factor_secret')) {
                $dropColumns[] = 'two_factor_secret';
            }

            if (Schema::hasColumn('users', 'two_factor_recovery_codes')) {
                $dropColumns[] = 'two_factor_recovery_codes';
            }

            if ($dropColumns) {
                $table->dropColumn($dropColumns);
            }
        });
    }
};
