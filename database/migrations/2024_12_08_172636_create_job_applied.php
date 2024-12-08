<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('job_applied', function (Blueprint $table) {
            $table->id();
            $table->string("company_name");
            $table->string("link");
            $table->text("summary");
            $table->text("status");
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('job_applied');
    }
};
