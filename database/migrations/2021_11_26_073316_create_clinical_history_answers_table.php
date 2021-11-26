<?php
declare(strict_types=1);

use App\Models\ClinicalHistoryAnswer;
use App\Models\ClinicalHistory;
use App\Models\ClinicalHistoryQuestion;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClinicalHistoryAnswersTable extends Migration
{
    public function up(): void
    {
        Schema::create(ClinicalHistoryAnswer::TABLE_NAME, function (Blueprint $table) {
            $table->unsignedBigInteger(ClinicalHistoryAnswer::DB_FIELD_FK_CLINICAL_HISTORY);
            $table->unsignedBigInteger(ClinicalHistoryAnswer::DB_FIELD_FK_CLINICAL_HISTORY_QUESTION);
            $table->string(ClinicalHistoryAnswer::DB_FIELD_ANSWER);
            $table->timestamps();

            $table->foreign(ClinicalHistoryAnswer::DB_FIELD_FK_CLINICAL_HISTORY)
                ->references(ClinicalHistory::DB_FIELD_ID)
                ->on(ClinicalHistory::TABLE_NAME);

            $table->foreign(ClinicalHistoryAnswer::DB_FIELD_FK_CLINICAL_HISTORY_QUESTION)
                ->references(ClinicalHistoryQuestion::DB_FIELD_ID)
                ->on(ClinicalHistoryQuestion::TABLE_NAME);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists(ClinicalHistoryAnswer::TABLE_NAME);
    }
}
