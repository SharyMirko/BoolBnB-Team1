<?php

namespace App\Http\Controllers;


use App\Model\PremiumFeature;
use App\Model\Apartment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Service;
use App\Model\Category;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $aparts = Apartment::all();
        $data = [];
        foreach ($aparts as $apart) {
            $check = $apart->premiumFeatures()->where('apartment_id', $apart->id)->where('expiring_at', '>', Carbon::now())->get();
            if ($check->count() > 0) {
                $data[] = $apart->id;
            } 
        }
        $apartments = Apartment::whereIn('id', $data)->get();
        return view('guests.landing', compact('apartments'));
    }
}
