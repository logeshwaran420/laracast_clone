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
        Schema::table('courses', function (Blueprint $table) {

            $table->integer('shorts')->default(0);
            $table->boolean('status')->default(1);
            //
        });
    }

   
    public function down()
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->dropColumn(['shorts', 'status']);
            //
        });
    }
};
