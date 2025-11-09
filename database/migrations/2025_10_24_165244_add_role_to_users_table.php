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
        Schema::table('users', function (Blueprint $table) {
            $table->enum('role', ['employer', 'job_seeker'])->default('job_seeker');
        });

            Schema::create('jobs', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id')->constrained()->onDelete('cascade'); // employer id
                $table->string('title');
                $table->string('location')->nullable();
                $table->enum('type', ['remote', 'office', 'hybrid'])->default('office');
                $table->text('description');
                $table->string('salary')->nullable();
                $table->string('category')->nullable();
                $table->boolean('status')->default(true); // active/inactive
                $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
