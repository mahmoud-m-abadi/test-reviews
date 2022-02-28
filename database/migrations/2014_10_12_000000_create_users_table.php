<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Interfaces\Models\UserInterface;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(UserInterface::TABLE, function (Blueprint $table) {
            $table->id();
            $table->string(UserInterface::NAME);
            $table->string(UserInterface::EMAIL)->unique();
            $table->timestamp(UserInterface::EMAIL_VERIFIED_AT)->nullable();
            $table->string(UserInterface::PASSWORD);
            $table->rememberToken();
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
        Schema::dropIfExists(UserInterface::TABLE);
    }
};
