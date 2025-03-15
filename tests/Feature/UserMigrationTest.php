<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class UserMigrationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test that the users table has the expected columns.
     *
     * @return void
     */
    public function test_users_table_has_expected_columns()
    {
        $this->assertTrue(Schema::hasTable("users"));

        $this->assertTrue(
            Schema::hasColumns("users", [
                "id",
                "name",
                "email",
                "email_verified_at",
                "remember_token",
                "created_at",
                "updated_at",
            ])
        );

        // Ensure the password column does NOT exist
        $this->assertFalse(Schema::hasColumn("users", "password"));
    }

    /**
     * Test that sessions table exists and has the expected columns.
     *
     * @return void
     */
    public function test_sessions_table_has_expected_columns()
    {
        $this->assertTrue(Schema::hasTable("sessions"));

        $this->assertTrue(
            Schema::hasColumns("sessions", [
                "id",
                "user_id",
                "ip_address",
                "user_agent",
                "payload",
                "last_activity",
            ])
        );
    }

    /**
     * Test that password_reset_tokens table exists and has the expected columns.
     *
     * @return void
     */
    public function test_password_reset_tokens_table_has_expected_columns()
    {
        $this->assertTrue(Schema::hasTable("password_reset_tokens"));

        $this->assertTrue(
            Schema::hasColumns("password_reset_tokens", ["email", "token", "created_at"])
        );
    }
}
