@extends('layouts.frontoffice')

@section('title', 'Welcome')

@section('content')

{{-- jumboton --}}
<section id="jumbotron" class="row align-items-center text-center justify-content-center">
   <div class="col col-md-6 col-lg-5 mx-3">
      <h1>Un'esperienza unica</h1>
      <h3 class="my-3">Trova la tua location da sogno</h3>
      <div class="d-flex w-100 align-items-center position-relative">
         <i class="fas fa-search"></i>
         <input type="text" placeholder="Location" name="Landing-search" id="Landing-search" class="me-2 flex-grow-1">
         <a href="{{ route('apartment.index') }}"
            class="btn btn-primary d-flex flex-column justify-content-center align-self-stretch"><span>Cerca</span></a>
      </div>
   </div>
</section>
{{-- / --}}

<main class="container py-4 mt-5 text-center">
   <div class="row mx-auto my-auto justify-content-center">
      <div id="recipeCarousel" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner" role="listbox">

              <div class="carousel-item active">
                  <div class="col-4">
                      <div class="card">
                          <div class="card-img">
                              <img src="https://via.placeholder.com/500x400/31f?text=1" class="img-fluid">
                          </div>
                          <div class="carousel-caption">Slide 1</div>
                      </div>
                  </div>
              </div>

              <div class="carousel-item">
                  <div class="col-4">
                      <div class="card">
                          <div class="card-img">
                              <img src="https://via.placeholder.com/500x400/e66?text=2" class="img-fluid">
                          </div>
                          <div class="carousel-caption">Slide 2</div>
                      </div>
                  </div>
              </div>

              <div class="carousel-item">
                  <div class="col-4">
                      <div class="card">
                          <div class="card-img">
                              <img src="https://via.placeholder.com/500x400/7d2?text=3" class="img-fluid">
                          </div>
                          <div class="carousel-caption">Slide 3</div>
                      </div>
                  </div>
              </div>

              <!-- <div class="carousel-item">
                  <div class="col-md-3">
                      <div class="card">
                          <div class="card-img">
                              <img src="https://via.placeholder.com/500x400?text=4" class="img-fluid">
                          </div>
                          <div class="card-img-overlay">Slide 4</div>
                      </div>
                  </div>
              </div>

              <div class="carousel-item">
                  <div class="col-md-3">
                      <div class="card">
                          <div class="card-img">
                              <img src="https://via.placeholder.com/500x400/aba?text=5" class="img-fluid">
                          </div>
                          <div class="card-img-overlay">Slide 5</div>
                      </div>
                  </div>
              </div>

              <div class="carousel-item">
                  <div class="col-md-3">
                      <div class="card">
                          <div class="card-img">
                              <img src="https://via.placeholder.com/500x400/fc0?text=6" class="img-fluid">
                          </div>
                          <div class="card-img-overlay">Slide 6</div>
                      </div>
                  </div>
              </div> -->

          </div>

          <a class="carousel-control-prev bg-transparent w-aut" href="#recipeCarousel" role="button" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          </a>
          <a class="carousel-control-next bg-transparent w-aut" href="#recipeCarousel" role="button" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
          </a>
      </div>
   </div>
   <!-- <section class="container my-4 py-4" id="sliderVue">


      <div class="row py-3">
         <div class="col">
            <h3>Titolo H3</h3>
         </div>
      </div>

      <div class="row py-3">
         <div class="col text-end">
            <button @click='backward' class="btn btn-primary"> < </button>
            <button @click='forward' class="btn btn-primary"> > </button>
         </div>
      </div>
      
      <div class="row row-cols-3 flex-nowrap overflow-hidden py-3">
         <div v-for='(item, index) in apartments' class="col">

            <div class="card" :class="elementOrder == index ? 'opacity-50' : ''">

               <div class="img_card position-relative">
                  <img src="https://picsum.photos/400/300" class="card-img-top" alt="lorem_picsum">
                  <div class="crown position-absolute top-0 end-0">&#128081;</div>
                  <div class="price_night position-absolute bottom-0 start-0 text-light">--db value-- / notte</div>
                  <div class="user_img position-absolute bottom-0 end-0 text-light">CB</div>
               </div>

               <div class="card-body">
                  <h5 class="card-title">@{{ item.name }}</h5>
                  <div class="card-text">
                     <p>@{{ item.location }}</p>
                     <p>@{{ item.type }}</p>
                  </div>
               </div>

            </div>

         </div>

      </div>
      <div style="text-align:center">
         <span v-for="(dot,index) in apartments" :class="elementOrder == index ? 'opacity-50' : ''" class="dot" onclick="currentSlide()"></span>         
      </div>
   </section> -->

   <section classes="container my-4 py-4" id="sec_loc_prin">
      <div class="row text-center my-3">
         <h3>Location principali</h3>
      </div>
      <div class="row row-cols-2 g-4 text-center">
         <div class="col position-relative">
            <img src="https://picsum.photos/500/400" class="" alt="lorem_picsum">
            <p class="position-absolute bottom-0 start-50 translate-middle-x text-light">Città</p>
         </div>
         <div class="col position-relative">
            <img src="https://picsum.photos/500/400" class="" alt="lorem_picsum">
            <p class="position-absolute bottom-0 start-50 translate-middle-x text-light">Città</p>
         </div>
         <div class="col position-relative">
            <img src="https://picsum.photos/500/400" class="" alt="lorem_picsum">
            <p class="position-absolute bottom-0 start-50 translate-middle-x text-light">Città</p>
         </div>
         <div class="col position-relative">
            <img src="https://picsum.photos/500/400" class="" alt="lorem_picsum">
            <p class="position-absolute bottom-0 start-50 translate-middle-x text-light">Città</p>
         </div>
      </div>
   </section>

   <section class="container my-4 py-4" id="sec_categorie">
      <div class="row text-center">
         <h3>Categorie</h3>
      </div>
      <div class="row row-cols-4 g-4 text-center">
         <div class="col position-relative">
            <img src="https://picsum.photos/500/400" class="img-fluid" alt="lorem_picsum">
            <p class="position-absolute bottom-0 start-50 translate-middle-x text-light">Città</p>
         </div>
         <div class="col position-relative">
            <img src="https://picsum.photos/500/400" class="img-fluid" alt="lorem_picsum">
            <p class="position-absolute bottom-0 start-50 translate-middle-x text-light">Città</p>
         </div>
         <div class="col position-relative">
            <img src="https://picsum.photos/500/400" class="img-fluid" alt="lorem_picsum">
            <p class="position-absolute bottom-0 start-50 translate-middle-x text-light">Città</p>
         </div>
         <div class="col position-relative">
            <img src="https://picsum.photos/500/400" class="img-fluid" alt="lorem_picsum">
            <p class="position-absolute bottom-0 start-50 translate-middle-x text-light">Città</p>
         </div>
      </div>
      <div class="row text-center my-4">
         <div class="col">
            <button class="btn btn-danger">Tutte le categorie</button>
         </div>
      </div>
   </section>
</main>

@endsection