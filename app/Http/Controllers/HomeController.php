<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Ad;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $hirdetesek = Ad::where('user_id', auth()->id())->orderBy('ads.updated_at', "DESC")->paginate(8);;

        //dashboard view
        return view('dashboard')->with([
            'hirdetesek' => $hirdetesek,
            'success' => Session::get('success')
        ]);
    }
}
