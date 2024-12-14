<?php

use App\Casts\JobAppliedStatusCast;
use App\Enums\JobAppliedStatusEnums;
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
            $table->text("link");
            $table->text("summary")->nullable();
            $table->string("status")->default(JobAppliedStatusEnums::Applied->name);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('job_applied');
    }
};
