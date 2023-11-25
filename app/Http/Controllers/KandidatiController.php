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

    public function create(){
        return view('kandidati.add');
    }

    public function dodaj_kandidate(Request $request){
        $request->validate([
            'imeprezime' => 'required|string|max:255',
            'datumRodjenja' => 'required|date',
            'kategorijaPolaganja' => 'required|string|max:255',
        ]);
    
        DB::table('kandidati')->insert([
            'imeprezime' => $request->imeprezime,
            'datumRodjenja' => $request->datumRodjenja,
            'kategorijaPolaganja' => $request->kategorijaPolaganja,
        ]);
    
        return redirect()->route('kandidati')->with('success', 'Kandidat uspešno dodat!');
    }
    

}
