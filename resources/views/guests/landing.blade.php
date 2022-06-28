@extends('layouts.layout')

@section('title', 'Benvenuto')

@section('content')

   {{-- jumbotron --}}
   <section id="jumbotron" class="row align-items-center text-center justify-content-center g-0">
      <div class="col col-md-6 col-lg-5 mx-3">
            <h1>Un'esperienza unica</h1>
            <h3 class="my-3">Trova la tua location da sogno</h3>

            <form action="{{ route('apartments.index') }}" method="GET" class="d-flex w-100 align-items-center position-relative">
               <i class="fas fa-search"></i>
               <input type="text" placeholder="Location" name="city" id="Landing-search" class="form-control me-2 flex-grow-1">
               <button class="btn btn-primary text-light">Cerca</button>
            </form>
      </div>
   </section>
   {{-- / --}}


   {{-- landing slider appartamenti in evidenza --}}
   @if (count($apartments) > 0)
      <section class="container mt-4 py-5 pt-5" id="sec_ap_prem">
         <x-landingSlider :apartments="$apartments" />
      </section>
   @endif
   {{-- / --}}


   {{-- location principali --}}
   <section class="py-5" id="sec_loc_prin">
      <div class="container">

            <div class="row py-4">
               <h3 class="frontend-section-title">Location principali</h3>
            </div>

            <div class="row row-cols-1 row-cols-md-2 g-4 text-center">

               <div class="col">
                  <a href="{{ route('apartments.index', 'city=roma') }}" class="text-muted">
                        <img src="{{ asset('img/roma.png') }}" class="img-fluid w-100" alt="Roma">
                        <p class="landing-category-name">Roma</p>
                  </a>
               </div>

               <div class="col">
                  <a href="{{ route('apartments.index', 'city=milano') }}" class="text-muted">
                        <img src="{{ asset('img/milano.png') }}" class="img-fluid w-100" alt="Milano">
                        <p class="landing-category-name">Milano</p>
                  </a>
               </div>

               <div class="col">
                  <a href="{{ route('apartments.index', 'city=napoli') }}" class="text-muted">
                        <img src="{{ asset('img/napoli.png') }}" class="img-fluid w-100" alt="Napoli">
                        <p class="landing-category-name">Napoli</p>
                  </a>
               </div>

               <div class="col">
                  <a href="{{ route('apartments.index', 'city=vibo valentia') }}" class="text-muted">
                        <img src="{{ asset('img/vibo.png') }}" class="img-fluid w-100" alt="Vibo Valentia">
                        <p class="landing-category-name">Vibo Valentia</p>
                  </a>
               </div>

            </div>

      </div>
   </section>
   {{-- / --}}


   {{-- categorie --}}
   <section class="container my-4 py-4" id="sec_categorie">
      <div class="row py-4">
            <h3>Categorie</h3>
      </div>
      <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4 text-center">
            <div class="col">
               <a href="{{ route('apartments.index') }}" class="text-muted">
                  <img src="{{ asset('img/cat_appartamenti.png') }}" class="img-fluid w-100" alt="Appartamenti">
                  <p class="landing-category-name">Appartamenti</p>
               </a>
            </div>
            <div class="col">
               <a href="{{ route('apartments.index') }}" class="text-muted">
                  <img src="{{ asset('img/cat_stanze.png') }}" class="img-fluid w-100" alt="Stanze">
                  <p class="landing-category-name">Stanze</p>
               </a>
            </div>
            <div class="col">
               <a href="{{ route('apartments.index') }}" class="text-muted">
                  <img src="{{ asset('img/cat_casali.png') }}" class="img-fluid w-100" alt="Casali">
                  <p class="landing-category-name">Casali</p>
               </a>
            </div>
            <div class="col">
               <a href="{{ route('apartments.index') }}" class="text-muted">
                  <img src="{{ asset('img/cat_ville.png') }}" class="img-fluid w-100" alt="Ville">
                  <p class="landing-category-name">Ville</p>
               </a>
            </div>
      </div>
   </section>
   {{-- / --}}

@endsection
