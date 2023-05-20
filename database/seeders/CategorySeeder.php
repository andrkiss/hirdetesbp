<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kategoriak = [
            'Műszaki'=>'laptop',
            'Háztartás'=>'kitchen-set',
            'Sport'=>'person-biking',
            'Szolgáltatás'=>'truck',
            'Jármű'=>'car',
            'Ingatlan'=>'house',
            'Ruházat'=>'shirt',
            'Állás'=>'building-user'
        ];

        foreach ($kategoriak as $nev => $ikon) {
            $kategoria = new Category(
                [
                    'nev' => $nev,
                    'ikon' => $ikon
                ]
            );
            $kategoria->save();
        }
    }
}
