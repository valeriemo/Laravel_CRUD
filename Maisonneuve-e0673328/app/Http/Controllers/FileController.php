<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage; // Librairie pour le stockage des fichiers

class FileController extends Controller
{
    // Méthode pour afficher la page de tous les fichiers
    public function index()
    {
        // on va aller chercher les titres en français et en anglais
        $titres = File::nomSelect();
        $files = File::orderBy('id', 'desc')->select()->paginate(10);
        foreach ($files as $file) {
            $file->nom = $titres->find($file->id)->nom;
        }
        return view('files.index',  compact('files'));
    }

    // Méthode pour afficher la page de création d'un nouveau fichier
    public function create()
    {
        return view('files.add-file');
    }

    // Méthode pour store le nouveau fichier
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|min:2|max:60',
            'nom_en' => 'required|min:2|max:60',
            'file' => 'required|mimes:pdf,zip,doc|max:2048', // Ajoutez une validation pour le fichier
        ]);
        $file = new File();
        $file->nom = $request->nom;
        $file->nom_en = $request->nom_en;
        // Enregistrez le fichier dans le système de stockage (par exemple, le dossier storage/app/public)
        $filePath = $request->file('file')->store('public/files');
         // Récupérez l'identifiant de l'utilisateur à partir de la session
        $user_id = auth()->id();
        // Obtenez le chemin du fichier stocké
        $file->path = Storage::url($filePath);
        $file->user_id = $user_id;
        $file->save();

        return redirect()->route('file.index')->with('success', 'File created successfully.');
    }

    // Méthode pour afficher la page de modification
    public function edit(File $file)
    {
        return view('files.edit-file', compact('file'));
    }

    // Méthode pour store le update
    public function update(Request $request){
        $request->validate([
            'nom' => 'required|min:2|max:60',
            'nom_en' => 'required|min:2|max:60',
        ]);
        $file = File::find($request->id);
        $file->nom = $request->nom;
        $file->nom_en = $request->nom_en;
        $file->save();
        return redirect()->route('file.index')->with('success', 'File updated successfully.');
    }

    // Méthode pour supprimer un fichier
    public function destroy(File $file)
    {
        // Supprimez le fichier du système de stockage
        Storage::delete($file->path);
        // Supprimez le fichier de la base de données
        $file->delete();
        return redirect()->route('file.index')->with('success', 'File deleted successfully.');
    }
}