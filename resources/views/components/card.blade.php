<article class="card rounded-3 border-0">
   <a class="m-0 p-0 d-block" href="{{ route('apartments.show', $item->id) }}">
      <div class="card-img-top position-relative">
         <div class="position-absolute w-100 h-100 filtro-card"></div>
         <img src="https://picsum.photos/400/300?random=<?= rand(1, 500) ?>" class="card-img-top" alt="lorem_picsum">

         <div class="crown"></div>

         <div class="user-avatar position-absolute"><span class="m-0 p-0">CB</span></div>
      </div>
      <div class="card-body text-muted">
         <h5 class="card-title">{{$item->title}}</h5>
         <p class="geo icon">{{$item->address}}</p>
         <div class="d-flex justify-content-between align-items-end flex-wrap">
            <p class="price-text m-0">€ {{$item->price}}<span class="price-suffix">/notte</span></p>
            <p class="category m-0">{{$item->category}}</p>
         </div>
      </div>
   </a>
</article>
