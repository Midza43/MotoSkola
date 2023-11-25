<?php

namespace App\Http\Controllers;
use DB;
use App\Models\Kandidati;
use Illuminate\Http\Request;


class KandidatiController extends Controller
{
    public function index()
    {
        $kandidati = DB::table('kandidati')->get();
        return view('kandidati.index', ['kandidati'=>$kandidati]);
    }
}
