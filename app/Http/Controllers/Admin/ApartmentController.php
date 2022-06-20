<?php

namespace App\Http\Controllers\Admin;

use App\Model\Apartment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Service;
use App\Model\Category;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

class ApartmentController extends Controller
{

   public function index()
   {
      $apartmentData = Apartment::paginate(12);

      return view('apartments.index', compact('apartmentData'));
   }


   public function create()
   {
      $apartmentData = Apartment::all();
      $serviceData = Service::all();
      $categoryData = Category::all();
      $user_id = Auth::id();

      return view ('apartments.create', [
         'apartmentData' => $apartmentData,
         'serviceData'   => $serviceData,
         'categoryData'  => $categoryData,
         'user_id'       => $user_id
      ]);
   }


   public function store(Request $request)
   {
      $apartmentForm = $request->all();

      $apartment = new Apartment();
      $apartment->fill($apartmentForm);
      $apartment->save();

      foreach ($request['service'] as $service) {
         $apartment->services()->attach(['service_id' => $service], ['apartment_id' => $apartment->id]);
      }

      return redirect()->route('admin.apartments.show', $apartment->id);
   }


   public function show(Apartment $apartment)
   {
      $services = $apartment->services()->where('apartment_id', $apartment->id)->get();
      return view('apartments.show', compact('apartment', 'services'));
   }


   public function edit(Apartment $apartment)
   {

      if (Auth::id() !== $apartment->user_id) abort(403);

      $users = User::all();
      $services = Service::all();

      // dd($apartment);

      return view('apartments.edit', [
         'apartment'    => $apartment,
         'users'        => $users,
         'services'     => $services
      ]);
   }


   public function update(Request $request, Apartment $apartment)
   {
      if (Auth::id() !== $apartment->user_id) abort(403);

      $apartmentForm = $request->all();

      $apartment->update($apartmentForm);

      return redirect()->route('apartments.show', $apartment->id);
   }


   public function destroy(Apartment $apartment)
   {
      if (Auth::id() !== $apartment->user_id) abort(403);

      $apartment->premiumFeatures()->detach();
      $apartment->services()->detach();
      $apartment->messages()->delete();

      $apartment->delete();

      return redirect()->route('apartments.index');
   }
}
