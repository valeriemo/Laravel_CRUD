<?php

namespace App\Http\Middleware;

use App; // ne pas oublier de demander App 
use Closure;
use Illuminate\Http\Request;

// Le middleware est un pont entre la requete http (route) et notre projet
class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (session()->has('locale') && session()->get('locale') != 'en') {
            App::setLocale(session()->get('locale'));
            session()->put('localeDB', '_'.session()->get('locale'));
        }else{
            session()->put('localeDB'); // si c'est lang EN par défaut rien ne change (pas besoin d'ajouter _)
        }
        return $next($request);
    }
}
