<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage; // Librairie pour le stockage des fichiers

class FileController extends Controller
{

    public function index()
    {
        $files = File::orderBy('id', 'desc')->select()->paginate(10);
        return view('files.index',  compact('files'));
    }

    public function create()
    {
        return view('files.add-file');
    }

    public function store(Request $request)
    {
        var_dump($request->all());
        die();
        $request->validate([
            'titre' => 'required|min:2|max:60',
            'titre_en' => 'required|min:2|max:60',
            'file' => 'required|mimes:pdf,zip,doc|max:2048', // Ajoutez une validation pour le fichier
        ]);
        $file = new File();
        $file->titre = $request->titre;
        $file->titre_en = $request->titre_en;
    
        // Enregistrez le fichier dans le système de stockage (par exemple, le dossier storage/app/public)
        $filePath = $request->file('file')->store('public/files');
    
        // Obtenez le chemin du fichier stocké
        $file->path = Storage::url($filePath);
    
        $file->save();
        
        return redirect()->route('file.index')->with('success', 'File created successfully.');
    }
}