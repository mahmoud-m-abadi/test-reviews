<?php

use App\Interfaces\Models\ReviewCommentInterface;
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
        Schema::create(ReviewCommentInterface::TABLE, function (Blueprint $table) {
            $table->id();

            $table->foreignId(ReviewCommentInterface::USER_ID)
                ->constrained(UserInterface::TABLE);
            $table->foreignId(ReviewCommentInterface::PRODUCT_ID)
                ->constrained(ProductInterface::TABLE);

            $table->string(ReviewCommentInterface::TITLE)->index();
            $table->text(ReviewCommentInterface::BODY)->nullable();

            $table->boolean(ReviewCommentInterface::APPROVED)
                ->index()
                ->default(ReviewCommentInterface::APPROVED_NO);

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
        Schema::dropIfExists(ReviewCommentInterface::TABLE);
    }
};
