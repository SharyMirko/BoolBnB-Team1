@extends('layouts.frontoffice')

@section('title', 'Welcome')

@section('content')
    <section class="container my-4" id="sec_1">
        <h1>Titolo H1</h1>
        <h2>Titolo H2</h2>
        <input type="text" placeholder="Location" name="Landing-search" id="Landing-search">
        <button type="submit">Cerca</button>
    </section>

    <section class="container my-4" id="sec_ap_prem">
        <div class="row">
            <div class="col">
                <h2>Titolo H2</h2>
            </div>
        </div>
        <div class="row">
            <div class="col text-end">
                <button class="btn btn-primary">Prec.</button>
                <button class="btn btn-danger">Succ.</button>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <img src="https://picsum.photos/200/300" alt="lorem_picsum">
            </div>
        </div>
    </section>
@endsection
