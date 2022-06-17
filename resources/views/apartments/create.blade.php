@extends('layouts.layout')

@section('title', 'Aggiungi appartamento')

@section('content')
   <div class="container py-5">
      <h3 class="backoffice-title mb-5"><a href="#" class="text-muted"><i class="fa-solid fa-arrow-left fs-4"></i></a> Aggiungi appartamento</h3>
      <form class="row g-0" form method="POST" action="{{ route('admin.apartments.store') }}" id="input-form" enctype="multipart/form-data">
         @csrf

         <div class="col-12 col-md-7">
            <h4 class="mb-3">Dati generali</h4>

            <div class="form-group row mb-2">
               <div class="col">
                  <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $title ?? old('title') }}" required autocomplete="title" autofocus placeholder="{{ __('Title') }}">

                  @error('title')
                        <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                        </span>
                  @enderror
               </div>
            </div>

            <div class="form-group row mb-2 gx-2">
               <div class="col-8 col-md-7 col-lg-8">
                  <select name="category" class="form-select @error('category') is-invalid @enderror" id="category">
                     <option selected disabled hidden value="">Seleziona categoria</option>
                     <option value="1">Appartamenti</option>
                     <option value="2">Stanze</option>
                     <option value="3">Casali</option>
                     <option value="4">Ville</option>
                  </select>

                  @error('category')
                        <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                        </span>
                  @enderror
               </div>

               <div class="col-4 col-md-5 col-lg-4">
                  <input id="price" type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ $price ?? old('price') }}" required autocomplete="price" autofocus placeholder="€ {{ __('Price') }}/notte">

                  @error('price')
                     <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                     </span>
                  @enderror
               </div>
            </div>

            <div class="form-group row mb-2 text-center">
               <div class="col">
                  <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="8" cols="50" autofocus placeholder="{{ __('Description') }}" required></textarea>

                  @error('description')
                     <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                     </span>
                  @enderror
               </div>
            </div>

            {{-- checkbox --}}
            <div class="form-group my-4">
               <h4 class="mb-3">Servizi</h4>
               <div class="row row-cols-2 row-cols-sm-3 row-cols-md-2 row-cols-lg-3 g-0">

                  <div class="col d-flex flex-column ">
                     <div class="form-check">
                        <input type="checkbox" class="form-check-input" value="" id="wifi">
                        <label class="form-check-label" for="wifi">WiFi</label>
                     </div>

                     <div class="form-check">
                        <input type="checkbox" class="form-check-input" value="" id="wifi">
                        <label class="form-check-label" for="wifi">Sauna</label>
                     </div>

                     <div class="form-check">
                        <input type="checkbox" class="form-check-input" value="" id="wifi">
                        <label class="form-check-label" for="wifi">Portineria</label>
                     </div>
                  </div>

                  <div class="col d-flex flex-column">
                     <div class="form-check">
                        <input type="checkbox" class="form-check-input" value="" id="wifi">
                        <label class="form-check-label" for="wifi">Posto auto</label>
                     </div>

                     <div class="form-check">
                        <input type="checkbox" class="form-check-input" value="" id="wifi">
                        <label class="form-check-label" for="wifi">Piscina</label>
                     </div>

                     <div class="form-check">
                        <input type="checkbox" class="form-check-input" value="" id="wifi">
                        <label class="form-check-label" for="wifi">Vista panoramica</label>
                     </div>
                  </div>
               </div>
            </div>
            {{-- / --}}
         </div>
      </form>
   </div>
@endsection
