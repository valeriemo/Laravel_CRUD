<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Etudiant;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CustomAuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.login');
    }

    /**
     * On va créer un nouvel Étudiant qui sera aussi un utilisateur
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $villes = DB::table('villes')->get();
        return view('auth.create', compact('villes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|min:2|max:45',
            'adresse' => 'required|min:3|max:150',
            'telephone' => 'required|min:7|max:25',
            'date_naissance' => 'required|date|before:today|max:20|date_format:Y-m-d',
            'ville_id' => 'required|integer|exists:villes,id',
            'username' => 'required|min:6|max:45',
            'email' => 'email|required|unique:users',
            'password' => 'min:6|max:20|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/|required_with:password_confirmation|confirmed',
        ]);
    
        // Création du User
        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        // Récupérez l'ID du dernier utilisateur créé
        $lastUserId = $user->id;

        // Création de l'étudiant
        $etudiant = Etudiant::create([
            'nom' => $request->nom,
            'adresse' => $request->adresse,
            'telephone' => $request->telephone,
            'date_naissance' => $request->date_naissance,
            'ville_id' => $request->ville_id,
            'user_id' => $lastUserId,
        ]);
        $etudiant->save();

        return redirect(route('login'))->withSuccess('Utilisateur enregistré!');
    }

    /**
     * Login
     */
    public function authentication(Request $request)
    {
        $request->validate([
            'email' => 'email|required|exists:users',
            'password' => 'min:6|max:20',
        ]);

        $credentials = $request->only('email', 'password');

        if (!Auth::validate($credentials)) :
            return redirect(route('login'))->withErrors(trans('auth.password'))->withInput();
        endif;

        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        Auth::login($user);
        return redirect()->intended(route('blog.index'));
    }

    /**
     * logout
     */
    public function logout()
    {
        Auth::logout();
        return redirect(route('login'));
    }

    /**
     * Page qui affiche la liste des users et de leurs blogs
     */
    public function userList()
    {
        $users = User::select()->orderBy('name')->paginate(4);
        return view('auth.user-list', compact('users'));
    }
}
