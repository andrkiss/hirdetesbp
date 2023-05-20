<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Ad;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // csináljon 100 usert
        User::factory(100)->create()
        ->each(function($user)
            {
                // mindegyikhez legyen 1-8 ad
                Ad::factory(rand(1,8))->create(
                    [
                        'user_id' => $user->id
                    ])
                    ->each(function ($ad) use ($user) {
                        DB::table('kapcs')
                            ->insert(
                            [
                                'ad_id' => $ad->id,
                                'category_id' => rand(1,8),
                                'district_id' => rand(1,3),
                                'state_id' => rand(1,2),
                                'created_at' => now(),
                                'updated_at' => now()
                            ]);
                });
            });

        // csináljon 100 usert
        /* User::factory(100)->create()
        ->each(function ($user)
            {
                // mindegyikhez legyen 1-8 ad, $user a nev, kotve a user_idhoz
                Ad::factory(rand(1,8))->create(
                    [
                        'user_id' => $user->id
                    ])
                    ->each(function ($ad){
                        //  számok 1,2,3,4,5,6,7,8  keverje össze  maradjon 0 v 1 az elejéről
                        //   foreach egy-egy számmal  a szam és fentről az id megy a tablba
                        $szamok = range(1,8);
                        shuffle($szamok);
                        $maradazeleje = array_slice($szamok,0,1); //eg 5,2,8

                        foreach($maradazeleje as $ebbolegy){
                            DB::table('ad_category')
                                ->insert(
                                [
                                    'ad_id' => $ad->id,
                                    'category_id' => $ebbolegy,
                                    'created_at' => now(),
                                    'updated_at' => now()
                                ]);
                        }
                    });
            }); */
    }
}
