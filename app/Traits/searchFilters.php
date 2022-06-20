<?php

namespace App\Traits;

use App\Model\Apartment;
use App\Model\Service;


trait searchFilters {
    function composeQuery($request) {
        $ApartmentQuery = Apartment::whereRaw('1 = 1');
        
      

        if ($request->city) {
            $ApartmentQuery->where(function($query) use ($request) { // per aggiungere le parentesi nell'SQL
                $query->where('city', 'LIKE', $request->city);
            });
        }

        if ($request->category) {
            $ApartmentQuery->where('category', $request->category);
        }

        if ($request->beds) {
            $ApartmentQuery->where('beds_n', $request->beds);
        }
        if ($request->rooms) {
            $ApartmentQuery->where('rooms_n', $request->rooms);
        }
       /*  if ($request->services) {
            $ApartmentQuery->where('name', $request->services);
        } */

        /* if ($request->services) {
            $services = $request->services;
            foreach ($services as $service) {
                $ApartmentQuery->whereHas('services', function($query) use ($service) {
                    $query->where('name', $service);
                });
            }
        } */

/*         dd($request);
 */
        return $ApartmentQuery;
    }
}