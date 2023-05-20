<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\State;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $allapotok = [
            'Keres',
            'Kínál'
        ];

        foreach ($allapotok as $nev) {
            $allapot = new State(
                [
                    'nev' => $nev
                ]
            );
            $allapot->save();
        }
    }
}
