<?php

namespace App\Http\Controllers\Admin;

use App\Model\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ViewController extends Controller
{
    
    public function index()
    {
        return view('admin.statistics.index');
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        /* 

        Ipotesi memorizzazione visualizzazione:
        https://laravel.com/docs/7.x/http-client#introduction
        
        1. Controllo IP dell'utente;
        2. Controllo status risposta: $response->status() : int;
        3. Se le 2 condizioni precedenti sono valide avviare procedura store.
        
        */
    }

    
    public function show(View $view)
    {
        //
    }

    
    public function edit(View $view)
    {
        //
    }

    
    public function update(Request $request, View $view)
    {
        //
    }

    
    public function destroy(View $view)
    {
        //
    }
}
