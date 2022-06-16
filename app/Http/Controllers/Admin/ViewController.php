<?php

namespace App\Http\Controllers\Admin;

use App\Model\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ViewController extends Controller
{
    
    public function index()
    {
        //
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
    }

<<<<<<< HEAD:app/Http/Controllers/Admin/ViewController.php
    /**
     * Display the specified resource.
     *
     * @param  \App\View  $view
     * @return \Illuminate\Http\Response
     */
    public function show(View $view)
=======
    
    public function show(Statistic $statistic)
>>>>>>> CRUD:app/Http/Controllers/Admin/StatisticController.php
    {
        //
    }

<<<<<<< HEAD:app/Http/Controllers/Admin/ViewController.php
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\View  $view
     * @return \Illuminate\Http\Response
     */
    public function edit(View $view)
=======
    
    public function edit(Statistic $statistic)
>>>>>>> CRUD:app/Http/Controllers/Admin/StatisticController.php
    {
        //
    }

<<<<<<< HEAD:app/Http/Controllers/Admin/ViewController.php
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\View  $view
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, View $view)
=======
    
    public function update(Request $request, Statistic $statistic)
>>>>>>> CRUD:app/Http/Controllers/Admin/StatisticController.php
    {
        //
    }

<<<<<<< HEAD:app/Http/Controllers/Admin/ViewController.php
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\View  $view
     * @return \Illuminate\Http\Response
     */
    public function destroy(View $view)
=======
    
    public function destroy(Statistic $statistic)
>>>>>>> CRUD:app/Http/Controllers/Admin/StatisticController.php
    {
        //
    }
}
