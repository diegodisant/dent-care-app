<?php
declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ClinicalHistorySection;
use Illuminate\Support\Facades\DB;

class ClinicalHistorySectionSeeder extends Seeder
{
    public function run(): void
    {
        $clinicalHistoryTable = DB::table(ClinicalHistorySection::TABLE_NAME);

        $clinicalHistoryTable->insert([
            $this->buildSection('Antecedentes Patológicos Hereditarios'),
            $this->buildSection('Antecedentes Personales Patológicos'),
            $this->buildSection('Historia Clínica Odontológica'),
            $this->buildSection('¿Qué tipo de lesiones presenta?'),
            $this->buildSection('Antecedentes Personales No Patológicos'),
        ]);
    }

    private function buildSection(string $title): array
    {
        return [
            ClinicalHistorySection::DB_FIELD_TITLE => $title,
        ];
    }
}
