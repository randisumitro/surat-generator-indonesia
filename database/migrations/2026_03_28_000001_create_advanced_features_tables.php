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
        Schema::create('document_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->string('icon')->nullable();
            $table->boolean('is_active')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('document_fields', function (Blueprint $table) {
            $table->id();
            $table->foreignId('template_id')->constrained()->onDelete('cascade');
            $table->string('field_name');
            $table->string('field_type'); // text, textarea, email, phone, date, select, checkbox, radio
            $table->string('field_label');
            $table->text('field_options')->nullable(); // JSON for select/radio options
            $table->text('field_placeholder')->nullable();
            $table->boolean('is_required')->default(true);
            $table->text('validation_rules')->nullable(); // JSON for custom validation
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('document_shares', function (Blueprint $table) {
            $table->id();
            $table->foreignId('generated_document_id')->constrained()->onDelete('cascade');
            $table->string('share_token')->unique();
            $table->string('share_url');
            $table->boolean('is_protected')->default(false);
            $table->string('password')->nullable();
            $table->timestamp('expires_at')->nullable();
            $table->integer('view_count')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::create('document_analytics', function (Blueprint $table) {
            $table->id();
            $table->foreignId('generated_document_id')->constrained()->onDelete('cascade');
            $table->string('action_type'); // created, viewed, downloaded, shared
            $table->string('ip_address')->nullable();
            $table->string('user_agent')->nullable();
            $table->json('metadata')->nullable();
            $table->timestamp('created_at');
        });

        Schema::create('user_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('session_id')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->text('preferences')->nullable(); // JSON for user preferences
            $table->integer('document_count')->default(0);
            $table->timestamp('last_activity')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('document_analytics');
        Schema::dropIfExists('document_shares');
        Schema::dropIfExists('document_fields');
        Schema::dropIfExists('document_categories');
        Schema::dropIfExists('user_profiles');
    }
};
