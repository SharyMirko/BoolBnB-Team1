@extends('layouts.frontoffice')

@section('title', 'Welcome')

@section('content')
    <div class="input-group rounded">
        <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
        <button>filtro</button>
        <span class="input-group-text border-0" id="search-addon">
            <i class="fas fa-search"></i>
        </span>
    </div>
@endsection
