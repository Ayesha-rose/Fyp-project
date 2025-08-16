<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivityStreaksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('activity_streaks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->date('activity_date');  // Date when user interacted
            $table->integer('streak_count')->default(1); // Current streak
            $table->timestamps();

            $table->unique(['user_id', 'activity_date']); // Only one record per user per date
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('activity_streaks');
    }
}
