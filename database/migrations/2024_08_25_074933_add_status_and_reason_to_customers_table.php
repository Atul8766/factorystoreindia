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
        Schema::table('customers', function (Blueprint $table) {
            $table->string('status')->nullable(); // Add a nullable 'status' column
            $table->text('reason')->nullable();   // Add a nullable 'reason' column
        });
    }

    public function down()
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->dropColumn(['status', 'reason']); // Drop the columns if migrating down
        });
    }
};
