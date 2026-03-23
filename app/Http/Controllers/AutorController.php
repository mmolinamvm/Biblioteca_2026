<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use Illuminate\Http\Request;

class AutorController extends Controller
{
    public function index()
    {
        // Equivalent a: SELECT * FROM llibres
        $totsElsAutors = Autor::all();

        // Enviem les dades a la vista (com el ModelAndView)
        return view('autors.index', ['autors' => $totsElsAutors]);
    }


    public function create()
    {
        return view('autors.create');
    }

    public function store(\Illuminate\Http\Request $request)
    {
        // 1. Creem un objecte nou del nostre Model (com una fila buida a la taula)
        $nouAutor = new \App\Models\Autor();

        // 2. Omplim cada camp amb el que l'usuari ha escrit al formulari.
        // Fem servir $request->input('NOM_DEL_CAMP_HTML')
        $nouAutor->name = $request->input('name');
        $nouAutor->nacionality = $request->input('nacionality');
        $nouAutor->birth_date = $request->input('birth_date');
        $nouAutor->death_date = $request->input('death_date');

        // 3. El mètode save() l'envia definitivament a la base de dades MySQL
        $nouAutor->save();

        // 4. Finalment, tornem al llistat de llibres per veure que s'ha afegit correctament
        return redirect('/autors');
    }
}
