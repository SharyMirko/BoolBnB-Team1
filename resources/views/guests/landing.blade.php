@extends('layouts.frontoffice')

@section('title', 'Welcome')

@section('content')
    <section class="container my-4" id="sec_1">
        <h1>Titolo H1</h1>
        <h2>Titolo H2</h2>
        <input type="text" placeholder="Location" name="Landing-search" id="Landing-search">
        <button type="submit">Cerca</button>
    </section>

    <section class="container my-4 py-4" id="sec_ap_prem">
        <div class="row py-3">
            <div class="col">
                <h2>Titolo H2</h2>
            </div>
        </div>
        <div class="row py-3">
            <div class="col text-end">
                <button class="btn btn-primary">Prec.</button>
                <button class="btn btn-danger">Succ.</button>
            </div>
        </div>
        <div class="row row-cols-3 py-3">
            <div class="col">
                <div class="card">
                    <div class="img_card position-relative">
                        <img src="https://picsum.photos/400/300" class="card-img-top" alt="lorem_picsum">
                        <div class="crown position-absolute top-0 end-0">&#128081;</div>
                        <div class="price_night position-absolute bottom-0 start-0 text-light">--db value-- / notte</div>
                        <div class="user_img position-absolute bottom-0 end-0 text-light">CB</div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Titolo card</h5>
                        <div class="card-text">
                            <p>Luogo</p>
                            <p>Tipo</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="img_card position-relative">
                        <img src="https://picsum.photos/400/300" class="card-img-top" alt="lorem_picsum">
                        <div class="crown position-absolute top-0 end-0">&#128081;</div>
                        <div class="price_night position-absolute bottom-0 start-0 text-light">--db value-- / notte</div>
                        <div class="user_img position-absolute bottom-0 end-0 text-light">CB</div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Titolo card</h5>
                        <div class="card-text">
                            <p>Luogo</p>
                            <p>Tipo</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="img_card position-relative">
                        <img src="https://picsum.photos/400/300" class="card-img-top" alt="lorem_picsum">
                        <div class="crown position-absolute top-0 end-0">&#128081;</div>
                        <div class="price_night position-absolute bottom-0 start-0 text-light">--db value-- / notte</div>
                        <div class="user_img position-absolute bottom-0 end-0 text-light">CB</div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Titolo card</h5>
                        <div class="card-text">
                            <p>Luogo</p>
                            <p>Tipo</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section classes="container my-4 py-4" id="sec_loc_prin">
        <div class="row text-center my-3">
            <h2>Location principali</h2>
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
            <h2>Categorie</h2>
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
@endsection
