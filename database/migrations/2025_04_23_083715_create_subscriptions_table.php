<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Link to the user (user_id references the users table)
            $table->foreignId('plan_id')->constrained()->onDelete('cascade'); // Link to the plan (plan_id references the plans table)
            $table->timestamp('starts_at'); // Subscription start date and time
            $table->timestamp('ends_at')->nullable(); // Subscription end date and time (nullable for "forever" plans)
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subscriptions');
    }
};
