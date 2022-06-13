@extends('layouts.frontoffice')

@section('title', 'Welcome')

@section('content')
<div class="container mt-10">
<div class="input-group rounded">
    <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search"
        aria-describedby="search-addon" />
    <button>filtro</button>
    <span class="input-group-text border-0" id="search-addon">
        <i class="fas fa-search"></i>
    </span>
</div>

<div class="row py-3 dropdown-filter">
    <div class="col">
        <input type="text" placeholder="Stanze" name="" id="">
        <input type="text" placeholder="Letti" name="" id="">
        <input type="text" placeholder="Bagni" name="" id="">
        <input type="text" placeholder="Mq" name="" id="">
    </div>
    <div class="col">
        <input type="checkbox" name="" id="">WiFi
        <input type="checkbox" name="" id="">Sauna
        <input type="checkbox" name="" id="">Portineria
        <input type="checkbox" name="" id="">Posto Auto
        <input type="checkbox" name="" id="">Piscina
        <input type="checkbox" name="" id="">Vista Panoramica
    </div>
    <div class="col">
        <label for="customRange1" class="form-label">Raggio di Ricerca</label>
        <input type="range" class="form-range" id="customRange1">
        <label for="customRange1" class="form-label">Prezzo</label>
        <input type="range" class="form-range" id="customRange1">
    </div>
    <div class="col">
        <button class="btn btn-primary">Applica Filtri</button>
        <button class="btn btn-info">Reset Filtri</button>
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
                <h5 class="card-title">
                    <a class="navbar-brand text-dark" href="{{ route('ShowPage') }}">
                        Titolo card
                    </a>
                </h5>
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
                <h5 class="card-title">
                    <a class="navbar-brand text-dark" href="{{ route('ShowPage') }}">
                        Titolo card
                    </a>
                </h5>
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
                <h5 class="card-title">
                    <a class="navbar-brand text-dark" href="{{ route('ShowPage') }}">
                        Titolo card
                    </a>
                </h5>
                <div class="card-text">
                    <p>Luogo</p>
                    <p>Tipo</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row row-cols-3 py-3">
    <div class="col">
        <div class="card">
            <div class="img_card position-relative">
                <img src="https://picsum.photos/400/300" class="card-img-top" alt="lorem_picsum">
                <div class="price_night position-absolute bottom-0 start-0 text-light">--db value-- / notte</div>
                <div class="user_img position-absolute bottom-0 end-0 text-light">CB</div>
            </div>
            <div class="card-body">
                <h5 class="card-title">
                    <a class="navbar-brand text-dark" href="{{ route('ShowPage') }}">
                        Titolo card
                    </a>
                </h5>
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
                <div class="price_night position-absolute bottom-0 start-0 text-light">--db value-- / notte</div>
                <div class="user_img position-absolute bottom-0 end-0 text-light">CB</div>
            </div>
            <div class="card-body">
                <h5 class="card-title">
                    <a class="navbar-brand text-dark" href="{{ route('ShowPage') }}">
                        Titolo card
                    </a>
                </h5>
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
                <div class="price_night position-absolute bottom-0 start-0 text-light">--db value-- / notte</div>
                <div class="user_img position-absolute bottom-0 end-0 text-light">CB</div>
            </div>
            <div class="card-body">
                <h5 class="card-title">
                    <a class="navbar-brand text-dark" href="{{ route('ShowPage') }}">
                        Titolo card
                    </a>
                </h5>
                <div class="card-text">
                    <p>Luogo</p>
                    <p>Tipo</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row row-cols-3 py-3">
    <div class="col">
        <div class="card">
            <div class="img_card position-relative">
                <img src="https://picsum.photos/400/300" class="card-img-top" alt="lorem_picsum">
                <div class="price_night position-absolute bottom-0 start-0 text-light">--db value-- / notte</div>
                <div class="user_img position-absolute bottom-0 end-0 text-light">CB</div>
            </div>
            <div class="card-body">
                <h5 class="card-title">
                    <a class="navbar-brand text-dark" href="{{ route('ShowPage') }}">
                        Titolo card
                    </a>
                </h5>
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
                <div class="price_night position-absolute bottom-0 start-0 text-light">--db value-- / notte</div>
                <div class="user_img position-absolute bottom-0 end-0 text-light">CB</div>
            </div>
            <div class="card-body">
                <h5 class="card-title">
                    <a class="navbar-brand text-dark" href="{{ route('ShowPage') }}">
                        Titolo card
                    </a>
                </h5>
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
                <div class="price_night position-absolute bottom-0 start-0 text-light">--db value-- / notte</div>
                <div class="user_img position-absolute bottom-0 end-0 text-light">CB</div>
            </div>
            <div class="card-body">
                <h5 class="card-title">
                    <a class="navbar-brand text-dark" href="{{ route('ShowPage') }}">
                        Titolo card
                    </a>
                </h5>
                <div class="card-text">
                    <p>Luogo</p>
                    <p>Tipo</p>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection