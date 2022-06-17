@extends('layouts.layout')

@section('title', 'Aggiungi appartamento')

@section('content')
   <div class="container py-5">
      <h3 class="backoffice-title mb-5"><a href="{{ route('admin.dashboard') }}" class="text-muted"><i class="fa-solid fa-arrow-left fs-5"></i></a> Aggiungi appartamento</h3>
      <form method="POST" action="{{ route('admin.apartments.store') }}" id="input-form" enctype="multipart/form-data">
         @csrf

         <div class="row g-0">
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
                     <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="10" cols="50" autofocus placeholder="{{ __('Description') }}" required></textarea>
   
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
   
            <div class="col-12 col-md-5 gx-5">
               <h4 class="mb-3">Location</h4>
   
               <div class="form-group row mb-2">
                  <div class="col">
                     <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ $address ?? old('address') }}" required autocomplete="address" autofocus placeholder="{{ __('Address') }}">
   
                     @error('address')
                           <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                           </span>
                     @enderror
                  </div>
               </div>
   
               <div class="form-group row mb-3 g-0">
                  <div class="col">
                     <iframe class="w-100 rounded-3 border overflow-hidden" height="308" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2798.04318883717!2d9.188104899999999!3d45.46893389999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4786c6b25e5ea1e3%3A0xf48cc86e39a35fe4!2sVia%20Giuseppe%20Verdi%2C%2023%2C%2020121%20Milano%20MI!5e0!3m2!1sit!2sit!4v1655374106036!5m2!1sit!2sit" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                  </div>
               </div>

               <div class="form-group row">
                  <div class="col">
                     <div class="d-flex align-items-center justify-content-between mb-3">
                        <h4>Foto</h4>
                        <button type="submit" class="btn btn-primary text-white"><i class="fa-solid fa-plus"></i></button>
                     </div>
                  </div>
               </div>
            </div>
         </div>

         <hr>

         <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary text-white">
               {{ __('Public') }}
            </button>
         </div>
      </form>
   </div>
@endsection
