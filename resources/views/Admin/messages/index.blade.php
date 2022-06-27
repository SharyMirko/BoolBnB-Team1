@extends('layouts.layout')

@section('title', 'Dashboard')

@section('content')
   <div class="container py-5">

      {{-- versione desktop --}}
      <div class="row g-0 mt-5">
         <h3 class="backoffice-title"><a href="{{ route('admin.dashboard') }}" class="text-muted"><i class="fa-solid fa-arrow-left fs-5"></i></a> I miei messaggi</h3>

         <div class="d-flex align-items-center my-5 message flex-wrap">
            <div class="img-box position-relative flex-grow-1 flex-sm-grow-0 mb-3">
               <img src="{{ $userApart[0]->thumb }}" class="rounded-3 h-100 img-fluid" alt="{{ $userApart[0]->title }}">
               <div class="crown"></div>
            </div>

            <div class="ms-3 flex-grow-1">
               <p class="category m-0 text-capitalize">{{$userApart[0]->category}}</p>
               <h4 class="my-2 text-capitalize">{{$userApart[0]->title}}</h4>
               <p class="geo icon mb-0">{{$userApart[0]->address}}</p>
               <p class="city mb-1">{{$userApart[0]->city}}</p>
               <p class="price-text m-0">€ {{$userApart[0]->price}}<span class="price-suffix">/notte</span></p>
            </div>
         </div>

         @if (count($messagges) > 0)

            <table class="table d-none d-md-block">
               <thead>
               <tr>
                  <th scope="col">Mittente</th>
                  <th scope="col w-100">Messaggio</th>
                  <th scope="col">Ricevuto il</th>
               </tr>
               </thead>
               <tbody>
                  @foreach ($messagges as $message)
                     <tr>
                        <td class="py-4" scope="row"><a href="mailto:{{$message->email_sender}}">{{$message->email_sender}}</a></td>
                        <td class="py-4 w-100" scope="row">{{$message->text_ms}}</td>
                        <td class="py-4 message-date" scope="row">{{$message->created_at}}</td>
                     </tr>
               @endforeach
               </tbody>
            </table>
         </div>
         {{-- / --}}

         {{-- versione mobile --}}
         <div class="row row-cols-1 d-md-none gy-4 gx-0 mt-3">
            @foreach ($messagges as $message)
               <div class="col">
                  <article class="card rounded-3 border-0">
                     <div class="card-body p-4">
                        <h5>Mittente</h5>
                        <p><a href="mailto:{{$message->email_sender}}">{{$message->email_sender}}</a></p>

                        <h5>Messaggi</h5>
                        <p>{{$message->text_ms}}</p>

                        <h5>Ricevuto il</h5>
                        <p>{{$message->created_at}}</p>
                     </div>

                  </article>
               </div>
            @endforeach

         </div>
         {{-- / --}}

         @else
            <div class="row g-0 mt-5">
               <div class="col">
                  <p class="msg-empty text-center">Non sono presenti messaggi</p>
               </div>
            </div>
         @endif


   </div>
@endsection
