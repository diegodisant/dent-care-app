<?php
declare(strict_types=1);

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up(): void
    {
        Schema::create(User::TABLE_NAME, function (Blueprint $table) {
            $table->id(User::DB_FIELD_ID);
            $table->string(User::DB_FIELD_NAME);
            $table->string(User::DB_FIELD_EMAIL)->unique();
            $table->timestamp(User::DB_FIELD_EMAIL_VERIFIED_AT)->nullable();
            $table->string(User::DB_FIELD_PASSWORD);
            $table->enum(
                User::DB_FIELD_USER_TYPE,
                User::ALLOWED_USER_TYPES
            )->default(User::USER_TYPE_PATIENT);

            $table->softDeletes();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists(User::TABLE_NAME);
    }
}
