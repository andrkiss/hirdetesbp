<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\District;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $keruletek = [
            'I' => 'Vár',
            'II' => 'Rózsadomb',
            'III' => 'Óbuda',
            'IV' => 'Újpest',
            'V' => 'Belváros',
            'VI' => 'Terézváros',
            'VII' => 'Erzsébetváros',
            'VIII' => 'Józsefváros',
            'IX' => 'Ferencváros',
            'X' => 'Kőbánya',
            'XI' => 'Kelenföld',
            'XII' => 'Hegyvidék',
            'XIII' => 'Angyalföld',
            'XIV' => 'Zugló',
            'XV' => 'Újpalota',
            'XVI' => 'Mátyásföld',
            'XVII' => 'Rákosmente',
            'XVIII' => 'Pestszentimre',
            'XIX' => 'Kispest',
            'XX' => 'Pesterzsébet',
            'XXI' => 'Csepel',
            'XXII' => 'Budafok-Tétény',
            'XXIII' => 'Soroksár'
        ];

        foreach($keruletek as $szam => $nev) {
            $kerulet = new District(
                [
                    'szam' => $szam,
                    'nev' => $nev
                ]
            );
            $kerulet->save();
        }
    }
}
