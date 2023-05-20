<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ad;

class pluszOldalController extends Controller
{
    public function index()
    {
        $proba = Ad::where('user_id', auth()->id())->orderBy('ads.updated_at', "DESC")->paginate(8);;

        //dashboard view
        return view('pluszoldal')->with([
            'proba' => $proba
            // 'success' => Session::get('success')
        ]);
    }
}
