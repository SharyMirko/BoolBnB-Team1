<?php

namespace App\Http\Controllers\Admin;

use App\Model\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    
    public function index()
    {
        // MOMENTANEO DA MODIFICARE
        return view('apartments.show');
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
    }

    
    public function show(Service $service)
    {
        //
    }

    
    public function edit(Service $service)
    {
        //
    }

    
    public function update(Request $request, Service $service)
    {
        //
    }

    
    public function destroy(Service $service)
    {
        //
    }
}
