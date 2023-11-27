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
        Schema::create('permission', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('role_id');
            $table->foreign('role_id')->references('id')
                ->on('role')->onDelete('cascade');
            $table->string('permission');
            $table->boolean('is_publish')->default(1);
            $table->boolean('deleted')->default(0);
            $table->timestamps();
            $table->engine = "InnoDB";
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permission');
    }
};
