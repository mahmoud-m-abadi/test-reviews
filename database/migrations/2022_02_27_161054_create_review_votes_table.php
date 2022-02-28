<?php

use App\Interfaces\Models\ReviewVoteInterface;
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
        Schema::create(ReviewVoteInterface::TABLE, function (Blueprint $table) {
            $table->id();

            $table->foreignId(ReviewVoteInterface::USER_ID)
                ->constrained(\App\Interfaces\Models\UserInterface::TABLE);
            $table->foreignId(ReviewVoteInterface::PRODUCT_ID)
                ->constrained(\App\Interfaces\Models\ProductInterface::TABLE);

            $table->tinyInteger(ReviewVoteInterface::RATING)->nullable();

            $table->boolean(ReviewVoteInterface::APPROVED)
                ->index()
                ->default(ReviewVoteInterface::APPROVED_NO);

            $table->timestamp(\Illuminate\Database\Eloquent\Model::CREATED_AT)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(ReviewVoteInterface::TABLE);
    }
};
