<?php

use App\Interfaces\Models\ReviewVoteInterface;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Interfaces\Models\ProductInterface;
use App\Interfaces\Models\UserInterface;
use Illuminate\Database\Eloquent\Model;

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
                ->constrained(UserInterface::TABLE);
            $table->foreignId(ReviewVoteInterface::PRODUCT_ID)
                ->constrained(ProductInterface::TABLE);

            $table->tinyInteger(ReviewVoteInterface::RATING)->nullable();

            $table->boolean(ReviewVoteInterface::APPROVED)
                ->index()
                ->default(ReviewVoteInterface::APPROVED_NO);

            $table->timestamp(Model::CREATED_AT)->nullable();
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
