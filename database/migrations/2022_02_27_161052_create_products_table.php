<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Interfaces\Models\ProductInterface;
use App\Interfaces\Models\UserInterface;
use App\Interfaces\Models\ProviderInterface;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(ProductInterface::TABLE, function (Blueprint $table) {
            $table->id();

            $table->foreignId(ProductInterface::CREATOR_ID)
                ->constrained(UserInterface::TABLE);
            $table->foreignId(ProductInterface::PROVIDER_ID)
                ->constrained(ProviderInterface::TABLE);

            $table->string(ProductInterface::NAME)->index();

            $table->boolean(ProductInterface::PUBLISHED)
                ->default(ProductInterface::PUBLISHED_NO)
                ->index();

            $table->boolean(ProductInterface::ENABLE_COMMENT)
                ->default(ProductInterface::ENABLE_COMMENT_YES);
            $table->boolean(ProductInterface::ENABLE_VOTE)
                ->default(ProductInterface::ENABLE_VOTE_YES);
            $table->boolean(ProductInterface::ENABLE_REVIEW_FOR_BUYER)
                ->default(ProductInterface::ENABLE_REVIEW_FOR_BUYER_YES);

            /** I don't add index for nullable columns often */
            $table->double(ProductInterface::PRICE)
                ->nullable();

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
        Schema::dropIfExists(ProductInterface::TABLE);
    }
};
