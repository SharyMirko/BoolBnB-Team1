<?php

namespace App\Http\Controllers\Admin;

use App\Model\Apartment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Service;
use App\Model\Category;
use Illuminate\Support\Facades\Auth as FacadesAuth;

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
        $user_id = FacadesAuth::id();

        return view ('apartments.create', [
         'apartmentData' => $apartmentData,
         'serviceData'   => $serviceData,
         'categoryData'  => $categoryData,
         'user_id'       => $user_id
      ]);
    }


    public function store(Request $request)
    {
       /*  dd($request->all()); */
        $apartmentForm = $request->all();
        $apartment = new Apartment();
        $apartment->fill($apartmentForm);
        $apartment->save();

        return redirect()->route('admin.apartments.index');
    }


    public function show(Apartment $apartment)
    {
/*         dd($apartment);
 */        return view('apartments.show', compact('apartment'));
    }


    public function edit(Apartment $apartment)
    {
        return view('apartments.edit', compact('apartment'));
    }


    public function update(Request $request, Apartment $apartment)
    {
        $apartmentForm = $request->all();

        $apartment->update($apartmentForm);

        return redirect()->route('admin.apartments.show');
    }


    public function destroy(Apartment $apartment)
    {
        $apartment->delete();

        return redirect()->route('admin.apartments.index');
    }
}
