@extends('layouts.layout')

@section('title', 'Appartamento moderno')

@section('content')
   <section class="container-fluid overflow-hidden py-4 py-md-5" id="sec_scroll_img">
      <div class="row row-cols-1 row-cols-md-3 flex-nowrap cont_img_scroll g-3">
            <div class="col"><img src="https://picsum.photos/1200/800?random=<?= rand(1, 500) ?>" class="img-fluid" alt="lorem_picsum">
            </div>
            <div class="col"><img src="https://picsum.photos/1200/800?random=<?= rand(1, 500) ?>" class="img-fluid" alt="lorem_picsum">
            </div>
            <div class="col"><img src="https://picsum.photos/1200/800?random=<?= rand(1, 500) ?>" class="img-fluid" alt="lorem_picsum">
            </div>
      </div>
   </section>

   <section class="container" id="sec_ap_descr">
      <div class="row g-0 g-md-5">
         {{-- descrizione --}}
         <div class="col-12 col-md-8 col-lg-9">
            <div class="d-flex align-items-start mb-5">
               <div class="flex-grow-1">
                  <h1>{{ $apartment->title }}</h1>
                  <p class="price-text my-2 d-md-none">€{{ $apartment->price }}<span class="price-suffix">/notte</span></p>
                  <p class="geo icon">{{ $apartment->address }}</p>
               </div>
               <div class="p-2 bg-secondary text-white rounded fw-bold">CB</div>
               {{-- <div class="col-1"></div> --}}
            </div>
            <div class="row row-cols-2 row-cols-lg-4 mb-5 align-items-center g-0">
               <div class="col text-center py-3">
                  <div class="d-flex ">
                     <div class="flex-grow-1">
                        <i class="fa-solid fa-bed fs-3"></i>
                        <div>{{ $apartment->beds_n }}</div>
                     </div>
                     <div class="separator d-none d-lg-block p-0"></div>
                  </div>
               </div>
               <div class="col text-center py-3">
                  <div class="d-flex">
                     <div class=" flex-grow-1">
                        <i class="fa-solid fa-bath fs-3"></i>
                        <div>{{ $apartment->bathrooms_n }}</div>
                     </div>
                     <div class="separator d-none d-lg-block p-0"></div>
                  </div>
               </div>
               <div class="col text-center py-3">
                  <div class="d-flex">
                     <div class=" flex-grow-1">
                        <i class="fa-solid fa-vector-square fs-3"></i>
                        <div>{{ $apartment->area }} mq</div>
                     </div>
                     <div class="separator d-none d-lg-block p-0"></div>
                  </div>
               </div>
               <div class="col text-center py-3">
                  <i class="fa-solid fa-wifi fs-3"></i><div>WiFi</div>
               </div>
            </div>
            <div class="row mb-5 g-0">
               <h4 class="mb-3">Descrizione</h4>
               <div>
                  {{ $apartment->description }}
               </div>
            </div>
            <div class="row mb-5 g-0">
               <div class="col">
                  <h4 class="mb-3">Servizi</h4>
                  <div class="row row-cols-2 row-cols-sm-4">
                     <div class="col">
                        @foreach ($services as $service)
                        <p class="service-list icon">{{$service->name}}</p>
                        @endforeach
                     </div>
                  </div>
               </div>
            </div>
            <div class="row w-100 g-0">
               <h4 class="mb-3">Location</h4>
               <div id='map' class="map w-100 rounded-3 border overflow-hidden" ></div>
            </div>
         </div>
         {{-- / --}}



         {{-- form invio messaggio --}}
         <div class="d-none d-md-block col-md-4 col-lg-3 mt-5">
            <div class="price m-0 py-2 px-3 text-white rounded-3 mb-2" id="price-show">€ {{ $apartment->price }}<span class="price-suffix">/notte</span></div>
            <form action="">
               <div class="form-group row mb-2 text-center">
                  <div class="col">
                     <input id="email" type="email" class="form-control" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus placeholder="{{ __('E-Mail Address') }}">

                     
                  </div>
               </div>

               <div class="form-group row mb-2 text-center">
                  <div class="col">
                     <textarea class="form-control" id="text_ms" name="text_ms" rows="6" cols="50" autofocus placeholder="{{ __('Message') }}" required></textarea>

                    
                  </div>
               </div>

               <button type="submit" class="btn btn-primary text-white w-100">
                  {{ __('Send message') }}
               </button>
            </form>
         </div>
         {{-- / --}}


         {{-- pulsante modale solo mobile --}}
         <div class="fixed-bottom w-100 p-4 d-flex d-md-none">
            <button type="button" id="send-msg-mobile" class="btn btn-primary text-white ms-auto" data-bs-toggle="modal" data-bs-target="#sendMessageModal">
               <i class="fa-solid fa-envelope"></i>
            </button>
         </div>
      </div>
      <div id="latitude">{{ $apartment->latitude}}</div>
      <div id="longitude">{{ $apartment->longitude}}</div>
   </section>









   <!-- Modale messaggio, solo mobile -->
   <div class="modal fade" id="sendMessageModal" tabindex="-1" aria-labelledby="sendMessageModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content">
            <div class="modal-header border-0 px-4 pb-0">
               <h5 class="modal-title" id="sendMessageModalLabel">Messaggio al proprietario</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body px-4">
               <form action="">
                  <div class="form-group row mb-2 text-center">
                     <div class="col">
                        <input id="email" type="email" class="form-control" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus placeholder="{{ __('E-Mail Address') }}">

                        
                     </div>
                  </div>

                  <div class="form-group row mb-2 text-center">
                     <div class="col">
                        <textarea class="form-control" id="text_ms" name="text_ms" rows="6" cols="50" autofocus placeholder="{{ __('Message') }}" required></textarea>

                        
                     </div>
                  </div>

                  <button type="submit" class="btn btn-primary text-white w-100">
                     {{ __('Send message') }}
                  </button>
               </form>
            </div>
         </div>
      </div>
   </div>

@endsection
