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

         @if (count($aparts) > 0)
            @php
               $i = 0;
            @endphp

            @foreach ($aparts as $apart)
               @php
                  $i++;
               @endphp

               <div class="d-flex align-items-center py-4">
                  <div class="img-box position-relative">
                     <img src="{{ $apart->thumb }}" class="rounded-3 w-100 h-100" alt="{{ $apart->title }}">
                     <div class="crown"></div>
                  </div>

                  <div class="ms-3">
                     <p class="category m-0 text-capitalize">{{$apart->category}}</p>
                     <h4 class="my-2 text-capitalize">{{$apart->title}}</h4>
                     <p class="geo icon mb-0">{{$apart->address}}</p>
                     <p class="city">{{$apart->city}}</p>
                     <p class="price-text m-0">€ {{$apart->price}}<span class="price-suffix">/notte</span></p>
                  </div>

                  <div class="ms-auto d-flex flex-column">
                     <div class="d-flex flex-column mb-4">
                        <a href="#" class="mb-1"><i class="fa-solid fa-chart-line"></i> Statistiche</a>
                        <a href="{{ route('admin.messages.index', ['apart_id'=>$apart->id]) }}" class="mb-1"><i class="fa-solid fa-envelope"></i> Messaggi ricevuti</a>
                        <a href="{{ route('admin.payments.index') }}"><i class="fa-solid fa-crown"></i> Promuovi</a>
                     </div>

                     <div class="d-flex">
                        <a href="{{ route('admin.apartments.show', $apart->id) }}" class="btn btn-primary text-white me-2" title="Vedi l'appartamento"><i class="fa-solid fa-eye"></i></a>
                        <a href="{{ route('admin.apartments.edit', $apart->id) }}" class="btn btn-primary text-white me-2" title="Modifica l'appartamento"><i class="fa-solid fa-pen"></i></a>

                        <!-- Elimina appartamento, popup trigger -->
                        <button type="button" data-baseurl="{{ route('admin.apartments.index') }}" data-id="{{ $apart->id }}" data-type="apartment" class="btn btn-danger text-white btn-del" data-bs-toggle="modal" data-bs-target="#delPopup" title="Elimina l'appartamento"><i class="fa-solid fa-trash-can"></i></button>
                        <!-- / -->
                     </div>
                  </div>
               </div>

               @if (count($aparts) != $i)
                  <hr class="m-0">
               @endif

            @endforeach
         </div>
         {{-- / --}}

         {{-- versione mobile --}}
         <div class="row row-cols-1 d-md-none gy-4 gx-0 mt-3">
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
                                 <a href="{{ route('admin.messages.index', ['apart_id'=>$apart->id]) }}" class="mb-1"><i class="fa-solid fa-envelope"></i> Messaggi ricevuti</a>
                                 <a href="#"><i class="fa-solid fa-crown"></i> Promuovi</a>
                              </div>

                              <div class="d-flex">
                                 <a href="{{ route('admin.apartments.show', $apart->id) }}" class="btn btn-primary text-white me-2"><i class="fa-solid fa-eye"></i></a>
                                 <a href="{{ route('admin.apartments.edit', $apart->id) }}" class="btn btn-primary text-white me-2"><i class="fa-solid fa-pen"></i></a>
                                 <!-- Elimina appartamento, popup trigger -->
                                 <button type="button" data-baseurl="{{ route('admin.apartments.index') }}" data-id="{{ $apart->id }}" data-type="apartment" class="btn btn-danger text-white btn-del" data-bs-toggle="modal" data-bs-target="#delPopup" title="Elimina l'appartamento"><i class="fa-solid fa-trash-can"></i></button>
                                 <!-- / -->
                              </div>
                           </div>
                        </div>
                     </a>
                  </article>
               </div>
            @endforeach
         </div>
         {{-- / --}}
         @else
            <div class="row g-0 mt-5">
               <div class="col">
                  <p class="msg-empty text-center">Non sono presenti appartamenti</p>
               </div>
            </div>
         </div>
         @endif


   </div>



   <!-- Deletion popup -->
   <div class="modal fade" id="delPopup" tabindex="-1" aria-labelledby="delPopup" aria-hidden="true">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="delPopuplLabel">Conferma eliminazione</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Chiudi"></button>
            </div>
            <div class="modal-body">
               Confermi di voler eliminare questo appartamento?
            </div>
            <div class="modal-footer">

               <form class="d-inline-block" method="POST" id="indexForm">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" id="btnDel">Sì, elimina</button>
               </form>

               <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No, annulla</button>
            </div>
         </div>
      </div>
   </div>
@endsection
