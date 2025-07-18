<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('tests', function (Blueprint $table) {
            $table->id();
            $table->string('title');               // اسم الاختبار
            $table->integer('duration_minutes');   // المدة بالدقائق
            $table->integer('attempts')->default(1); // عدد المحاولات المتاحة
            $table->timestamps();                  // created_at و updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tests');
    }
};