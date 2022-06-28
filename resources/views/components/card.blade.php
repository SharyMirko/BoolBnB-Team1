<article class="card rounded-3 border-0 h-100">
   <a class="m-0 p-0 d-flex flex-column flex-grow-1" href="{{ route('apartments.show', $item->id) }}">
      <div class="card-img-top position-relative">
         <div class="position-absolute w-100 h-100 filtro-card"></div>

         @if ((str_contains( $item->thumb, 'uploads')))
            <img src="{{ asset('storage/' . $item->thumb) }}" class="card-img-top" alt="{{ $item->title }}">
         @else
            <img src="{{ $item->thumb }}" class="card-img-top" alt="{{ $item->title }}">
         @endif

         <div class="crown"></div>

         {{-- <div class="user-avatar position-absolute"><span class="m-0 p-0">{{ substr($item->user->first_name, 0,1) }}{{ substr($item->user->last_name, 0,1) }}</span></div> --}}
      </div>
      <div class="card-body text-muted d-flex flex-column">
         <h5 class="card-title text-capitalize">{{$item->title}}</h5>
         <p class="geo icon mb-0">{{$item->address}}</p>
         <p class="city">{{$item->city}}</p>
         <div class="d-flex justify-content-between align-items-end flex-wrap mt-auto">
            <p class="price-text m-0">€ {{$item->price}}<span class="price-suffix">/notte</span></p>
            <p class="category m-0">{{$item->category}}</p>
         </div>
      </div>
   </a>
</article>
