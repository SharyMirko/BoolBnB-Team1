<?php

namespace App\Http\Controllers\Api;

use App\Model\Apartment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApartmentController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index(Request $request)
   {
      // $attributes = $request->all();

      // $apiApartments = Apartment::join('users', 'apartments.user_id', 'users.id')
      //                            ->join('apartment_service', 'apartments.id', 'apartment_service.apartment_id')
      //                            ->join('services', 'services.id', 'apartment_service.service_id')
      //                            ->select('apartments.*', 'users.first_name', 'users.last_name')
      //                            ->first()
      //                            ->with(['services'])
      //                            ->orderBy('id', 'asc')
      //                            ->paginate(20);


      $apiApartments = Apartment::with([
         'user',
         'services' => function ($query) {$query->select('name');}
      ])->paginate(20);





      return response()->json([
         'success'   => true,
         'response'  => $apiApartments
      ]);
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
      //
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request)
   {
      //
   }

   /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function show($id)
   {
      $apartment = Apartment::where('id', $id)->first();
      if ($apartment) {
         return response()->json([
            'success'   => true,
            'response'  => [
               'data'      => $apartment,
            ]
         ]);
      } else {
         return response()->json([
            'success'   => false,
         ]);
      }
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function edit($id)
   {
      //
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, $id)
   {
      //
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function destroy($id)
   {
      //
   }
}
