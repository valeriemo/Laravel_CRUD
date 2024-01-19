<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::orderBy('id', 'desc')->select()->paginate(10);
        $titres = Blog::titreSelect();
        $contenus = Blog::contenuSelect();
        foreach ($blogs as $blog) {
            $blog->titre = $titres->find($blog->id)->titre;
            $blog->contenu = $contenus->find($blog->id)->contenu;
        }
        return view('blog.index',  compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.create');
    }
}
