<?php

namespace App\Http\Middleware;

use App; 
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
        // Vérifie si une variable de session 'locale' existe et si elle n'est pas égale à 'en'
        if (session()->has('locale') && session()->get('locale') != 'fr') {
            // Si c'est le cas, défini la locale de l'application à la valeur de 'locale' en session
            App::setLocale(session()->get('locale'));
            // Ajoute à la session une clé 'localeDB' avec la valeur '_'+valeur de 'locale' en session
            session()->put('localeDB', '_'.session()->get('locale'));
        }else{
            session()->put('localeDB'); // si c'est lang FR par défaut rien ne change (pas besoin d'ajouter _)

        }
        return $next($request);
    }
}
