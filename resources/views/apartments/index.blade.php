@extends('layouts.frontoffice')

@section('title', 'Cerca')

@section('content')
   <section id="search" class="container py-5">
      <div class="d-flex w-100 align-items-center position-relative">
         <i class="fas fa-search"></i>
         <input type="text" placeholder="Location" name="Landing-search" id="Landing-search" class="form-control flex-grow-1">

         <button type="button" class="btn-custom-outline btn btn-outline-primary mx-2 " data-bs-toggle="modal" data-bs-target="#filtersModal">
            <i class="fa-solid fa-sliders"></i>
         </button>

         <a href="{{ route('apartment.index') }}" class="btn btn-primary text-light">Cerca</a>
      </div>
   </section>

   <div class="container pb-5">
      <div class="d-flex justify-content-between align-items-center mb-4">
         <span>12 risultati</span>
         <div class="d-flex align-items-center">
            <span class="me-2">Ordinamento:</span>
            <select name="sort" id="sort" class="form-select">
               <option value="1">Alfabetico</option>
               <option value="2">Prezzo crescente</option>
               <option value="2">Prezzo decrescente</option>
            </select>
         </div>
      </div>

      <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3">
         @for ($i = 0; $i < 12; $i++)
            <div class="col">
               <x-card />
            </div>
         @endfor
      </div>
   </div>




   <!-- Modal Filters -->
   <div class="modal fade" id="filtersModal" tabindex="-1" aria-labelledby="filtersModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm modal-dialog-centered">
         <div class="modal-content">

            <div class="modal-header border-0 px-5 pt-4">
               <h2 class="modal-title" id="filtersModalLabel">Filtri di ricerca</h2>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body px-5">
               <form action="" class="d-flex flex-column justify-content-center">
                  @csrf

                  <div class="form-group row mb-2">
                     <div class="col">
                        <input id="area" type="number" class="form-control @error('area') is-invalid @enderror" name="area" value="{{ old('area') }}" required autocomplete="area" autofocus placeholder="{{ __('Area') }}">

                        @error('area')
                           <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                           </span>
                        @enderror
                     </div>
                  </div>

                  <div class="form-group row mb-2">
                     <div class="col">
                        <input id="rooms_n" type="number" class="form-control @error('rooms_n') is-invalid @enderror" name="rooms_n" value="{{ old('rooms_n') }}" required autocomplete="rooms_n" autofocus placeholder="{{ __('Rooms') }}">

                        @error('rooms_n')
                           <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                           </span>
                        @enderror
                     </div>
                  </div>

                  <div class="form-group row mb-2">
                     <div class="col">
                        <input id="beds_n" type="number" class="form-control @error('beds_n') is-invalid @enderror" name="beds_n" value="{{ old('beds_n') }}" required autocomplete="beds_n" autofocus placeholder="{{ __('Beds') }}">

                        @error('beds_n')
                           <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                           </span>
                        @enderror
                     </div>
                  </div>

                  <div class="form-group row">
                     <div class="col">
                        <input id="bathrooms_n" type="number" class="form-control @error('bathrooms_n') is-invalid @enderror" name="bathrooms_n" value="{{ old('bathrooms_n') }}" required autocomplete="bathrooms_n" autofocus placeholder="{{ __('Beds') }}">

                        @error('bathrooms_n')
                           <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                           </span>
                        @enderror
                     </div>
                  </div>

                  <div class="form-group row my-4">
                     <div class="col d-flex justify-content-between">

                        <div class="d-flex flex-column">
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

                        <div class="d-flex flex-column">
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

                  <div class="form-group row mb-2">
                     <div class="col">
                        <div class="mb-3">
                           <label for="distanceRadius" class="form-label">Raggio di Ricerca</label>
                           <input type="range" class="form-range" id="distanceRadius">
                           <div class="d-flex justify-content-between">
                              <span>0 km</span>
                              <span>100 km</span>
                           </div>
                        </div>

                        <div class="mb-3">
                           <label for="price" class="form-label">Prezzo</label>
                           <input type="range" class="form-range" id="price">
                           <div class="d-flex justify-content-between">
                              <span>0 €</span>
                              <span>1500 €</span>
                           </div>
                        </div>
                     </div>
                  </div>

               </form>
            </div>
            <div class="modal-footer border-0 justify-content-center px-5">
               <button type="button" class="btn btn-primary text-white flex-grow-1">Applica filtri</button>
               <button type="button" class="btn-custom-outline btn btn-outline-primary flex-grow-1" data-bs-dismiss="modal">Reset filtri</button>
            </div>
         </div>
      </div>
   </div>
@endsection
