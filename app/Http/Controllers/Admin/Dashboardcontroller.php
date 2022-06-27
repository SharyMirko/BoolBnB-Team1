<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Apartment;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Carbon\Carbon;


class DashboardController extends Controller
{
   public function __construct()
   {
      $this->middleware('auth');
   }

   public function index()
   {
      $user_id = FacadesAuth::id();
      $aparts = Apartment::where('user_id',$user_id)->with([
         'premiumFeatures' => function ($query3) {$query3->select('id', 'expiring_at')->where('expiring_at', '>', Carbon::now());}
      ])->paginate(30);
   
      return view('admin.dashboard', compact('aparts'));
   }


   // public function slugger(Request $request) {
   //    return response()->json([
   //       'slug' => Apartment::genSlug($request->all()['string'])
   //    ]);
   // }
}
