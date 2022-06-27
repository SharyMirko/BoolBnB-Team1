<?php

namespace App\Http\Controllers\Api;

use App\Model\Apartment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;


class ApartmentController extends Controller
{
   use \App\Traits\searchFilters;
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index(Request $request)
   {

     /*  $apiApartments = Apartment::with([
         'user' => function ($query1) {$query1->select('id', 'first_name', 'last_name');},
         'services' => function ($query2) {$query2->select('id', 'name');}
      ])->paginate(20);
         // create API response
         $response = [
            'success' => true,
            'data' => $apiApartments,
            'message' => 'List of Apartments'
         ]; */
         $filter = $this->composeQuery($request);
         $sql_string = $filter->toSql();
         $premium = [];

        $filter = $filter->with([
         'user' => function ($query1) {$query1->select('id', 'first_name', 'last_name');},
         'services' => function ($query2) {$query2->select('id', 'name');},
         'premiumFeatures' => function ($query3) {$query3->select('id', 'expiring_at')->where('expiring_at', '>', Carbon::now());}
      ])->paginate(30);
         foreach ($filter as $key => $apart) {
            if($apart->visible == 0) {
               unset($filter[$key]);
            }
         }

      if(isset($request->services)){
         foreach($filter as $key => $apart){
           if(!$apart->services->contains($request->services)){
             unset($filter[$key]);
           }
         }
      }
      foreach ($filter as $key => $apart) {
        if(count($apart->premiumFeatures) != 0) {
         unset($filter[$key]);
         $premium[] = $apart;
        }
      }

         return response()->json([
            'success'   => true,
            'response'  => $filter,
            'sql' => $premium
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
