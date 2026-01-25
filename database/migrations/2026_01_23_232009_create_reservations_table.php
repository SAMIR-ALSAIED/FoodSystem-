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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
                    $table->string('customer_name'); // اسم العميل
            $table->string('phone');         // رقم الهاتف
            $table->integer('guest_count');  // عدد الأشخاص

            // الطاولة المحجوزة
            $table->foreignId('table_id')->constrained('tables')->onDelete('cascade');
            $table->enum('status', ['تم الحجز','اكتمل الطلب','ملغي'])->default('تم الحجز');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
