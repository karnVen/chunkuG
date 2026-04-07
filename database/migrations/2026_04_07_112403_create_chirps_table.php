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
    Schema::create('chirps', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->nullable()->constrained()->cascadeOnDelete();
        $table->string('message', 255);
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chirps');
    }
};

// We're entering into the chirps table for selecting the chirps table
// and then inserting a message
\DB::table('chirps')->insert([
    'user_id' => null,  // Because we don't have a user, we can just leave it off
    'message' => 'My first chirp in the database!',
    'created_at' => now(),  // Laravel doesn't give these by default when using DB
    'updated_at' => now()
]);

// And we get this true back. So that means that this was successful,
// this chirp was now entered into the database!

// Check it worked (all chirps)
\DB::table('chirps')->get();