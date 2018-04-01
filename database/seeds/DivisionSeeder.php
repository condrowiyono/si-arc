<?php

use Illuminate\Database\Seeder;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $division = [
            [
                'division' => 'Internal',
                'desc' => '- Mengumpulkan data anggota\n- Mengadakan acara untuk meningkatkan kekeluargaan anggota seperti program main bareng',
            ],
            [
                'division' => 'Eksternal',
                'desc' => '- Berperan sebagai gateway antara ARC dengan lembaga eksternal baik internal kampus maupun eksternal kampus\n - Program kerja berupa acara periodik yang melibatkan pihak luar seperti lomba atau workshop.',
            ],
            [
                'division' => 'Infrastruktur',
                'desc' => '    - Inventarisasi kesekretariatan ARC \n - Memastikan kesekretariatan tetap rapi \n - Merombak dan merapikan jaringan internal ARC \n',
            ],
            [
                'division' => 'Pengembangan Keilmuan',
                'desc' => '- Mengembangkan technical skill dari anggota \n - Menentukan kurikulum \n - Program kerja berupa kru-to-kru training',
            ],
        ];
        foreach ($division as $key => $value) {
            \App\Division::create($value);
        }
    }
}
    