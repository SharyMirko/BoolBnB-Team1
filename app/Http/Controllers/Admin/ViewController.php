<?php

namespace App\Http\Controllers\Admin;

use App\Model\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;



class ViewController extends Controller
{
    
    public function index()
    {
      /*   $groups = View::where('apartment_id', $_GET['apart_id'])
                ->orderBy('created_at')
                  ->get();
         foreach ($groups as $key => $data) {
            $data['giorno'] = date('Y-m-d',strtotime($data['created_at']));
         }; */
         


         $year = [
            '2021',
            '2022'
         ];
         

         $views = [];
 
         foreach ($year as $key => $value) {
 
             $views[] = View::where('apartment_id', $_GET['apart_id'])->where(\DB::raw('DATE_FORMAT(created_at, "%Y")'),$value)->count();
 
         }

       
         
// Generate random colours for the groups

        return view('admin.statistics.index')->with('year',json_encode($year,JSON_NUMERIC_CHECK))->with('views',json_encode($views,JSON_NUMERIC_CHECK));
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
