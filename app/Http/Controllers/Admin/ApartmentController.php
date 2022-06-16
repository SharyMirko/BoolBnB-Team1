<?php

namespace App\Http\Controllers\Admin;

use App\Model\Apartment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

        return view ('apartments.create', compact('apartmentData'));
    }

    
    public function store(Request $request)
    {
        $apartmentForm = $request->all();

        $apartment = new Apartment();
        $apartment->fill($apartmentForm);
        $apartment->save();

        return redirect()->route('apartments.show');
    }

    
    public function show(Apartment $apartment)
    {
        return view('apartments.show', compact('apartment'));
    }

    
    public function edit(Apartment $apartment)
    {
        return view('apartments.edit', compact('apartment'));
    }

    
    public function update(Request $request, Apartment $apartment)
    {
        $apartmentForm = $request->all();

        $apartment->update($apartmentForm);

        return redirect()->route('apartments.show');
    }

    
    public function destroy(Apartment $apartment)
    {
        $apartment->delete();

        return redirect()->route('apartments.index');
    }
}
