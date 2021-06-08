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
                <li class="nav-item"><a href="" class="nav-link">Add Match</a></li>
            </ul>
        </header>
    </div>

    <h1>Set Result</h1>

    <form action="{{route('updateMatch')}}" method="post" enctype="multipart/form-data" name="bet">
        @csrf
        <div class="form-group">
            <label>Teams</label><br>
            <a> {{$match['team1'] . '-' . $match['team2']}}</a>

        </div>
        <div class="form-group">
            <label>Result1</label>
            <input type="text" name="result1" class="form-control" value="0">
        </div>
        <div class="form-group">
            <label>Result2</label>
            <input type="text" name="result2" class="form-control" value="0">
        </div>
        <div class="form-group">
            <label>Time</label>
            <br>
            <a> {{$match['match_time']}}</a>
        </div>
        <div class="form-group">
            <input type="hidden" name="match_id" class="form-control" value="{{$match['id']}}">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>

    </form>

@endsection
