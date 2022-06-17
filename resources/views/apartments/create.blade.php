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
                  <input id="title" type="title" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $title ?? old('title') }}" required autocomplete="title" autofocus placeholder="{{ __('Title') }}">

                  @error('title')
                        <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                        </span>
                  @enderror
               </div>
            </div>

            <div class="form-group row mb-2">
               <div class="col-8">
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

               <div class="form-group row mb-2">
                  <div class="col-4">
                     <input id="price" type="price" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ $price ?? old('price') }}" required autocomplete="price" autofocus placeholder="{{ __('Price') }}">

                     @error('price')
                           <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                           </span>
                     @enderror
                  </div>
               </div>
            </div>

         </div>
         <div class="col-12 col-md-5">

         </div>
      </form>
   </div>
@endsection
