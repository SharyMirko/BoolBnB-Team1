@extends('layouts.layout')

@section('title', 'Promozione')

@section('content')
   <div class="container py-5">

      {{-- versione desktop --}}
      <div class="row g-0 mt-5">
         <h3 class="backoffice-title"><a href="{{ route('admin.dashboard') }}" class="text-muted"><i class="fa-solid fa-arrow-left fs-5"></i></a> Promozione</h3>

         <div class="row g-0 mt-5 mb-2">
            <div class="col text-center">
               <h1>Ottieni più visibilità</h1>
               <p class="fs-5 my-4">Il tuo annuncio diventa più evidente e appare prioritariamente nei risultati di ricerca.<br>Pagamento veloce e sicuro con carta di credito.<br>Prezzi IVA comprensa.</p>
               <img src="{{ asset('img/BraintreePayments.png') }}" alt="Braintree Payments by PayPal">
            </div>
         </div>

         <div class="row row-cols-1 row-cols-md-3 gx-0 gx-lg-5 gx-md-3 gy-4">
            <div class="col" id="promo24">
               <article class="rounded-3 p-5 text-center h-100">
                  <img src="{{ asset('img/promo_crown.svg') }}" alt="Promozione appartamento 24 ore" class="mb-3">
                  <h2 class="fw-bold my-4">Promo 24</h2>
                  <h3 class="price-text">€ 2,99<span class="price-suffix">/24 ore</span></h3>
                  <p class="my-4">Promuovi il tuo appartamento<br>per 24 ore</p>
                  <button class="btn btn-primary text-white">Promuovi</button>
               </article>
            </div>
            <div class="col" id="promo72">
               <article class="rounded-3 p-5 text-center h-100">
                  <img src="{{ asset('img/promo_crown.svg') }}" alt="Promozione appartamento 72 ore" class="mb-3">
                  <h2 class="fw-bold my-4">Promo 72</h2>
                  <h3 class="price-text">€ 5,99<span class="price-suffix">/24 ore</span></h3>
                  <p class="my-4">Promuovi il tuo appartamento<br>per 72 ore</p>
                  <button class="btn btn-primary text-white">Promuovi</button>
               </article>
            </div>
            <div class="col" id="promo144">
               <article class="rounded-3 p-5 text-center h-100">
                  <img src="{{ asset('img/promo_crown.svg') }}" alt="Promozione appartamento 144 ore" class="mb-3">
                  <h2 class="fw-bold my-4">Promo 144</h2>
                  <h3 class="price-text">€ 9,99<span class="price-suffix">/24 ore</span></h3>
                  <p class="my-4">Promuovi il tuo appartamento<br>per 144 ore</p>
                  <button class="btn btn-primary text-white">Promuovi</button>
               </article>
            </div>
         </div>
      </div>
   </div>
@endsection
