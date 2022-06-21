<div id="landing-slider">
   <div class="row py-3">
      <div class="col">
         <h3 class="frontend-section-title">Appartamenti in evidenza</h3>
      </div>

      <div class="col text-end">
         <a class="btn btn-primary text-white" href="#recipeCarousel" role="button" data-bs-slide="prev"><</a>
         <a class="btn btn-primary text-white" href="#recipeCarousel" role="button" data-bs-slide="next">></a>
      </div>
   </div>

   <div id="recipeCarousel" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner" role="listbox">   
              
         @for ($i = 0; $i < 7; $i++) 
        @php
            //get random apartment
            $apartment = $apartments->random();
        @endphp
            <div class="carousel-item @if($i != 0)  @else active @endif row row-cols-1 row-cols-md-3 p-1">
               <div class="col">
                  <x-card :item="$apartment"/>
               </div>
            </div>
         @endfor
      </div>
   </div>
</div>

