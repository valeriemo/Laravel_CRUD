<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Etudiant;
use App\Models\Ville;

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
            'name' => 'min:2 | max:45',
            'email' => 'email|required|unique:users',
            'password' => 'min:6|max:20',
            //  'password' => ['min:6', 'max:20'],
        ]);
        // redirect()->back()->withErrors()->withInput()
        // v 10 publier le dossier lang / php artisan lang:publish

        // User::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => $request->password,
        // ]);

        $user = new User;
        $user->fill($request->all());
        $user->password = Hash::make($request->password);
        $user->save();

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
    public function userList(){
        $users = User::select()->orderBy('name')->paginate(4);
        return view('auth.user-list', compact('users'));
    }
}
