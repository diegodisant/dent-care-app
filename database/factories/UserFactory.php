<?php
declare(strict_types=1);

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    public function definition(): array
    {
        return [
            User::DB_FIELD_NAME => $this->faker->name(),
            User::DB_FIELD_EMAIL => $this->faker->unique()->safeEmail(),
            User::DB_FIELD_EMAIL_VERIFIED_AT => now(),
            User::DB_FIELD_PASSWORD => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            User::DB_FIELD_USER_TYPE => $this->getRandomUserType(),
            User::DB_FIELD_REMEMBER_TOKEN => Str::random(10),
            User::CREATED_AT => now(),
        ];
    }

    public function unverified(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }

    private function getRandomUserType(): string
    {
        $randLimitedNumber = random_int(1, 10);
        $isOddNumber = (($randLimitedNumber % 3) === 0);

        if ($isOddNumber) {
            return User::USER_TYPE_PATIENT;
        }

        return User::USER_TYPE_ADMIN;
    }
}
