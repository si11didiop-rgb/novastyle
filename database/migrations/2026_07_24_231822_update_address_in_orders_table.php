<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('address');
            $table->string('address_street')->after('status');
            $table->string('address_city')->after('address_street');
            $table->string('address_postal')->after('address_city');
            $table->string('address_country')->default('France')->after('address_postal');
        });
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn(['address_street', 'address_city', 'address_postal', 'address_country']);
            $table->text('address');
        });
    }
};