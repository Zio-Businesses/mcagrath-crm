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
        Schema::create('vendor_estimates', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id')->unsigned()->nullable();
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('vendor_id')->nullable()->index('estimates_vendor_id_foreign');
            $table->string('estimate_number')->nullable()->unique();
            $table->date('valid_till');
            $table->double('sub_total', 16, 2);
            $table->double('discount')->default(0);
            $table->enum('discount_type', ['percent', 'fixed'])->default('percent');
            $table->double('total', 16, 2);
            $table->unsignedInteger('currency_id')->nullable()->index('estimates_currency_id_foreign');
            $table->enum('status', ['declined', 'accepted', 'waiting', 'sent', 'draft', 'canceled'])->default('waiting');
            $table->mediumText('note')->nullable();
            $table->longText('description')->nullable();
            $table->boolean('send_status')->default(true)->nullable();
            $table->unsignedInteger('added_by')->nullable()->index('estimates_added_by_foreign');
            $table->unsignedInteger('last_updated_by')->nullable()->index('estimates_last_updated_by_foreign');
            $table->foreign(['added_by'])->references(['id'])->on('users')->onUpdate('CASCADE')->onDelete('SET NULL');
            $table->foreign(['vendor_id'])->references(['id'])->on('vendor_contracts')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['currency_id'])->references(['id'])->on('currencies')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['last_updated_by'])->references(['id'])->on('users')->onUpdate('CASCADE')->onDelete('SET NULL');
            $table->text('hash')->nullable();
            $table->enum('calculate_tax', ['after_discount', 'before_discount'])->default('after_discount');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendor_estimates');
    }
};
