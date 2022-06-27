@extends('layouts.layout')

@section('title', 'Modifica appartamento')

@section('content')
   <div id="createModal" class="container py-5">
      <h3 class="backoffice-title mb-5"><a href="{{ route('admin.dashboard') }}" class="text-muted"><i class="fa-solid fa-arrow-left fs-5"></i></a> Modifica appartamento</h3>
      <form method="POST" action="{{ route('apartments.update', $apartment->id) }}" id="input-form" enctype="multipart/form-data">
         @csrf
         @method('PUT')

         <div class="row g-0">
            {{-- colonna sx --}}
            <div class="col-12 col-md-7">
               <h4 class="mb-3">Dati generali</h4>

               {{-- titolo e area --}}
               <div class="form-group row mb-2 gx-2">
                  <div class="col">
                     <input type="hidden" v-model="hiddenlat" name="latitude">
                     <input type="hidden" v-model="hiddenlon" name="longitude">

                     <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title', $apartment->title) }}" required autocomplete="title" autofocus placeholder="{{ __('Title') }}">

                     @error('title')
                        <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                        </span>
                     @enderror
                  </div>
                  <div class="col-4 col-md-5 col-lg-4">
                     <input id="area" type="number" class="form-control @error('area') is-invalid @enderror" name="area" value="{{ old('area', $apartment->area) }}" required autocomplete="area" autofocus placeholder="{{ __('Mt Quadri') }}">

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

                     <select name="category" class="form-select @error('category') is-invalid @enderror" id="category" >
                        <option selected disabled hidden value="">Seleziona categoria</option>
                        @foreach ($categoryData as $category)
                           <option value="{{ $category->name }}" @if($apartment->category == $category->name) selected @endif>{{ $category->name }}</option>
                        @endforeach
                     </select>

                     @error('category')
                        <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                        </span>
                     @enderror
                  </div>

                  <div class="col-4 col-md-5 col-lg-4">
                     <input id="price" type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price', $apartment->price) }}" required autocomplete="price" autofocus placeholder="€ {{ __('Price') }}/notte">

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
                     <input id="rooms_n" type="number" class="form-control @error('rooms_n') is-invalid @enderror" name="rooms_n" value="{{ old('rooms_n', $apartment->rooms_n) }}" required autocomplete="rooms_n" autofocus placeholder=" {{ __('N. Stanze') }}">

                     @error('rooms_n')
                        <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                        </span>
                     @enderror
                  </div>
                  <div class="col-4 col-md-5 col-lg-4">
                     <input id="beds_n" type="number" class="form-control @error('beds_n') is-invalid @enderror" name="beds_n" value="{{ old('beds_n', $apartment->beds_n) }}" required autocomplete="beds_n" autofocus placeholder="{{ __('N. Letti') }}">

                     @error('beds_n')
                        <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                        </span>
                     @enderror
                  </div>
                  <div class="col-4 col-md-5 col-lg-4">
                     <input id="bathrooms_n" type="number" class="form-control @error('bathrooms_n') is-invalid @enderror" name="bathrooms_n" value="{{ old('bathrooms_n', $apartment->bathrooms_n) }}" required autocomplete="bathrooms_n" autofocus placeholder="{{ __('N. Bagni') }}">

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
                     <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="10" cols="50" autofocus placeholder="{{ __('Description') }}" required>{{ old('description', $apartment->description) }}</textarea>

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

                        @foreach ($serviceData as $service)

                           <div class="form-check">



                              @foreach ($ciao as $c)

                                 @if ($c->id == $service->id)
                                    <input type="checkbox" name="serviceData[]" class="form-check-input" value="{{ $service->id }}" id="service-{{ $service->id }}" checked>
                                 @else
                                    <input type="checkbox" name="serviceData[]" class="form-check-input" value="{{ $service->id }}" id="service-{{ $service->id }}">
                                 @endif

                              @endforeach


                              <label class="form-check-label" for="{{ $service->name }}">{{ $service->name }}</label>

                           </div>
                        @endforeach

{{--
                        <div class="form-check">
                           <input type="checkbox" name="service[]" class="form-check-input" value="{{$serviceData[1]['id']}}" id="{{$serviceData[1]['name']}}">
                           <label class="form-check-label" for="{{$serviceData[1]['name']}}">{{$serviceData[1]['name']}}</label>
                        </div>

                        <div class="form-check">
                           <input type="checkbox" name="service[]" class="form-check-input" value="{{$serviceData[2]['id']}}" id="{{$serviceData[2]['name']}}">
                           <label class="form-check-label" for="{{$serviceData[2]['name']}}">{{$serviceData[2]['name']}}</label>
                        </div> --}}
                     </div>

                     {{-- <div class="col d-flex flex-column">
                        <div class="form-check">
                           <input type="checkbox" name="service[]" class="form-check-input" value="{{$serviceData[3]['id']}}" id="{{$serviceData[3]['name']}}">
                           <label class="form-check-label" for="{{$serviceData[3]['name']}}">{{$serviceData[3]['name']}}</label>
                        </div>

                        <div class="form-check">
                           <input type="checkbox" name="service[]" class="form-check-input" value="{{$serviceData[4]['id']}}" id="{{$serviceData[4]['name']}}">
                           <label class="form-check-label" for="{{$serviceData[4]['name']}}">{{$serviceData[4]['name']}}</label>
                        </div>
                     </div> --}}

                  </div>
               </div>
               {{-- / --}}
            </div>

            {{-- colonna dx --}}
            <div class="col-12 col-md-5 gx-md-5">
               <h4 class="mb-3">Location</h4>
               <div class="form-group row mb-2">
                  <div class="col">
                     <input id="city" v-model="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city', $apartment->city) }}" required autocomplete="city" autofocus placeholder="{{ __('Città') }}">

                     @error('city')
                           <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                           </span>
                     @enderror
                  </div>
               </div>

               <div class="form-group row mb-4">
                  <div class="col">
                     <input id="address" value="{{ old('address', $apartment->address) }}" v-model="address" @change="addressSearch" type="text" class="form-control @error('address') is-invalid @enderror" name="address" required autocomplete="address" autofocus placeholder="{{ __('Indirizzo') }}">

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
                     @if (str_contains( $apartment->thumb, 'uploads'))
                        <img src="{{ asset('storage/' . $apartment->thumb) }}" alt="{{ $apartment->title }}" class="img-fluid">
                     @else
                        <img src="{{ $apartment->thumb }}" class="img-fluid mb-2" alt="{{ $apartment->title }}">
                     @endif

                     <input class="form-control mt-2" type="file" id="thumb" name="thumb" accept="image/*">

                     @error('thumb')
                        <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                  </div>
               </div>
            </div>
         </div>

         <hr>

         <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary text-white">
               {{ __('Update') }}
            </button>
         </div>
      </form>
   </div>
@endsection
