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
        Schema::table('users', function (Blueprint $table) {
           $table->string("roles",30)->after("name");
           $table->string("mobile",20)->after("email");
           $table->timestamp("deleted_at");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
           $table->dropColumn('roles');
           $table->dropColumn("mobile");
           $table->dropColumn("deleted_at");
        });
    }
};
