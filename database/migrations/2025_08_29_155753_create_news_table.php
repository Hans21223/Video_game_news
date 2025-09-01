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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->string('image_url')->nullable(); // URL ของรูปภาพประกอบข่าว (อาจจะไม่มีก็ได้)
            $table->string('source_url')->nullable(); // URL ของเว็บต้นฉบับ
            $table->timestamp('published_at')->nullable(); // วันที่เผยแพร่
            $table->timestamps(); // สร้างคอลัมน์ created_at และ updated_at อัตโนมัติ
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
