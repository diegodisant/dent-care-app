<?php
declare(strict_types=1);

use App\Models\ClinicalHistory;
use App\Models\Patient;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClinicalHistoriesTable extends Migration
{
    public function up(): void
    {
        Schema::create(ClinicalHistory::TABLE_NAME, function (Blueprint $table) {
            $table->id(ClinicalHistory::DB_FIELD_ID);
            $table->unsignedBigInteger(ClinicalHistory::DB_COLUMN_FK_PATIENT);
            $table->enum(
                ClinicalHistory::DB_COLUMN_MARITAL_STATUS,
                ClinicalHistory::ALLOWED_MARITAL_STATUSES
            );
            $table->string(ClinicalHistory::DB_COLUMN_BORN_PLACE);
            $table->string(ClinicalHistory::DB_COLUMN_DEGREE);
            $table->string(ClinicalHistory::DB_COLUMN_JOB);
            $table->enum(
                ClinicalHistory::DB_COLUMN_SEX_TYPE,
                ClinicalHistory::ALLOWED_SEX_TYPES
            );
            $table->enum(
                ClinicalHistory::DB_COLUMN_ASSURANCE_TYPE,
                ClinicalHistory::ALLOWED_ASSURANCE_TYPES
            );
            $table->string(ClinicalHistory::DB_COLUMN_NSS);
            $table->timestamps();

            $table->foreign(ClinicalHistory::DB_COLUMN_FK_PATIENT)
                ->references(Patient::DB_FIELD_ID)
                ->on(Patient::TABLE_NAME);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists(ClinicalHistory::TABLE_NAME);
    }
}
