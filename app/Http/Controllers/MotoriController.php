<?php

namespace App\Http\Controllers;

use App\Models\Motori;
use App\Models\Kandidati;
use Illuminate\Http\Request;

class MotoriController extends Controller
{
    public function index()
    {
        $motori = Motori::with('kandidati')->get();

        $kategorije = ['AM', 'A1', 'A2', 'A'];

        $rezultati = [];
        foreach ($kategorije as $kategorija) {
            $rezultati[$kategorija] = Kandidati::where('kategorijaPolaganja', $kategorija)->get();
        }

        return view('motori.index', compact('motori', 'rezultati', 'kategorije'));
    }
}





    

