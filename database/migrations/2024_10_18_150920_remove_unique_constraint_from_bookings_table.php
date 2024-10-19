<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up() {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropUnique(['customer_email']); // Remove the unique constraint
        });
    }
    
    public function down() {
        Schema::table('bookings', function (Blueprint $table) {
            $table->unique('customer_email'); // Re-add the unique constraint if needed
        });
    }
};
