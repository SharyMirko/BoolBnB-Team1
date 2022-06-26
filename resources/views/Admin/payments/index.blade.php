@extends('layouts.layout')

@section('title', 'Promozione')

@section('content')
<div id="payApp">
   <div class="container py-5">

      @if(session()->has('seccess_txt'))
         <div class="alert alert-success">
            {{ session()->get('seccess_txt') }}
         </div>
      @endif

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

                  <button data-bs-toggle="modal" data-bs-target="#checkModal" id="promo24btn" class="btn btn-primary text-white">Promuovi</button>
               </article>
            </div>
            <div class="col" id="promo72">
               <article class="rounded-3 p-5 text-center h-100">
                  <img src="{{ asset('img/promo_crown.svg') }}" alt="Promozione appartamento 72 ore" class="mb-3">
                  <h2 class="fw-bold my-4">Promo 72</h2>
                  <h3 class="price-text">€ 5,99<span class="price-suffix">/72 ore</span></h3>
                  <p class="my-4">Promuovi il tuo appartamento<br>per 72 ore</p>

                  <button data-bs-toggle="modal" data-bs-target="#checkModal" id="promo72btn" class="btn btn-primary text-white">Promuovi</button>
               </article>
            </div>
            <div class="col" id="promo144">
               <article class="rounded-3 p-5 text-center h-100">
                  <img src="{{ asset('img/promo_crown.svg') }}" alt="Promozione appartamento 144 ore" class="mb-3">
                  <h2 class="fw-bold my-4">Promo 144</h2>
                  <h3 class="price-text">€ 9,99<span class="price-suffix">/144 ore</span></h3>
                  <p class="my-4">Promuovi il tuo appartamento<br>per 144 ore</p>

                  <button data-bs-toggle="modal" data-bs-target="#checkModal" id="promo144btn" class="btn btn-primary text-white">Promuovi</button>
               </article>
            </div>
         </div>
      </div>
   </div>
</div>


<!-- Modal -->
<div class="modal fade" id="checkModal" tabindex="-1" aria-labelledby="checkModalLabel" aria-hidden="true">
   <div class="modal-dialog">
   <div class="modal-content">
      <div class="modal-header">
         <h5 class="modal-title" id="checkModalLabel">Pagamento promozione</h5>
         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
         <form method="post" id="payment-form" action="{{ url('/admin/checkout?apart_id=' . $_GET['apart_id'])}}">
            @csrf

            <section>
               <label for="amount">
                  <span class="input-label">Importo €</span>
                  <span id="selectedamount"></span>
                  <div class="input-wrapper amount-wrapper">
                     <input class="d-none" id="amount" name="amount" type="tel" min="1" placeholder="Amount" value="" >
                  </div>
               </label>
               <div class="bt-drop-in-wrapper">
                  <div id="bt-dropin"></div>
               </div>
            </section>

            <input id="nonce" name="payment_method_nonce" type="hidden" />
         </form>
      </div>
      <div class="modal-footer">
         <button class="btn btn-primary text-white" type="submit">Procedi</button>
         <button type="button" class="btn btn-outline" data-bs-dismiss="modal">Annulla</button>
      </div>
   </div>
   </div>
</div>



{{-- script BrainTree --}}
<script src="https://js.braintreegateway.com/web/dropin/1.33.2/js/dropin.min.js"></script>
<script>
   var form = document.querySelector('#payment-form');
   var client_token = "{{ $token }}";

   braintree.dropin.create({
      authorization: client_token,
      selector: '#bt-dropin',
      locale: 'it_IT'
   },

   function (createErr, instance) {
      if (createErr) {
         console.log('Create Error', createErr);
         return;
      }
      form.addEventListener('submit', function (event) {
         event.preventDefault();

         instance.requestPaymentMethod(function (err, payload) {
            if (err) {
               console.log('Request Payment Method Error', err);
               return;
            }

            // Add the nonce to the form and submit
            document.querySelector('#nonce').value = payload.nonce;
            form.submit();
         });
      });
   });

</script>
@endsection
