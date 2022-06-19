@extends('layouts.layout')

@section('title', 'Dashboard')

@section('content')
   <div class="container py-5">
      <div class="row g-0">
         <div class="col-12 text-center">
            <h1 class="mb-5">Bentornato, <span class="dashboard-username text-capitalize">{{ Auth::user()->first_name }}</span></h1>
            <a href="{{ route('admin.apartments.create') }}" class="btn btn-primary text-white">+ Aggiungi appartamento</a>
         </div>
      </div>

      {{-- versione desktop --}}
      <div class="row g-0 mt-5 dashboard-list d-none d-md-block">
         <h3 class="backoffice-title">I miei appartamenti</h3>

@php
    $i = 0;
@endphp
         @foreach ($aparts as $apart)
         @php
             $i++;
         @endphp
         <div class="d-flex align-items-center py-4">
            <div class="img-box position-relative">
               <img src="https://picsum.photos/240/160?random=<?= rand(1, 500) ?>" class="rounded-3 w-100 h-100" alt="lorem_picsum">
               <div class="crown"></div>
            </div>

            <div class="ms-3">
               <p class="category m-0">{{$apart->category}}</p>
               <h4 class="my-2">{{$apart->title}}</h4>
               <p class="geo icon">{{$apart->address}}</p>
               <p class="price-text m-0">€ {{$apart->price}}<span class="price-suffix">/notte</span></p>
            </div>

            <div class="ms-auto d-flex flex-column">
               <div class="d-flex flex-column mb-4">
                  <a href="#" class="mb-1"><i class="fa-solid fa-chart-line"></i> Statistiche</a>
                  <a href="#" class="mb-1"><i class="fa-solid fa-envelope"></i> Messaggi ricevuti</a>
                  <a href="#"><i class="fa-solid fa-crown"></i> Promuovi</a>
               </div>

               <div class="d-flex">
                  <a href="{{ route('apartments.show', $apart->id) }}" class="btn btn-primary text-white me-2"><i class="fa-solid fa-eye"></i></a>
                  <a href="#" class="btn btn-primary text-white me-2"><i class="fa-solid fa-pen"></i></a>
                  <a href="#" class="btn btn-primary text-white me-2"><i class="fa-solid fa-pause"></i></a>
                  <a href="#" class="btn btn-danger text-white"><i class="fa-solid fa-trash-can"></i></a>
               </div>
            </div>
         </div>
         @if ($i != 3)
         <hr class="m-0">
      @endif
         @endforeach
      </div>
      {{-- / --}}

      {{-- evrsione mobile --}}
      <div class="row row-cols-1 d-md-none gy-4 gx-0 mt-3">
         <h3 class="backoffice-title">I miei appartamenti</h3>
         @for ($i = 0; $i < 4; $i++)
            <div class="col">
               <article class="card rounded-3 border-0">
                  <a class="m-0 p-0 d-block" href="#">
                     <img src="https://picsum.photos/240/160?random=<?= rand(1, 500) ?>" class="card-img-top position-relative w-100" alt="lorem_picsum">

                     <div class="crown"></div>

                     <div class="card-body p-4">
                        <p class="category  text-muted">Appartamento</p>
                        <h4 class="text-muted">Appartamento moderno</h4>
                        <p class="geo icon  text-muted">Milano</p>
                        <p class="price  text-muted">€ 420<span class="price-suffix">/notte</span></p>

                        <div class="d-flex flex-column">
                           <div class="d-flex flex-column mb-4">
                              <a href="#" class="mb-1"><i class="fa-solid fa-chart-line"></i> Statistiche</a>
                              <a href="#" class="mb-1"><i class="fa-solid fa-envelope"></i> Messaggi ricevuti</a>
                              <a href="#"><i class="fa-solid fa-crown"></i> Promuovi</a>
                           </div>

                           <div class="d-flex">
                              <a href="#" class="btn btn-primary text-white me-2"><i class="fa-solid fa-eye"></i></a>
                              <a href="#" class="btn btn-primary text-white me-2"><i class="fa-solid fa-pen"></i></a>
                              <a href="#" class="btn btn-primary text-white me-2"><i class="fa-solid fa-pause"></i></a>
                              <a href="#" class="btn btn-danger text-white"><i class="fa-solid fa-trash-can"></i></a>
                           </div>
                        </div>
                     </div>
                  </a>
               </article>
            </div>
         @endfor
      </div>
      {{-- / --}}
   </div>
@endsection
