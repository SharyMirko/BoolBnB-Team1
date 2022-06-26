@extends('layouts.layout')

@section('title', 'Statistiche')

@section('content')
   <div class="container py-5">
      <h3 class="backoffice-title"><a href="{{ route('admin.dashboard') }}" class="text-muted"><i class="fa-solid fa-arrow-left fs-5"></i></a> Statistiche</h3>

      <div class="d-flex align-items-center my-5 message flex-wrap">
         <div class="img-box position-relative flex-grow-1 flex-sm-grow-0 mb-3">
            <img src="{{ $userApart[0]->thumb }}" class="rounded-3 h-100 img-fluid" alt="{{ $userApart[0]->title }}">
            <div class="crown"></div>
         </div>

         <div class="ms-3 flex-grow-1">
            <p class="category m-0 text-capitalize">{{$userApart[0]->category}}</p>
            <h4 class="my-2 text-capitalize">{{$userApart[0]->title}}</h4>
            <p class="geo icon mb-0">{{$userApart[0]->address}}</p>
            <p class="city">{{$userApart[0]->city}}</p>
            <p class="price-text m-0">€ {{$userApart[0]->price}}<span class="price-suffix">/notte</span></p>
         </div>
      </div>

      <div class="row row-cols-1 row-cols-lg-2 gx-0 gx-lg-3 gy-5 gy-lg-0 my-lg-5" >
         <div class="col">
            <h5 class="mb-3">Visualizzazioni degli ultimi 8 giorni</h5>
            <canvas id="viewChart" class=""></canvas>
         </div>
         <div class="col">
            <h5 class="mb-3">Messaggi ricevuti negli ultimi 8 giorni</h5>
            <canvas id="msgsChart" class=""></canvas>
         </div>
      </div>
   </div>

   {{-- script Chart JS --}}
   <script src="{{ asset('chart.js/chart.js') }}"></script>
   <script>
      let days = {!!$days!!};
      let viewsData = {{$views}};
      const view = document.getElementById('viewChart');
      const viewChart = new Chart(view, {
         type: 'line',
         data: {
            labels: days,
               datasets: [{
                  label: 'Visualizzazioni dell\'appartamento',
                  data: viewsData,
                  borderColor: 'rgba(241, 94, 117, 1)',
                  backgroundColor: 'rgba(255, 255, 255, 1)',
                  borderWidth: 3,
                  borderJoinStyle: 'round'
               }]
            },
            options: {
               scales: {
                  y: {
                     beginAtZero: true
                  }
               }
            }
         });
      let msgsData = {{$msgs}};
      const msgs = document.getElementById('msgsChart');
      const msgsChart = new Chart(msgs, {
         type: 'line',
         data: {
               labels: days,
               datasets: [{
                  label: 'Messaggi ricevuti',
                  data: msgsData,
                  borderColor: 'rgba(241, 94, 117, 1)',
                  backgroundColor: 'rgba(255, 255, 255, 1)',
                  borderWidth: 3,
                  borderJoinStyle: 'round'
               }]
         },
         options: {
               scales: {
                  y: {
                     beginAtZero: true,
                     ticks: {
                        stepSize: 1
                     }
                  }
               }
         }
      });
    </script>
@endsection
