<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $criteria = [
            [
                'criteria_name' => 'Menguasai karakteristik peserta didik',
                'criteria_type' => 'Benefit',
                'weight' => 5,
            ],
            [
                'criteria_name' => 'Menguasai teori belajar dan prinsip-prinsip pembelajaran yang mendidik',
                'criteria_type' => 'Benefit',
                'weight' => 10,
            ],
            [
                'criteria_name' => 'Pengembangan kurikulum',
                'criteria_type' => 'Benefit',
                'weight' => 10,
            ],
            [
                'criteria_name' => 'Kegiatan pembelajaran yang mendidik',
                'criteria_type' => 'Benefit',
                'weight' => 5,
            ],
            [
                'criteria_name' => 'Pengembangan potensi peserta didik',
                'criteria_type' => 'Benefit',
                'weight' => 5,
            ],
            [
                'criteria_name' => 'Komunikasi dengan peserta didik',
                'criteria_type' => 'Benefit',
                'weight' => 5,
            ],
            [
                'criteria_name' => 'Penilaian dan evaluasi',
                'criteria_type' => 'Benefit',
                'weight' => 10,
            ],
            [
                'criteria_name' => 'Bertindak sesuai norma agama, hukum, sosial, dan kebudayaan nasional',
                'criteria_type' => 'Cost',
                'weight' => 5,
            ],
            [
                'criteria_name' => 'Menunjukkan pribadi yang dewasa dan teladan',
                'criteria_type' => 'Cost',
                'weight' => 5,
            ],
            [
                'criteria_name' => 'Etos kerja, tanggung jawab tinggi, rasa bangga menjadi guru',
                'criteria_type' => 'Benefit',
                'weight' => 10,
            ],
            [
                'criteria_name' => 'Bersikap inklusif, bertindak obyektif, serta tidak diskriminatif',
                'criteria_type' => 'Cost',
                'weight' => 10,
            ],
            [
                'criteria_name' => 'Komunikasi dengan guru, tenaga kependidikan, orang tua, siswa, dan masyarakat',
                'criteria_type' => 'Cost',
                'weight' => 5,
            ],
            [
                'criteria_name' => 'Penguasaan materi, struktur, konsep, dan pola pikir keilmuan yang mendukung mata pelajaran yang diampu',
                'criteria_type' => 'Benefit',
                'weight' => 10,
            ],
            [
                'criteria_name' => 'Mengembangkan keprofesionalan melalui tindakan yang reflektif',
                'criteria_type' => 'Cost',
                'weight' => 5,
            ],
        ];

        $altNameCounter = 1;

        foreach ($criteria as $key => $criterion) {
            $criterion['criteria_code'] = 'C' . ($altNameCounter++);

            DB::table('criterias')->insert($criterion);
        }

        $data = [
            ['alternatif_name' => 'Annas Lumbantobing', 'alternatif_code' => 'A1'],
            ['alternatif_name' => 'Drijen', 'alternatif_code' => 'A2'],
            ['alternatif_name' => 'Emi Amalia', 'alternatif_code' => 'A3'],
            ['alternatif_name' => 'Endi', 'alternatif_code' => 'A4'],
            ['alternatif_name' => 'Sulton Nuddin Faqih', 'alternatif_code' => 'A5'],
            ['alternatif_name' => 'Ismali Ali', 'alternatif_code' => 'A6'],
            ['alternatif_name' => 'Hamdani H.M', 'alternatif_code' => 'A7'],
            ['alternatif_name' => 'Hariyanto', 'alternatif_code' => 'A8'],
            ['alternatif_name' => 'Herlis Libanon', 'alternatif_code' => 'A9'],
            ['alternatif_name' => 'Ika Dewayani', 'alternatif_code' => 'A10'],
            ['alternatif_name' => 'Indah Agoestina Iriantin', 'alternatif_code' => 'A11'],
            ['alternatif_name' => 'Lasma Sitanggang', 'alternatif_code' => 'A12'],
            ['alternatif_name' => 'Muhamad Zain', 'alternatif_code' => 'A13'],
            ['alternatif_name' => 'Mangatas Haposan', 'alternatif_code' => 'A14'],
            ['alternatif_name' => 'Meriana Sinaga', 'alternatif_code' => 'A15'],
            ['alternatif_name' => 'Misyani', 'alternatif_code' => 'A16'],
            ['alternatif_name' => 'Ibnu Athoillah', 'alternatif_code' => 'A17'],
            ['alternatif_name' => 'Mugi Santoso', 'alternatif_code' => 'A18'],
            ['alternatif_name' => 'Nunung Nurjana', 'alternatif_code' => 'A19'],
            ['alternatif_name' => 'Nurmala Meirta Situmorang', 'alternatif_code' => 'A20'],
            ['alternatif_name' => 'Pramono', 'alternatif_code' => 'A21'],
            ['alternatif_name' => 'Refniati', 'alternatif_code' => 'A22'],
            ['alternatif_name' => 'Rita Yulmiat', 'alternatif_code' => 'A23'],
            ['alternatif_name' => 'Setyorini Nurul Safitri', 'alternatif_code' => 'A24'],
            ['alternatif_name' => 'Sigit Wicaksono Budi', 'alternatif_code' => 'A25'],
            ['alternatif_name' => 'Sugeng Rusmantono', 'alternatif_code' => 'A26'],
            ['alternatif_name' => 'Titik Rahmawati', 'alternatif_code' => 'A27'],
            ['alternatif_name' => 'Umi Harti', 'alternatif_code' => 'A28'],
            ['alternatif_name' => 'Wiwik Setyarin', 'alternatif_code' => 'A29'],
            ['alternatif_name' => 'Wiwit Hariyanti', 'alternatif_code' => 'A30'],
            ['alternatif_name' => 'Yenni Zirta', 'alternatif_code' => 'A31'],
        ];

        DB::table('alternatifs')->insert($data);
    }
}
