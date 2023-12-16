<?php

namespace App\Http\Controllers;
use DB;
use App\Models\Instruktori;
use App\Models\Kandidati;
use Illuminate\Http\Request;



class StatistikaController extends Controller
{
    public function index()
    {
        
        
        $najmladjiKandidat = DB::table('kandidati')
        ->select('*')
        ->orderBy(DB::raw("STR_TO_DATE(datumRodjenja, '%Y-%m-%d')"), 'desc')
        ->limit(1)
        ->get();

        $najstarijiKandidat = DB::table('kandidati')
        ->select('*')
        ->orderBy(DB::raw("STR_TO_DATE(datumRodjenja, '%Y-%m-%d')"), 'asc')
        ->limit(1)
        ->get();

        $najcescaKategorija = DB::table('kandidati')
        ->select('kategorijaPolaganja', DB::raw('COUNT(kategorijaPolaganja) AS brojPolaganja'))
        ->groupBy('kategorijaPolaganja')
        ->orderBy('brojPolaganja', 'desc')
        ->limit(1)
        ->get();

        $minKategorija = DB::table('kandidati')
        ->select('kategorijaPolaganja', DB::raw('COUNT(kategorijaPolaganja) AS brojPolaganja'))
        ->groupBy('kategorijaPolaganja')
        ->orderBy('brojPolaganja', 'asc')
        ->limit(1)
        ->get();

        $kategorijaPolaganja = $najcescaKategorija->first()->kategorijaPolaganja;
        $najcescemotori = DB::table('motori')
        ->select('proizvodjac', 'model')
        ->where('kategorijaPolaganja', $kategorijaPolaganja)
        ->first();

        $kategorijaPolaganjaMin = $minKategorija->first()->kategorijaPolaganja;
        $minmotori = DB::table('motori')
        ->select('proizvodjac', 'model')
        ->where('kategorijaPolaganja', $kategorijaPolaganjaMin)
        ->first();

        
        return view('statistika.index', ['najmladjiKandidat' => $najmladjiKandidat->first(),'najstarijiKandidat' => $najstarijiKandidat->first(),'najcescaKategorija' => $najcescaKategorija->first(), 'minKategorija' => $minKategorija->first(),
        'proizvodjac' => $najcescemotori->proizvodjac, 'model' => $najcescemotori->model,'proizvodjac_min' => $minmotori -> proizvodjac, 'model_min' => $minmotori -> model]);
        
    }
}
