@extends('layouts.app')

@section('content')
    <div class="container">
        <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
                <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
                <span class="fs-4"></span>
            </a>

            <ul class="nav nav-pills">
                <li class="nav-item"><a href="" class="nav-link active" aria-current="page">Admin Panel</a></li>
                <li class="nav-item"><a href="{{route('home')}}" class="nav-link" aria-current="page">Home</a></li>
                <li class="nav-item"><a href="{{route('closedMatches')}}" class="nav-link ">Closed Matches</a></li>
                <li class="nav-item"><a href="{{route('scoredMatches')}}" class="nav-link ">Scored Matches</a></li>
                <li class="nav-item"><a href="{{route('showAddMatch')}}" class="nav-link">Add Match</a></li>
            </ul>
        </header>
    </div>
@endsection
