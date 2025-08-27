<?php

use App\Enums\AdminStatus;
use App\Models\Admin;
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
        Schema::create('admins', function (Blueprint $table): void {
            $table->snowflake()->primary();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('status');
            $table->string('locale');
            $table->integer('permissions');

            $table->softDeletes();
            $table->timestamps();
        });

        Admin::query()->create([
            'name' => 'Super Admin',
            'email' => 'admin@admin.com',
            'status' => AdminStatus::SUPER_ADMIN->value,
            'password' => bcrypt('Password123!'),
            'locale' => 'ar',
            'permissions' => -1,
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
