<?php

namespace App\Http\Controllers\Admin;

use App\Model\Apartment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Service;
use App\Model\Category;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ApartmentController extends Controller
{
   private function validation()
   {
      return [
         'title'         => 'required|min:5|max:255',
         'thumb'         => 'nullable|max:255',
         'description'   => 'nullable|min:25|max:255',
         'category'      => 'required',
         'rooms_n'       => 'required|numeric',
         'beds_n'        => 'required|numeric',
         'bathrooms_n'   => 'required|numeric',
         'area'          => 'required|numeric',
         'city'          => 'required|min:4|max:255',
         'price'         => 'required|numeric',
         'address'       => 'required|string'
      ];
   }

   public function index()
   {
      $apartmentData = Apartment::paginate(12);

      return view('apartments.index', compact('apartmentData'));
   }

      // $request->validate($this->validation);

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

      $thumb_path = Storage::put('uploads', $apartmentForm['thumb']);

      // $apartment = new Apartment();
      // $apartment->fill($apartmentForm);
      // $apartment->save();

      $apartment = [
         'user_id' => Auth::user()->id,
         'thumb' => $thumb_path
      ] + $apartmentForm;

      $newApartment = Apartment::create($apartment);

      foreach ($request['service'] as $service) {
         $newApartment->services()->attach(['service_id' => $service], ['apartment_id' => $newApartment->id]);
      }

      return redirect()->route('admin.apartments.show', $newApartment->id);
   }


   public function show(Apartment $apartment)
   {
      $services = $apartment->services()->where('apartment_id', $apartment->id)->get();
      return view('apartments.show', compact('apartment', 'services'));
   }

      // $request->validate($this->validation);

   public function edit(Apartment $apartment)
   {
      if (Auth::id() !== $apartment->user_id) abort(403);
      $apartment = $apartment->with('services')->first();
      $users = User::all();
      $services = Service::all();
      $categoryData = Category::all();

      // dd($ciao);

      return view('apartments.edit', [
         'apartment'    => $apartment,
         'users'        => $users,
         'serviceData'  => $services,
         'categoryData' => $categoryData
      ]);
   }


   public function update(Request $request, Apartment $apartment)
   {
      if (Auth::id() !== $apartment->user_id) abort(403);

      $apartmentForm = $request->all();

      if (array_key_exists('thumb', $apartmentForm)) {

         Storage::delete($apartment->thumb);

         $thumb_path = Storage::put('uploads', $apartmentForm['thumb']);

         $newApartment = [
            'thumb' => $thumb_path
         ] + $apartmentForm;

      } else {
         $newApartment = $apartmentForm;
      }

      $apartment->update($newApartment);

      return redirect()->route('apartments.show', $apartment->id);
   }


   public function destroy(Apartment $apartment)
   {
      if (Auth::id() !== $apartment->user_id) abort(403);

      $apartment->premiumFeatures()->detach();
      $apartment->services()->detach();
      $apartment->messages()->delete();
      $apartment->views()->delete();

      $apartment->delete();

      return redirect()->route('admin.dashboard');
   }
}
