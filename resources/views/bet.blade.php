@extends('layouts.app')

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>{{ 'Invalid data type'}}</strong>
        </div>
    @endif
    <div class="container">
        <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
                <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
                <span class="fs-4"></span>
            </a>

            <ul class="nav nav-pills">
                <li class="nav-item"><a href="{{route('home')}}" class="nav-link " aria-current="page">Home</a></li>
                <li class="nav-item"><a href="{{route('matches')}}" class="nav-link ">Matches</a></li>
                <li class="nav-item"><a href="{{route('showBets')}}" class="nav-link ">My bets</a></li>
                <li class="nav-item"><a href="#" class="nav-link">FAQs</a></li>
                <li class="nav-item"><a href="#" class="nav-link">About</a></li>
            </ul>
        </header>
    </div>


<h1>Predict match result</h1>

<form action="{{route('addBet')}}" method="post" enctype="multipart/form-data" name="bet">
    @csrf
    <div class="form-group">
        <label>Teams</label><br>
        <a> {{$match['team1'] . '-' . $match['team2']}}</a>

    </div>
    <div class="form-group">
        <label>Result1</label>
        <input type="text" name="result1" class="form-control" value="">
    </div>
    <div class="form-group">
        <label>Result2</label>
        <input type="text" name="result2" class="form-control" value="">
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

