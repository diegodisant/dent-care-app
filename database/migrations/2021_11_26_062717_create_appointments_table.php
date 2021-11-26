<?php
declare(strict_types=1);

use App\Models\Appointment;
use App\Models\Patient;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    public function up()
    {
        Schema::create(Appointment::TABLE_NAME, function (Blueprint $table) {
            $table->id(Appointment::DB_FIELD_ID);
            $table->unsignedBigInteger(Appointment::DB_FIELD_FK_PATIENT);
            $table->dateTime(Appointment::DB_APPOINTMENT_AT);
            $table->enum(
                Appointment::DB_FIELD_STATUS,
                Appointment::ALLOWED_STATUSES
            );
            $table->timestamps();

            $table->foreign(Appointment::DB_FIELD_FK_PATIENT)
                ->references(Patient::DB_FIELD_ID)
                ->on(Patient::TABLE_NAME);
        });
    }

    public function down()
    {
        Schema::dropIfExists(Appointment::TABLE_NAME);
    }
}
