@extends('layouts.layout')

@section('title', 'Aggiungi appartamento')

@section('content')



   <div id="createModal" class="container py-5">
      <h3 class="backoffice-title mb-5"><a href="{{ route('admin.dashboard') }}" class="text-muted"><i class="fa-solid fa-arrow-left fs-5"></i></a> Aggiungi appartamento</h3>
      <form method="POST" action="{{ route('admin.apartments.store') }}" @change="createApartmentForm" id="input-form" enctype="multipart/form-data">
         @csrf

         <div class="row g-0">
            {{-- colonna sx --}}
            <div class="col-12 col-md-7">
               <h4 class="mb-3">Dati generali</h4>

               {{-- titolo e area --}}
               <div class="form-group row mb-2 gx-2">
                  <div class="col">
                     <input type="hidden" v-model="hiddenlat" name="latitude">
                     <input type="hidden" v-model="hiddenlon" name="longitude">

                     <input id="title" v-model="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $title ?? old('title') }}" required autocomplete="title" autofocus placeholder="{{ __('Title') }}">

                     @error('title')
                           <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                           </span>
                     @enderror
                  </div>
                  <div class="col-4 col-md-5 col-lg-4">
                     <input id="area" v-model="area" type="number" class="form-control @error('area') is-invalid @enderror" name="area" value="{{ $area ?? old('area') }}" required autocomplete="area" autofocus placeholder="{{ __('Mt Quadri') }}">

                     @error('area')
                        <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                        </span>
                     @enderror
                  </div>
               </div>
               {{-- / --}}

               {{-- categoria e prezzo --}}
               <div class="form-group row mb-2 gx-2">
                  <div class="col-8 col-md-7 col-lg-8">
                     <select name="category" v-model="category" class="form-select @error('category') is-invalid @enderror" id="category">
                        <option selected disabled hidden value="">Seleziona categoria</option>
                        @foreach ($categoryData as $category)
                           <option value="{{ $category->name }}">{{ $category->name }}</option>
                        @endforeach
                     </select>

                     @error('category')
                           <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                           </span>
                     @enderror
                  </div>

                  <div class="col-4 col-md-5 col-lg-4">
                     <input id="price" v-model="price" type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ $price ?? old('price') }}" required autocomplete="price" autofocus placeholder="€ {{ __('Price') }}/notte">

                     @error('price')
                        <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                        </span>
                     @enderror
                  </div>
               </div>
               {{-- / --}}

               {{-- stanze, bagni, letti --}}
               <div class="form-group row mb-2 gx-2">
                  <div class="col-4 col-md-5 col-lg-4">
                     <input id="rooms_n" v-model="rooms_n" type="number" class="form-control @error('rooms_n') is-invalid @enderror" name="rooms_n" value="{{ $rooms_n ?? old('rooms_n') }}" required autocomplete="rooms_n" autofocus placeholder=" {{ __('N. Stanze') }}">

                     @error('rooms_n')
                        <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                        </span>
                     @enderror
                  </div>
                  <div class="col-4 col-md-5 col-lg-4">
                     <input id="beds_n" v-model="beds_n" type="number" class="form-control @error('beds_n') is-invalid @enderror" name="beds_n" value="{{ $beds_n ?? old('beds_n') }}" required autocomplete="beds_n" autofocus placeholder="{{ __('N. Letti') }}">

                     @error('beds_n')
                        <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                        </span>
                     @enderror
                  </div>
                  <div class="col-4 col-md-5 col-lg-4">
                     <input id="bathrooms_n" v-model="bathrooms_n" type="number" class="form-control @error('bathrooms_n') is-invalid @enderror" name="bathrooms_n" value="{{ $bathrooms_n ?? old('bathrooms_n') }}" required autocomplete="bathrooms_n" autofocus placeholder="{{ __('N. Bagni') }}">

                     @error('bathrooms_n')
                        <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                        </span>
                     @enderror
                  </div>
               </div>
               {{-- / --}}

               {{-- descrizione --}}
               <div class="form-group row mb-2 text-center">
                  <div class="col">
                     <textarea class="form-control @error('description') is-invalid @enderror" v-model="description" id="description" name="description" rows="10" cols="50" autofocus placeholder="{{ __('Description') }}" required></textarea>

                     @error('description')
                        <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                        </span>
                     @enderror
                  </div>
               </div>
               {{-- / --}}

               {{-- checkbox --}}
               <div class="form-group my-4">
                  <h4 class="mb-3">Servizi</h4>
                  <div class="row row-cols-2 row-cols-sm-3 row-cols-md-2 row-cols-lg-3 g-0">

                     <div class="col d-flex flex-column ">
                        <div class="form-check">
                           <input type="checkbox" v-model="service[0]" name="service[]" class="form-check-input" value="{{$serviceData[0]['id']}}" id="{{$serviceData[0]['name']}}">
                           <label class="form-check-label" for="{{$serviceData[0]['name']}}">{{$serviceData[0]['name']}}</label>
                        </div>

                        <div class="form-check">
                           <input type="checkbox"  v-model="service[1]" name="service[]" class="form-check-input" value="{{$serviceData[1]['id']}}" id="{{$serviceData[1]['name']}}">
                           <label class="form-check-label" for="{{$serviceData[1]['name']}}">{{$serviceData[1]['name']}}</label>
                        </div>

                        <div class="form-check">
                           <input type="checkbox"  v-model="service[2]" name="service[]" class="form-check-input" value="{{$serviceData[2]['id']}}" id="{{$serviceData[2]['name']}}">
                           <label class="form-check-label" for="{{$serviceData[2]['name']}}">{{$serviceData[2]['name']}}</label>
                        </div>
                     </div>

                     <div class="col d-flex flex-column">
                        <div class="form-check">
                           <input type="checkbox"  v-model="service[3]" name="service[]" class="form-check-input" value="{{$serviceData[3]['id']}}" id="{{$serviceData[3]['name']}}">
                           <label class="form-check-label" for="{{$serviceData[3]['name']}}">{{$serviceData[3]['name']}}</label>
                        </div>

                        <div class="form-check">
                           <input type="checkbox"  v-model="service[4]" name="service[]" class="form-check-input" value="{{$serviceData[4]['id']}}" id="{{$serviceData[4]['name']}}">
                           <label class="form-check-label" for="{{$serviceData[4]['name']}}">{{$serviceData[4]['name']}}</label>
                        </div>


                     </div>
                  </div>
               </div>
               {{-- / --}}
            </div>

            {{-- colonna dx --}}
            <div class="col-12 col-md-5 gx-5">
               <h4 class="mb-3">Location</h4>
               <div class="form-group row mb-2">
                  <div class="col">
                     <input id="city" v-model="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ $city ?? old('city') }}" required autocomplete="city" autofocus placeholder="{{ __('Città') }}">

                     @error('city')
                           <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                           </span>
                     @enderror
                  </div>
               </div>

               <div class="form-group row mb-5">
                  <div class="col">
                     <input id="address" v-model="address" @change="addressSearch" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ $address ?? old('address') }}" required autocomplete="address" autofocus placeholder="{{ __('Indirizzo') }}">

                     @error('address')
                        <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                        </span>
                     @enderror
                  </div>
               </div>

               <div class="form-group row">
                  <div class="col">
                     <h4 class="mb-3">Foto</h4>
                     <img src="" id="thumb-preview" class="img-fluid mb-2">

                     <input class="form-control" type="file" id="thumbCreate" name="thumb" accept="image/*">

                     @error('thumb')
                        <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                  </div>
               </div>
            </div>
         </div>

         <hr>

         <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary text-white" disabled="true">
               {{ __('Public') }}
            </button>
         </div>
      </form>
   </div>
@endsection
