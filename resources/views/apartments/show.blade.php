@extends('layouts.backoffice')

@section('title', 'Show')

@section('content')
    <section class="container-fluid overflow-hidden my-5" id="sec_scroll_img">
        <div class="row row-cols-3 flex-nowrap cont_img_scroll">
            <div class="col-6"><img src="https://picsum.photos/1200/800" class="img-fluid" alt="lorem_picsum">
            </div>
            <div class="col-6"><img src="https://picsum.photos/1200/800" class="img-fluid" alt="lorem_picsum">
            </div>
            <div class="col-6"><img src="https://picsum.photos/1200/800" class="img-fluid" alt="lorem_picsum">
            </div>
        </div>
    </section>
    <section class="container my-3" id="sec_ap_descr">
        <div class="row">
            <div class="col-9 py-2 pe-5">
                <div class="row">
                    <div class="col-11 py-2">
                        <h1>Appartamento moderno</h1>
                        <p>Via Verdi 23, Milano, MI</p>
                    </div>
                    <div class="p-3 text-center align-items-center col-1">
                        <span style="font-size:20px" class="p-3 bg-danger text-light rounded">CB</span>
                    </div>
                </div>
                <div class="row row-cols-lg-4 row-cols-md-2 row-cols-sm-1 my-4">
                    <div class="col text-center border-end border-dark py-3">4 posti letto</div>
                    <div class="col text-center border-end border-dark py-3">4 posti letto</div>
                    <div class="col text-center border-end border-dark py-3">4 posti letto</div>
                    <div class="col text-center py-3">4 posti letto</div>
                </div>
                <div class="row my-4 py-3">
                    <h4 class="mb-4">Descrizione</h4>
                    <div>
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Earum amet facere suscipit expedita, rem dolore tempora minima provident id dolorem dicta consequatur, ab corporis aperiam velit eum impedit distinctio iste!
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Earum amet facere suscipit expedita, rem dolore tempora minima provident id dolorem dicta consequatur, ab corporis aperiam velit eum impedit distinctio iste!
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Earum amet facere suscipit expedita, rem dolore tempora minima provident id dolorem dicta consequatur, ab corporis aperiam velit eum impedit distinctio iste!
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Earum amet facere suscipit expedita, rem dolore tempora minima provident id dolorem dicta consequatur, ab corporis aperiam velit eum impedit distinctio iste!
                    </div>
                </div>
                <div class="row my-4">
                    <div class="col">
                        <h4 class="mb-3">Servizi</h4>
                        <div class="row row-cols-4 px-3">
                            <div class="col">
                                <div class="row my-3">
                                    v 4 posti letto
                                </div>
                                <div class="row my-3">
                                    v 4 posti letto
                                </div>
                                <div class="row my-3">
                                    v 4 posti letto
                                </div>
                            </div>
                            <div class="col">
                                <div class="row my-3">
                                    v 4 posti letto
                                </div>
                                <div class="row my-3">
                                    v 4 posti letto
                                </div>
                                <div class="row my-3">
                                    v 4 posti letto
                                </div>
                            </div>
                            <div class="col">
                                <div class="row my-3">
                                    v 4 posti letto
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row w-100 bg-secondary rounded" style="height:30rem"></div>
            </div>
            <div class="col-3">
                <div class="p-3 bg-dark text-white my-2 rounded"> <span style="font-size: 20px;">€ 175 </span> / notte</div>
                <div class="my-3">
                    <input class="py-2 px-3 w-100 rounded" type="text" placeholder="Email">
                </div>
                <div class="my-3">
                    <textarea class="form-control w-100 py-2 px-3 rounded" placeholder="Messaggio" id="floatingTextarea2" rows="10"></textarea>
                </div>
                <button class="px-3 py-2 btn btn-danger w-100 text-light">Invia richiesta</button>
            </div>
        </div>
    </section>
@endsection
