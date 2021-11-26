<?php
declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Patient;
use App\Models\User;

class CreatePatientsTable extends Migration
{
    public function up(): void
    {
        Schema::create(Patient::TABLE_NAME, function (Blueprint $table) {
            $table->id(Patient::DB_FIELD_ID);
            $table->unsignedBigInteger(Patient::DB_FIELD_FK_USER);
            $table->string(Patient::DB_FIELD_NAME);
            $table->string(Patient::DB_FIELD_PHONE_NUMBER);
            $table->date(Patient::DB_FIELD_BIRTH_DATE);
            $table->string(Patient::DB_FIELD_ADDRESS);
            $table->timestamps();

            $table->foreign(Patient::DB_FIELD_FK_USER)
                ->references(User::DB_FIELD_ID)
                ->on(User::TABLE_NAME);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists(Patient::TABLE_NAME);
    }
}
