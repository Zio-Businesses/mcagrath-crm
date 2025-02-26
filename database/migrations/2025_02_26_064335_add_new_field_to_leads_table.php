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
        Schema::table('leads', function (Blueprint $table) {
            $table->date('last_called_date')->nullable();
            $table->date('next_follow_up_date')->nullable();
            $table->date('on_board_date')->nullable();
            $table->date('rejected_date')->nullable();
            $table->text('comments')->nullable(); // Changed to 'text' for a textarea-like field
            $table->string('position')->nullable();
            $table->string('poc')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('leads', function (Blueprint $table) {
            $table->dropColumn([
                'last_called_date',
                'next_follow_up_date',
                'on_board_date',
                'rejected_date',
                'comments',
                'position',
                'poc'
            ]);
        });
    }
};
