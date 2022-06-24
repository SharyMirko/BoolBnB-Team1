@extends('layouts.layout')

@section('title', 'Promozione')

@section('content')
   <div class="container py-5">

      {{-- versione desktop --}}
      <div class="row g-0 mt-5">
         <h3 class="backoffice-title"><a href="{{ route('admin.dashboard') }}" class="text-muted"><i class="fa-solid fa-arrow-left fs-5"></i></a> Promozione</h3>

         <div class="row">
            <div class="col">
               <h1>Ottieni più visibilità</h1>
               <p>Il tuo annuncio diventa più evidente e appare prioritariamente nei risultati di ricerca. Pagamento veloce e sicuro con carta di credito. Prezzi IVA comprensa.</p>
               <img src="{{ asset('img/BraintreePayments.png') }}" alt="Braintree Payments by PayPal">
            </div>
         </div>
      </div>
   </div>
@endsection
