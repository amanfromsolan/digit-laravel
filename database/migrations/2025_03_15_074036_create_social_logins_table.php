<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create("social_logins", function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->constrained()->onDelete("cascade");
            $table->string("provider"); // 'apple', 'google', etc.
            $table->string("provider_id"); // The provider's unique user ID
            $table->text("provider_token")->nullable(); // Refresh token
            $table->json("provider_data")->nullable(); // Additional provider-specific data
            $table->timestamps();

            // Make sure a user can't connect the same provider account twice
            $table->unique(["provider", "provider_id"]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("social_logins");
    }
};
