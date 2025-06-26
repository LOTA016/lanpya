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
        Schema::create('mentors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('profession');       // Job title, e.g. 'Software Engineer'
            $table->string('industry')->nullable();   // Industry/sector e.g. 'IT', 'Finance', 'Healthcare'
            $table->string('expertise')->nullable();  // Key skills, comma separated e.g. 'PHP, Laravel, AI'
            $table->text('bio');
            $table->string('language');          // e.g. 'en', 'my'
            $table->text('social_links');
            $table->string('location')->nullable();  // Country or city, e.g. 'Yangon, Myanmar'
            $table->string('experience_level')->nullable(); // Junior, Mid, Senior, Expert
            $table->string('availability')->nullable();     // e.g. 'Weekdays', 'Weekends', 'Evenings'
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mentors');
    }
};
