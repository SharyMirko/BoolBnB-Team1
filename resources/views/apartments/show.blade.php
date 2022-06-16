@extends('layouts.frontoffice')

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
                  <h1>Appartamento moderno</h1>
                  <p class="price my-2 d-md-none">€ 420<span class="price-suffix">/notte</span></p>
                  <p class="geo icon">Via Verdi 23, Milano, MI</p>
               </div>
               <div class="p-2 bg-secondary text-white rounded fw-bold">CB</div>
               {{-- <div class="col-1"></div> --}}
            </div>
            <div class="row row-cols-2 row-cols-lg-4 mb-5 align-items-center g-0">
               <div class="col text-center py-3">
                  <div class="d-flex ">
                     <div class="flex-grow-1">
                        <i class="fa-solid fa-bed fs-3"></i>
                        <div>4 posti letto</div>
                     </div>
                     <div class="separator d-none d-lg-block p-0"></div>
                  </div>
               </div>
               <div class="col text-center py-3">
                  <div class="d-flex">
                     <div class=" flex-grow-1">
                        <i class="fa-solid fa-bath fs-3"></i>
                        <div>2 bagni</div>
                     </div>
                     <div class="separator d-none d-lg-block p-0"></div>
                  </div>
               </div>
               <div class="col text-center py-3">
                  <div class="d-flex">
                     <div class=" flex-grow-1">
                        <i class="fa-solid fa-vector-square fs-3"></i>
                        <div>166 mq</div>
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
                     Lorem ipsum dolor sit amet consectetur, adipisicing elit. Earum amet facere suscipit expedita, rem dolore tempora minima provident id dolorem dicta consequatur, ab corporis aperiam velit eum impedit distinctio iste!
                     Lorem ipsum dolor sit amet consectetur, adipisicing elit. Earum amet facere suscipit expedita, rem dolore tempora minima provident id dolorem dicta consequatur, ab corporis aperiam velit eum impedit distinctio iste!
                     Lorem ipsum dolor sit amet consectetur, adipisicing elit. Earum amet facere suscipit expedita, rem dolore tempora minima provident id dolorem dicta consequatur, ab corporis aperiam velit eum impedit distinctio iste!
                     Lorem ipsum dolor sit amet consectetur, adipisicing elit. Earum amet facere suscipit expedita, rem dolore tempora minima provident id dolorem dicta consequatur, ab corporis aperiam velit eum impedit distinctio iste!
               </div>
            </div>
            <div class="row mb-5 g-0">
               <div class="col">
                  <h4 class="mb-3">Servizi</h4>
                  <div class="row row-cols-2 row-cols-sm-4">
                     <div class="col">
                        <p class="service-list icon">4 Posti letto</p>
                        <p class="service-list icon">2 bagni</p>
                        <p class="service-list icon">WiFi</p>
                     </div>
                     <div class="col">
                        <p class="service-list icon">Sauna</p>
                        <p class="service-list icon">Piscina</p>
                        <p class="service-list icon">Posto auto</p>
                     </div>
                     <div class="col">
                        <p class="service-list icon">Portineria</p>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row w-100 g-0">
               <h4 class="mb-3">Location</h4>
               <iframe class="w-100 rounded-3 border overflow-hidden" height="500" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2798.04318883717!2d9.188104899999999!3d45.46893389999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4786c6b25e5ea1e3%3A0xf48cc86e39a35fe4!2sVia%20Giuseppe%20Verdi%2C%2023%2C%2020121%20Milano%20MI!5e0!3m2!1sit!2sit!4v1655374106036!5m2!1sit!2sit" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
         </div>
         {{-- / --}}



         {{-- form invio messaggio --}}
         <div class="d-none d-md-block col-md-4 col-lg-3 mt-5">
            <div class="price m-0 py-2 px-3 text-white rounded-3 mb-2" id="price">€ 420<span class="price-suffix">/notte</span></div>
            <form action="">
               <div class="form-group row mb-2 text-center">
                  <div class="col">
                     <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus placeholder="{{ __('E-Mail Address') }}">

                     @error('email')
                           <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                           </span>
                     @enderror
                  </div>
               </div>

               <div class="form-group row mb-2 text-center">
                  <div class="col">
                     <textarea class="form-control @error('text_ms') is-invalid @enderror" id="text_ms" name="text_ms" rows="6" cols="50" autofocus placeholder="{{ __('Message') }}" required></textarea>

                     @error('text_ms')
                        <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                        </span>
                     @enderror
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
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus placeholder="{{ __('E-Mail Address') }}">

                        @error('email')
                              <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                              </span>
                        @enderror
                     </div>
                  </div>

                  <div class="form-group row mb-2 text-center">
                     <div class="col">
                        <textarea class="form-control @error('text_ms') is-invalid @enderror" id="text_ms" name="text_ms" rows="6" cols="50" autofocus placeholder="{{ __('Message') }}" required></textarea>

                        @error('text_ms')
                           <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                           </span>
                        @enderror
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
