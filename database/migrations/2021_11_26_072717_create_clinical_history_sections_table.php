<?php
declare(strict_types=1);

use App\Models\ClinicalHistorySection;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClinicalHistorySectionsTable extends Migration
{
    public function up(): void
    {
        Schema::create(ClinicalHistorySection::TABLE_NAME, function (Blueprint $table) {
            $table->id(ClinicalHistorySection::DB_FIELD_ID);
            $table->string(ClinicalHistorySection::DB_FIELD_TITLE);

            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists(ClinicalHistorySection::TABLE_NAME);
    }
}
