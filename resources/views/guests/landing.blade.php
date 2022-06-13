@extends('layouts.frontoffice')

@section('title', 'Welcome')

@section('content')

   {{-- jumboton --}}
   <section id="jumbotron" class="row align-items-center text-center justify-content-center g-0">
      <div class="col col-md-6 col-lg-5 mx-3">
         <h1>Un'esperienza unica</h1>
         <h3 class="my-3">Trova la tua location da sogno</h3>
         <div class="d-flex w-100 align-items-center position-relative">
            <i class="fas fa-search"></i>
            <input type="text" placeholder="Location" name="Landing-search" id="Landing-search" class="me-2 flex-grow-1">
            <a href="{{ route('apartment.index') }}" class="btn btn-primary d-flex flex-column justify-content-center align-self-stretch"><span>Cerca</span></a>
         </div>
      </div>
   </section>
   {{-- / --}}

   <main class="container py-4 mt-5 g-0">

      {{-- appartamenti in evidenza --}}
      <section class="container my-4 py-4" id="sec_ap_prem">
         <div class="row py-3">
               <div class="col">
                  <h3>Appartamenti in evidenza</h3>
               </div>
         </div>
         <div class="row py-3">
               <div class="col text-end">
                  <button class="btn btn-primary"><</button>
                  <button class="btn btn-primary">></button>
               </div>
         </div>
         <div class="row row-cols-3 py-3">
            <div class="col">
               <x-card />
            </div>
            <div class="col">
               <x-card />
            </div>
            <div class="col">
               <x-card />
            </div>
         </div>
      </section>
      {{-- / --}}


      {{-- location principali --}}
      <section classes="container my-4 py-4" id="sec_loc_prin">
         <div class="row text-center my-3">
               <h3>Location principali</h3>
         </div>
         <div class="row row-cols-2 g-4 text-center">
               <div class="col position-relative">
                  <img src="https://picsum.photos/500/400?random=1" class="" alt="lorem_picsum">
                  <p class="position-absolute bottom-0 start-50 translate-middle-x text-light">Città</p>
               </div>
               <div class="col position-relative">
                  <img src="https://picsum.photos/500/400?random=2" class="" alt="lorem_picsum">
                  <p class="position-absolute bottom-0 start-50 translate-middle-x text-light">Città</p>
               </div>
               <div class="col position-relative">
                  <img src="https://picsum.photos/500/400?random=3" class="" alt="lorem_picsum">
                  <p class="position-absolute bottom-0 start-50 translate-middle-x text-light">Città</p>
               </div>
               <div class="col position-relative">
                  <img src="https://picsum.photos/500/400?random=4" class="" alt="lorem_picsum">
                  <p class="position-absolute bottom-0 start-50 translate-middle-x text-light">Città</p>
               </div>
         </div>
      </section>
      {{-- / --}}


      {{-- categorie --}}
      <section class="container my-4 py-4" id="sec_categorie">
         <div class="row text-center">
               <h3>Categorie</h3>
         </div>
         <div class="row row-cols-4 g-4 text-center">
               <div class="col position-relative">
                  <img src="https://picsum.photos/500/400" class="img-fluid" alt="lorem_picsum">
                  <p class="position-absolute bottom-0 start-50 translate-middle-x text-light">Città</p>
               </div>
               <div class="col position-relative">
                  <img src="https://picsum.photos/500/400" class="img-fluid" alt="lorem_picsum">
                  <p class="position-absolute bottom-0 start-50 translate-middle-x text-light">Città</p>
               </div>
               <div class="col position-relative">
                  <img src="https://picsum.photos/500/400" class="img-fluid" alt="lorem_picsum">
                  <p class="position-absolute bottom-0 start-50 translate-middle-x text-light">Città</p>
               </div>
               <div class="col position-relative">
                  <img src="https://picsum.photos/500/400" class="img-fluid" alt="lorem_picsum">
                  <p class="position-absolute bottom-0 start-50 translate-middle-x text-light">Città</p>
               </div>
         </div>
      </section>
      {{-- / --}}
   </main>
@endsection
