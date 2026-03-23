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
        $autors = \App\Models\Autor::all();
        return view('llibres.create', compact('autors'));
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
        // GESTIÓ DE LA IMATGE
        if ($request->hasFile('imatge')) {
            // Guardem la imatge a la carpeta 'public/portades'
            $fitxer = $request->file('imatge');
            $nomImatge = time() . '_' . $fitxer->getClientOriginalName();
            $fitxer->move(public_path('portades'), $nomImatge);

            // Guardem el nom del fitxer a la base de dades
            $nouLlibre->imatge = $nomImatge;
        }
        // 3. El mètode save() l'envia definitivament a la base de dades MySQL
        $nouLlibre->save();
        // Si l'usuari ha seleccionat autors al formulari:
        if ($request->has('autors')) {
            // attach() agafa l'array d'IDs d'autors i els posa a la taula pivot
            $nouLlibre->autors()->attach($request->input('autors'));
        }
        // 4. Finalment, tornem al llistat de llibres per veure que s'ha afegit correctament
        return redirect('/llibres');
    }
    public function show($id)
    {
        // Busquem el llibre pel seu ID. Si no existeix, donarà un error 404.
        $llibre = \App\Models\Llibre::findOrFail($id);
        return view('llibres.show', compact('llibre'));
    }

    public function delete($id)
    {
        // Busquem el llibre pel seu ID. Si no existeix, donarà un error 404.
        $llibre = \App\Models\Llibre::findOrFail($id);
        $llibre->delete();
        return redirect('/llibres');
    }

    public function edit($id)
    {
        // Busquem el llibre pel seu ID. Si no existeix, donarà un error 404.
        $llibre = \App\Models\Llibre::findOrFail($id);
        $autors = \App\Models\Autor::all();
        return view('llibres.edit', compact('llibre'), compact('autors'));
    }


    public function update(\Illuminate\Http\Request $request,$id)
    {
        // 1. Creem un objecte nou del nostre Model (com una fila buida a la taula)
        $llibre = \App\Models\Llibre::findOrFail($id);

        // 2. Omplim cada camp amb el que l'usuari ha escrit al formulari.
        // Fem servir $request->input('NOM_DEL_CAMP_HTML')
        $llibre->titol = $request->input('titol');
        $llibre->isbn = $request->input('isbn');
        $llibre->pagines = $request->input('pagines');
        $llibre->preu = $request->input('preu');
        // GESTIÓ DE LA IMATGE
        if ($request->hasFile('imatge')) {
            // Guardem la imatge a la carpeta 'public/portades'
            $fitxer = $request->file('imatge');
            $nomImatge = time() . '_' . $fitxer->getClientOriginalName();
            $fitxer->move(public_path('portades'), $nomImatge);

            // Guardem el nom del fitxer a la base de dades
            $llibre->imatge = $nomImatge;
        }
        // 3. El mètode save() l'envia definitivament a la base de dades MySQL
        $llibre->save();
        if ($request->has('autors')) {
            $llibre->autors()->sync($request->input('autors'));
        } else {
            $llibre->autors()->detach();
        }
        // 4. Finalment, tornem al llistat de llibres per veure que s'ha afegit correctament
        return redirect('/llibres');
    }
}
