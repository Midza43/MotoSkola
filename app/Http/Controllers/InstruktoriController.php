<?php

namespace App\Http\Controllers;
use DB;
use App\Models\Instruktori;
use App\Models\Kandidati;
use Illuminate\Http\Request;

class InstruktoriController extends Controller
{
    public function dodjelaKandidata(Request $request)
    {
        $instruktorId = $request->input('instruktor_id');
        $kandidatId = $request->input('kandidat_id');

        $instruktor = Instruktori::findOrFail($instruktorId);
        if ($instruktor->kandidati()->count() < 3) {            
            $kandidat = Kandidati::findOrFail($kandidatId);
            $kandidat->instruktor()->associate($instruktor);
            $kandidat->save();
            return redirect()->back()->with('success', 'Kandidat uspješno dodijeljen instruktoru.');
        } else {
            return redirect()->back()->with('error', 'Instruktor već ima maksimalan broj dodijeljenih kandidata.');
        }
    }

    public function index()
    {
        $instruktori = DB::table('instruktori')->get();
        $kandidati = DB::table('kandidati')->get();
        if (request()->wantsJson()) {
            return response()->json(['instruktori' => $instruktori]);
        }
        
        return view('instruktori.index', ['instruktori' => $instruktori, 'kandidati' => $kandidati]);
        
    }


    public function store(Request $request)
    {
        error_log($request);
        return Instruktori::create($request->all());
    }
}
