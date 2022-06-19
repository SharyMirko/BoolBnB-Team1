<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Apartment;
use Illuminate\Support\Facades\Auth as FacadesAuth;


class DashboardController extends Controller
{
   public function __construct()
   {
      $this->middleware('auth');
   }

   public function index()
   {
      $user_id = FacadesAuth::id();
      $aparts = Apartment::where('user_id',$user_id)->get();
   
      return view('admin.dashboard', compact('aparts'));
   }


   // public function slugger(Request $request) {
   //    return response()->json([
   //       'slug' => Apartment::genSlug($request->all()['string'])
   //    ]);
   // }
}
