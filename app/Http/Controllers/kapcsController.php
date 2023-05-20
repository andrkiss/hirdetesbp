<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\District;
use App\Models\State;
use App\Models\Ad;

class kapcsController extends Controller
{
    public function hirdKategoria($kat_id) {     // kat id a routebol

        // kategoria be
        $Kat = new Category();

        // keresés a hirdek között kategóriaszámmal, fail ha nincs
        $adek = Ad::whereHas('categories', function($q) use ($kat_id, $Kat){
            $Kat->findOrFail($kat_id);
            $q->where('categories.id', '=', $kat_id);
        })->paginate(8);

        // kategoriaszam
        $kateg = $Kat->find($kat_id);


        return view('ad.index')->with( [
            'adek' => $adek,
            'kateg' => $kateg
        ]);
    }

    public function bifent(Request $request) {

        $adek = Ad::beirtsz()->paginate(8)->withQueryString();

        // $adek = Ad::query()->whereRaw('cim REGEXP ?', $beirt);

        $beirt = request()->input('beirt');

        return view('ad.index')->with([
            'adek' => $adek,
            'beirt' => $beirt
        ]);
    }

    public function kereso(Request $request) {

        // beirt tablbol kikeres fenti reszhez
        $Kat = new Category();
        $kat = request()->input('kategoria');
        $kateg = $Kat->find($kat);

        $Ker = new District();
        $ker = request()->input('kerulet');
        $kerul = $Ker->find($ker);

        $All = new State();
        $all = request()->input('allapot');
        $allap = $All->find($all);

        $beirt = request()->input('beirt');

        $legfriss = 'legfriss';

        $title = 'Keresés eredményei';


        // $bejovok = $request->except('token');     ezt is használhatja a szuro

        $adek = Ad::beirtsz()->kategsz()->kerulsz()->allapsz()->orderBy('ads.created_at', 'DESC')->paginate(8)->withQueryString();
        // ide a
        return view('ad.index')->with([
            'adek' => $adek,
            'kateg' => $kateg,
            'kerul' => $kerul,
            'allap' => $allap,
            'beirt' => $beirt,
            'legfriss' => $legfriss,
            'title' => $title
        ]);
    }
}
