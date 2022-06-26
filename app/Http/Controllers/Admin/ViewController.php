<?php

namespace App\Http\Controllers\Admin;

use App\Model\View;
use App\Model\Apartment;
use App\Model\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;



class ViewController extends Controller
{

   public function index()
   {
      $idcorretto = $_GET['apart_id'];

      $userApart = Apartment::where('id', $idcorretto)->get();
      
      $days = [];
      
      $currentDate = date('d-m-Y');
      
      for ($i=0; $i < 8; $i++) {
         $d = strtotime($currentDate);
         $d -= 3600*24*$i;
         
         array_unshift($days, date('d-m-Y', $d));
      };
      
      $views = [];
      $msgs = [];
      
      foreach ($days as $key => $value) {
         $views[] = View::where('apartment_id', $idcorretto)->where(DB::raw('DATE_FORMAT(created_at, "%Y-%m-%d")'), date('Y-m-d', strtotime($value)))->count();
         $msgs[] = Message::where('apartment_id', $idcorretto)->where(DB::raw('DATE_FORMAT(created_at, "%Y-%m-%d")'), date('Y-m-d', strtotime($value)))->count();
      }

      // dd(json_encode($userApart));

      return view('admin.statistics.index', compact('userApart'))
            ->with('days', json_encode($days))
            ->with('views', json_encode($views, JSON_NUMERIC_CHECK))
            ->with('msgs', json_encode($msgs, JSON_NUMERIC_CHECK));
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
