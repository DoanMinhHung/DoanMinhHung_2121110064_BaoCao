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
        Schema::create('2121110064_brand', function (Blueprint $table) {
            $table->id();// id int key icrement
            $table->string('name',1000)->unique()->comment("Tên Thương hiệu");
            $table->string('slug',1000)->unique();
            $table->string('image',1000)->nullable()->comment("Logo Thương hiệu");
            $table->unsignedInteger('sort_order')->default(0)->comment("Vị trí hiển thị");
            $table->string('metakey',255);
            $table->string('metadesc',255);
            $table->unsignedInteger('created_by')->default(1);
            $table->unsignedInteger('updated_by')->nullable();
            $table->timestamps();
            $table->unsignedTinyInteger('status')->default(2)->comment("0:Rác-1:Hiện-2:Ẩn");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('2121110064_brand');
    }
};