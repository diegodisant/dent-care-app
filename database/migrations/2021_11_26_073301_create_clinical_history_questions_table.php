<?php
declare(strict_types=1);

use App\Models\ClinicalHistoryQuestion;
use App\Models\ClinicalHistorySection;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClinicalHistoryQuestionsTable extends Migration
{
    public function up(): void
    {
        Schema::create(ClinicalHistoryQuestion::TABLE_NAME, function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger(ClinicalHistoryQuestion::DB_FIELD_FK_CLINICAL_HISTORY_SECTION);
            $table->string(ClinicalHistoryQuestion::DB_FIELD_QUESTION);
            $table->enum(
                ClinicalHistoryQuestion::DB_FIELD_TYPE,
                ClinicalHistoryQuestion::ALLOWED_QUESTION_TYPES
            );
            $table->timestamps();

            $table->foreign(ClinicalHistoryQuestion::DB_FIELD_FK_CLINICAL_HISTORY_SECTION)
                ->references(ClinicalHistorySection::DB_FIELD_ID)
                ->on(ClinicalHistorySection::TABLE_NAME);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists(ClinicalHistoryQuestion::TABLE_NAME);
    }
}
