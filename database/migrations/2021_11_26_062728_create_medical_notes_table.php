<?php
declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\MedicalNote;
use App\Models\Appointment;

class CreateMedicalNotesTable extends Migration
{
    public function up(): void
    {
        Schema::create(MedicalNote::TABLE_NAME, function (Blueprint $table) {
            $table->id(MedicalNote::DB_FIELD_ID);
            $table->unsignedBigInteger(MedicalNote::DB_FIELD_FK_APPOINTMENT);
            $table->string(MedicalNote::DB_FIELD_APPLIED_TREATMENT);
            $table->string(MedicalNote::DB_FIELD_ADDITIONAL_NOTES);

            $table->softDeletes();
            $table->timestamps();

            $table->foreign(MedicalNote::DB_FIELD_FK_APPOINTMENT)
                ->references(Appointment::DB_FIELD_ID)
                ->on(Appointment::TABLE_NAME);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists(MedicalNote::TABLE_NAME);
    }
}
