<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $etudiants = Etudiant::orderBy('id','desc')->select()->paginate(10);
        return view('reseau.index',  compact('etudiants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //je récupère toutes les villes
        $villes = DB::table('villes')->get();
        return view('reseau.create', compact('villes'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([ //validation des champs
            'nom' => 'required|min:2|max:45',
            'adresse' => 'required|min:3|max:150',
            'telephone' => 'required|min:7|max:25',
            'email' => 'required|email|unique:etudiants|max:60',
            'date_naissance' => 'required|date|before:today|max:20|date_format:Y-m-d',
            'ville_id' => 'required|integer',
        ]);
        $etudiant = new Etudiant;
        $etudiant->fill($request->all());
        $etudiant->save();
        return redirect(route('etudiant.index'))->withSuccess('Nouvel étudiant créer !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function show(Etudiant $etudiant)
    {
        $etudiant = Etudiant::find($etudiant->id);
        return view('reseau.show', compact('etudiant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function edit(Etudiant $etudiant)
    {
        $villes = DB::table('villes')->get();
        $etudiant = Etudiant::find($etudiant->id);
        return view('reseau.edit', compact('etudiant', 'villes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Etudiant $etudiant)
    {
        $request->validate([ //validation des champs
            'nom' => 'required|min:2|max:45',
            'adresse' => 'required|min:3|max:150',
            'telephone' => 'required|min:7|max:25',
            'email' => 'required|email|max:60',
            'date_naissance' => 'required|date|before:today|max:20|date_format:Y-m-d',
            'ville_id' => 'required|integer',
        ]);
        $etudiant->update([
            'nom' => $request->nom,
            'adresse' => $request->adresse,
            'telephone' => $request->telephone,
            'email' => $request->email,
            'date_naissance' => $request->date_naissance,
            'ville_id' => $request->ville_id,
        ]);
        return redirect()->route('etudiant.index')->withSuccess('Étudiant modifié !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Etudiant $etudiant)
    {
        
        $etudiant->delete();
        return redirect()->route('etudiant.index')->withSuccess('Étudiant supprimé !');
    }
}
