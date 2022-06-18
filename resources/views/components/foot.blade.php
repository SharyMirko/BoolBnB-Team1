<footer class="mt-5">
   <div class="container">
      <div class="row py-5">

         <div class="col-12 col-md-3 me-md-5 mb-4">
            <img src="{{ asset('img/logo_light.svg') }}" alt="BoolBnB" class="logo">
            <p class="my-3">BoolBnB è una piattaforma che ti consente di affittare il tuo immobile in modo semplice e veloce.</p>
         </div>

         <div class="col-12 col-sm-3 col-md-2 mb-4">
            <h5>Categorie</h5>
            <nav>
               <ul class="nav flex-column">
                  <li class="nav-item mb-2"><a href="{{ route('admin.apartments.index') }}" class="nav-link p-0 text-muted">Appartamenti</a></li>
                  <li class="nav-item mb-2"><a href="{{ route('admin.apartments.index') }}" class="nav-link p-0 text-muted">Stanze</a></li>
                  <li class="nav-item mb-2"><a href="{{ route('admin.apartments.index') }}" class="nav-link p-0 text-muted">Ville singole</a></li>
                  <li class="nav-item mb-2"><a href="{{ route('admin.apartments.index') }}" class="nav-link p-0 text-muted">Villette</a></li>
                  <li class="nav-item mb-2"><a href="{{ route('admin.apartments.index') }}" class="nav-link p-0 text-muted">Casali</a></li>
               </ul>
            </nav>

         </div>

         <div class="col-12 col-sm-3 col-md-2 mb-4">
            <h5>Location</h5>
            <nav>
               <ul class="nav flex-column">
                  <li class="nav-item mb-2"><a href="{{ route('admin.apartments.index') }}" class="nav-link p-0 text-muted">Roma</a></li>
                  <li class="nav-item mb-2"><a href="{{ route('admin.apartments.index') }}" class="nav-link p-0 text-muted">Milano</a></li>
                  <li class="nav-item mb-2"><a href="{{ route('admin.apartments.index') }}" class="nav-link p-0 text-muted">Napoli</a></li>
                  <li class="nav-item mb-2"><a href="{{ route('admin.apartments.index') }}" class="nav-link p-0 text-muted">Vibo Valentia</a></li>
               </ul>
            </nav>
         </div>

         <div class="col-12 col-sm-3 col-md-2">
            <h5>Contatti</h5>
            <nav>
               <ul class="nav flex-column">
                  <li class="nav-item mb-2"><a href="#" class="nav-link p-0">info@boolbnb.it</a></li>
               </ul>
            </nav>
         </div>
      </div>
      </div>

      <div class="p-3" id="colophon">
      <div class="container">
            <div class="row g-0">
               <div class="col-auto me-auto">
                  <p class="m-0">&copy; BoolBnB | Design and Developed by Team 1 Boolean</p>
               </div>
               <div class="col-6 col-md-3 mt-2 m-md-0">
                  <img src="{{ asset('img/payments_colophon.svg') }}" alt="Braintree Payments">
               </div>
            </div>
      </div>
      </div>
</footer>
