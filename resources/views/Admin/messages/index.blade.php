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
      <div class="row g-0 mt-5 d-none d-md-block">
         <h3 class="backoffice-title">I miei messaggi</h3>

         <table class="table">
            <thead>
              <tr>
                <th scope="col">Mittente</th>
                <th scope="col">Messaggio</th>
                <th scope="col">Ricevuto il</th>
              </tr>
            </thead>
            <tbody>
               @foreach ($messagges as $message)
                  <tr>
                     <td class="py-4" scope="row"><a href="mailto:{{$message->email_sender}}">{{$message->email_sender}}</a></td>
                     <td class="py-4">{{$message->text_ms}}</td>
                     <td class="py-4">{{$message->created_at}}</td>
                  </tr>
              @endforeach
            </tbody>
          </table>
      </div>
      {{-- / --}}

      {{-- versione mobile --}}
      {{-- <div class="row row-cols-1 d-md-none gy-4 gx-0 mt-3">
         <h3 class="backoffice-title">I miei appartamenti</h3>
         @foreach ($aparts as $apart)
            <div class="col">
               <article class="card rounded-3 border-0">
                  <a class="m-0 p-0 d-block" href="#">
                     <img src="{{$apart->thumb}}" class="card-img-top position-relative w-100" alt="{{$apart->title}}">

                     <div class="crown"></div>

                     <div class="card-body p-4">
                        <p class="category  text-muted">{{$apart->category}}</p>
                        <h4 class="text-muted">{{$apart->title}}</h4>
                        <p class="geo icon text-muted mb-0">{{$apart->address}}</p>
                        <p class="city text-muted">{{$apart->city}}</p>
                        <p class="price text-muted">€ {{$apart->price}}<span class="price-suffix">/notte</span></p>

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
         @endforeach
      </div> --}}
      {{-- / --}}

   </div>
@endsection
