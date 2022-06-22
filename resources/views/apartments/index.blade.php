@extends('layouts.layout')

@section('title', 'Cerca')

@section('content')
    <div id="searchApp">
        <section id="search" class="container py-5">
            <div class="d-flex w-100 align-items-center position-relative">
                <i class="fas fa-search"></i>
                <input type="text" v-model="location" placeholder="Location" name="Landing-search"
                    id="Landing-search" class="form-control flex-grow-1">

                <button type="button" class="btn-custom-outline btn btn-outline-primary mx-2 " data-bs-toggle="modal"
                    data-bs-target="#filtersModal">
                    <i class="fa-solid fa-sliders"></i>
                </button>

                <button @click="search" class="btn btn-primary text-light">Cerca</button>
            </div>
        </section>

        <div class="container pb-5">
            <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">
               <span class="mt-4 mt-sm-0 me-4">@{{ nRes }} risultati</span>
            </div>

            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
               <div class="col" v-for="apart in results">
                  <article class="card rounded-3 border-0">
                     <a class="m-0 p-0 d-block" v-bind:href="link + apart.id">
                        <div class="card-img-top position-relative">
                           <div class="position-absolute w-100 h-100 filtro-card"></div>
                           <img :src="apart.thumb" class="card-img-top"
                              alt="lorem_picsum">

                           <div class="crown"></div>

                           {{-- <div class="user-avatar position-absolute"><span class="m-0 p-0">@{{ apart.user.first_name.substring(0, 1) }}@{{ apart.user.last_name.substring(0, 1) }}</span></div> --}}
                        </div>
                        <div class="card-body text-muted">
                           <h5 class="card-title">@{{ apart.title }}</h5>
                           <p class="geo icon mb-0">@{{ apart.address }}</p>
                           <p class="city">@{{ apart.city }}</p>
                           <div class="d-flex justify-content-between align-items-end flex-wrap">
                              <p class="price-text m-0">€ @{{ apart.price }}<span class="price-suffix">/notte</span></p>
                              <p class="category m-0">@{{ apart.category }}</p>
                           </div>
                        </div>
                     </a>
                  </article>
               </div>
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
                                    <input id="rooms_n" v-model="nRooms" type="number"
                                        class="form-control @error('rooms_n') is-invalid @enderror" name="rooms_n"
                                        value="{{ old('rooms_n') }}" required autocomplete="rooms_n" autofocus
                                        placeholder="{{ __('Rooms') }}">

                                    @error('rooms_n')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-2">
                                <div class="col">
                                    <input id="beds_n" v-model="nBeds" type="number"
                                        class="form-control @error('beds_n') is-invalid @enderror" name="beds_n"
                                        value="{{ old('beds_n') }}" required autocomplete="beds_n" autofocus
                                        placeholder="{{ __('Beds') }}">

                                    @error('beds_n')
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
                                            <input type="checkbox" @change="setService($event)" class="form-check-input" value="1"
                                                id="wifi">
                                            <label class="form-check-label" for="wifi">WiFi</label>
                                        </div>

                                        <div class="form-check">
                                            <input type="checkbox" @change="setService($event)" class="form-check-input" value="2"
                                                id="sauna">
                                            <label class="form-check-label" for="sauna">Sauna</label>
                                        </div>

                                        <div class="form-check">
                                            <input type="checkbox" @change="setService($event)" class="form-check-input" value="5"
                                                id="Portineria">
                                            <label class="form-check-label" for="Portineria">Portineria</label>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-column">
                                        <div class="form-check">
                                            <input type="checkbox" @change="setService($event)" class="form-check-input" value="4"
                                                id="Posto-auto">
                                            <label class="form-check-label" for="Posto auto">Posto auto</label>
                                        </div>

                                        <div class="form-check">
                                            <input type="checkbox" @change="setService($event)" class="form-check-input" value="3"
                                                id="wifi">
                                            <label class="form-check-label" for="Piscina">Piscina</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-2">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="distance-radius" class="form-label">Raggio di Ricerca</label>
                                        <input type="range" class="form-range" id="distance-radius">
                                        <div class="d-flex justify-content-between">
                                            <span>0 km</span>
                                            <span>100 km</span>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="price-range" class="form-label">Prezzo</label>
                                        <input type="range" class="form-range" id="price-range">
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
                        <button type="button" @click="applyFilter" class="btn btn-primary text-white flex-grow-1" data-bs-dismiss="modal">Applica filtri</button>
                        <button type="button" class="btn-custom-outline btn btn-outline-primary flex-grow-1"
                            data-bs-dismiss="modal">Reset filtri</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
