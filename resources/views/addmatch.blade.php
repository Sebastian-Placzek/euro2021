@extends('layouts.app')

@section('content')

    <div class="container">
        <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
                <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
                <span class="fs-4"></span>
            </a>

            <ul class="nav nav-pills">
                <li class="nav-item"><a href="" class="nav-link " aria-current="page">Admin Panel</a></li>
                <li class="nav-item"><a href="{{route('home')}}" class="nav-link" aria-current="page">Home</a></li>
                <li class="nav-item"><a href="{{route('closedMatches')}}" class="nav-link ">Closed Matches</a></li>
                <li class="nav-item"><a href="{{route('scoredMatches')}}" class="nav-link ">Scored Matches</a></li>
                <li class="nav-item"><a href="{{route('showAddMatch')}}" class="nav-link active">Add Match</a></li>
            </ul>
        </header>
    </div>


    <h1>Add Match</h1>
    <form action="{{route('addMatch')}}" method="post" enctype="multipart/form-data" name="bet">
        @csrf
        <div class="form-group">
            <label>Team1</label><br>
            <input type="text" name="team1" class="form-control" value="">
        </div>
        <div class="form-group">
            <label>Team2</label><br>
            <input type="text" name="team2" class="form-control" value="">
        <div class="form-group">
            <label>Match Time</label>
            <input type="datetime-local" name="match_time" class="form-control" value="">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>


@endsection
