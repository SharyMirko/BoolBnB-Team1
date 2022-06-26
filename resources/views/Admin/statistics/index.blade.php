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

      <canvas id="myChart" class="my-5"></canvas>
   </div>

   {{-- script Chart JS --}}
   <script src="{{ asset('chart.js/chart.js') }}"></script>
   <script>
    let days = {!!$days!!};
    let views = {{$views}};
    const ctx = document.getElementById('myChart');
    const myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: days,
            datasets: [{
                label: 'Visualizzazioni dell\'appartamento',
                data: views,
                borderColor: 'rgba(241, 94, 117, 1)',
                backgroundColor: 'rgba(241, 94, 117, 1)',
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
    </script>

@endsection
