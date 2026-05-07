<?php

use App\Enums\UserRole;
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
            $table->string('role', 32)->default(UserRole::Admin->value)->after('email_verified_at')->index();
            $table->string('profile_photo_path')->nullable()->after('role');
            $table->boolean('is_active')->default(true)->after('profile_photo_path')->index();
            $table->timestamp('last_login_at')->nullable()->after('remember_token');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'role',
                'profile_photo_path',
                'is_active',
                'last_login_at',
            ]);
        });
    }
};
