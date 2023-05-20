<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Category;
use App\Models\District;
use App\Models\State;
use App\Http\Requests\StoreAdRequest;
use App\Http\Requests\UpdateAdRequest;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Gate;

class AdController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $adek = Ad::orderBy('ads.created_at', 'DESC')->paginate(8);

        $legfriss = 'ujhird';

        return view('ad.index')->with([
            'adek' => $adek,
            'legfriss' =>$legfriss
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $Kerul = District::get();
        $Kateg = Category::get();
        $Allap = State::get();

        return view('ad.create')->with([
            'Kerul' => $Kerul,
            'Kateg' => $Kateg,
            'Allap' => $Allap
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAdRequest $request)
    {
        $request->validate([
            'cim'=> 'required|min:3',
            'szoveg'=> 'required|min:5'
        ]);

        $ad = new Ad([
            'user_id' => auth()->id(),
            'cim' => $request['cim'],
            'szoveg' => $request['szoveg'],
            'ar' => $request['ar']
        ]);
        $ad->save();

        DB::table('kapcs')->insert([
            'ad_id' => $ad['id'],
            'category_id' => $request['kategoria'],
            'district_id' => $request['kerulet'],
            'state_id' => $request['allapot']
        ]);

        if($request->kep) {
            $this->kepFeltoltes($request->kep, $ad->id);
        }

        return redirect()->route('dashboard')->with([

            'success' => 'A hirdetésedet sikeresen mentetted.'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Ad $ad)
    {
        return view('ad.show')->with([
            'ad' => $ad,
            'success' => Session::get('success'),
            'warning' => Session::get('warning')
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ad $ad)
    {
        abort_unless(Gate::allows('update', $ad), 403);

        $Kerul = District::get();
        $Kateg = Category::get();
        $Allap = State::get();

        return view('ad.edit')->with([
            'ad'=> $ad,
            'Kerul' => $Kerul,
            'Kateg' => $Kateg,
            'Allap' => $Allap,
            'success' => Session::get('success'),
            'warning' => Session::get('warning')
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAdRequest $request, Ad $ad)
    {
        abort_unless(Gate::allows('update', $ad), 403);

        $request->validate([
            'cim'=> 'required|min:3',
            'szoveg'=> 'required|min:5'
        ]);

        $ad->update([
            'cim' => $request['cim'],
            'szoveg' => $request['szoveg'],
            'kerulet' => $request['kerulet'],
            'kategoria' => $request['kategoria']
        ]);

        if ($request->kep) {
            $this->kepFeltoltes($request->kep, $ad->id);
        }


        return redirect()->route('dashboard')->with([
            'success' => 'A hirdetésedet módosítottad.'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ad $ad)
    {
        //torol
        $ad->delete();

        //vissza
        return redirect()->route('dashboard')->with([
            'success' => 'A hirdetésedet törölted.'
          ]);
    }

    public function kepFeltoltes($bejovokep, $hird_id) {

        $kep = Image::make($bejovokep);

        if ( $kep->width() > $kep->height() ) {
                // nagy  kockazott  dontott
            $kep->widen(1200)
                ->save(public_path() . '/img/ad/' . $hird_id . '_large.jpg')
                ->widen(400)->pixelate(12)
                ->save(public_path() . '/img/ad/' . $hird_id . '_pixelated.jpg');
                // kiskep
            $kep = Image::make($bejovokep);
                $kep->widen(100)
                    ->save(public_path() . '/img/ad/' . $hird_id . '_thumb.jpg');
        } else {
                // allo
            $kep->heighten(900)
                ->save( public_path() . '/img/ad/' . $hird_id .  '_large.jpg')
                ->heighten(400)->pixelate(12)
                ->save(public_path() . '/img/ad/' . $hird_id . '_pixelated.jpg');

            $kep = Image::make($bejovokep);
                $kep->heighten(100)
                    ->save(public_path() . '/img/ad/' . $hird_id . '_thumb.jpg');
        }
    }
}
