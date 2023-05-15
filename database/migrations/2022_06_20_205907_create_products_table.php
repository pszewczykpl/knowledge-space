<?php

use App\Enums\ProductPremiumType;
use App\Enums\ProductType;
use App\Enums\ProductKind;
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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('code_toil')->nullable();
            $table->string('group_code')->nullable();
            $table->string('group_name')->nullable();
            $table->string('name');
            $table->string('code')->nullable();
            $table->string('code_owu');
            $table->boolean('is_subscriptions');
            $table->string('subscription_code')->nullable();
            $table->string('subscription_status')->nullable();
            $table->date('subscription_date_from')->nullable();
            $table->date('subscription_date_to')->nullable();
            $table->enum('kind', ProductKind::list());
            $table->enum('type', ProductType::list());
            $table->string('partner_name')->nullable();
            $table->string('partner_code')->nullable();
            $table->integer('insurer_min_age')->nullable();
            $table->integer('insurer_max_age')->nullable();
            $table->integer('insured_min_age')->nullable();
            $table->integer('insured_max_age')->nullable();
            $table->integer('period_of_insurance')->nullable();
            $table->enum('premium_type', ProductPremiumType::list())->nullable();
            $table->string('system_status')->nullable();
            $table->string('system_name');
            $table->date('published_at');
            $table->boolean('is_archived');
            $table->foreignId('created_by')->nullable()->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
