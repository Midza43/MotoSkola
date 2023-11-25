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

    public function dodaj_kandidate(Request $zahtjev){
        $zahtjev->validate([
            'imeprezime' => 'required|string|max:255',
            'datumRodjenja' => 'required|date',
            'kategorijaPolaganja' => 'required|string|max:255',
        ]);
    
        DB::table('kandidati')->insert([
            'imeprezime' => $zahtjev->imeprezime,
            'datumRodjenja' => $zahtjev->datumRodjenja,
            'kategorijaPolaganja' => $zahtjev->kategorijaPolaganja,
        ]);
    
        return redirect()->route('kandidati')->with('success', 'Kandidat uspješno dodan!');
    }

    
    public function izmjeni($id) {
        $kandidat = Kandidati::find($id);
    
        return view('kandidati.edit', ['kandidat' => $kandidat]);
    }

    public function azuriraj(Request $request, $id) {
        $request->validate([
            'imeprezime' => 'required|string|max:255',
            'datumRodjenja' => 'required|date',
            'kategorijaPolaganja' => 'required|string|max:255',
        ]);

        $kandidat = Kandidati::find($id);
        $kandidat->update($request->all());

        return redirect()->route('kandidati')->with('success', 'Podaci o kandidatu uspješno ažurirani!');
    }

    public function izbrisi(Request $zahtjev, $id) {
        $id=$zahtjev->id;

        Kandidati::destroy($id);

        return redirect()->route('kandidati')->with('error', 'Kandidat uspješno izbrisan!');
        
    }
}
