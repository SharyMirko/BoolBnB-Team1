<?php

namespace App\Http\Controllers\Admin;

use App\Model\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;



class ViewController extends Controller
{

   public function index()
   {
      $days = [];

      $currentDate = date('d-m-Y');

      for ($i=0; $i < 8; $i++) {
         $d = strtotime($currentDate);
         $d -= 3600*24*$i;

         array_unshift($days, date('d-m-Y', $d));
      };

      $views = [];

      foreach ($days as $key => $value) {
         $views[] = View::where('apartment_id', $_GET['apart_id'])->where(DB::raw('DATE_FORMAT(created_at, "%Y-%m-%d")'), date('Y-m-d', strtotime($value)))->count();
      }

      return view('admin.statistics.index')->with('days', json_encode($days))->with('views',json_encode($views,JSON_NUMERIC_CHECK));
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
