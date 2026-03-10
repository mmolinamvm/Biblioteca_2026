<?php

namespace App\Http\Controllers;
use App\Models\Llibre;
use Illuminate\Http\Request;

class LlibreController extends Controller
{
    public function index()
    {
        // Equivalent a: SELECT * FROM llibres
        $totsElsLlibres = Llibre::all();

        // Enviem les dades a la vista (com el ModelAndView)
        return view('llibres.index', ['llibres' => $totsElsLlibres]);
    }

    public function create()
    {
        return view('llibres.create');
    }

    public function store(\Illuminate\Http\Request $request)
    {
        // 1. Creem un objecte nou del nostre Model (com una fila buida a la taula)
        $nouLlibre = new \App\Models\Llibre();

        // 2. Omplim cada camp amb el que l'usuari ha escrit al formulari.
        // Fem servir $request->input('NOM_DEL_CAMP_HTML')
        $nouLlibre->titol = $request->input('titol');
        $nouLlibre->isbn = $request->input('isbn');
        $nouLlibre->pagines = $request->input('pagines');
        $nouLlibre->preu = $request->input('preu');

        // 3. El mètode save() l'envia definitivament a la base de dades MySQL
        $nouLlibre->save();

        // 4. Finalment, tornem al llistat de llibres per veure que s'ha afegit correctament
        return redirect('/llibres');
    }
}
