<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('provinces', function (Blueprint $table) {
            $table->id();
            $table->string('name', 48);
        });

        Schema::create('districts', function (Blueprint $table) {
            $table->id();
            $table->string('name', 48);
            $table->foreignId('province_id')->constrained('provinces')->cascadeOnDelete()->cascadeOnUpdate();
        });

        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->string('name', 48);
            $table->foreignId('district_id')->constrained('districts')->cascadeOnDelete()->cascadeOnUpdate();
        });

        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name',48);
            $table->string('nic', 13)->nullable();
            $table->string('phone',11)->unique();
            $table->string('email',64)->unique()->nullable();
            $table->string('password');
            $table->string('avatar', 255)->nullable();
            $table->enum('status', ['active', 'inactive', 'deleted', 'banned'])->default('active');
            $table->boolean('terms')->default(false);
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('markets', function (Blueprint $table) {
            $table->id();
            $table->string('name', 48);
            $table->foreignId('province_id')->constrained('provinces')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('district_id')->constrained('districts')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('city_id')->constrained('cities')->cascadeOnDelete()->cascadeOnUpdate();
            $table->text('description',1500)->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
        });

        Schema::create('user_has_markets', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('market_id')->constrained('markets')->cascadeOnDelete()->cascadeOnUpdate();
        });

        Schema::create('customer_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name', 48);
            $table->string('description',255)->nullable();
        });

        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name', 48)->nullable();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('market_id')->nullable()->constrained('markets')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('customer_category_id')->nullable()->constrained('customer_categories')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('near_by', 255);
            $table->string('street', 255);
            $table->string('address', 255);
            $table->string('whatsapp', 11)->nullable();
            $table->string('location_image', 255)->nullable();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });

        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->string('model', 255);
            $table->unsignedBigInteger('model_id');
            $table->enum('type', ['create', 'update', 'read', 'delete']);
            $table->text('description')->nullable();
            $table->string('ip_address', 45);
            $table->text('user_agent');
            $table->foreignId('user_id')->nullable()->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamp('created_at', 6);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('provinces');
        Schema::dropIfExists('districts');
        Schema::dropIfExists('cities');
        Schema::dropIfExists('users');
        Schema::dropIfExists('markets');
        Schema::dropIfExists('user_has_markets');
        Schema::dropIfExists('customer_categories');
        Schema::dropIfExists('user_contacts');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('activities');
    }
};
