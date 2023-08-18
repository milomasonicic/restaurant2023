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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->text("description");
            $table->enum("category", ["food","drink"]);
            $table->foreignId("food_sub_category_id")->nullable()->constrained()->onDelete("cascade");
            $table->foreignId("drink_sub_category_id")->nullable()->constrained()->onDelete("cascade")/*->default(null)*/;
            $table->integer("price");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
