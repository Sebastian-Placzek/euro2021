@extends('layouts.app')

@section('content')

    <>
    <a>{{ session('error') ?? ''}}</a>
    <div class="container">
        <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
                <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
                <span class="fs-4"></span>
            </a>

            <ul class="nav nav-pills">
                <li class="nav-item"><a href="{{route('home')}}" class="nav-link " aria-current="page">Home</a></li>
                <li class="nav-item"><a href="{{route('matches')}}" class="nav-link  ">Matches</a></li>
                <li class="nav-item"><a href="{{route('showBets')}}" class="nav-link ">My bets</a></li>
                @if (Auth::user()->permission == 'admin')
                    <li class="nav-item"><a href="{{route('showAdminPanel')}}" class="nav-link">Admin</a></li>
                @endif
                <li class="nav-item"><a href="{{route('scoreboard')}}" class="nav-link">Scoreboard</a></li>
                <li class="nav-item"><a href="#" class="nav-link active">User Bets</a></li>
            </ul>
        </header>
    </div>





            <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Team1</th>
            <th scope="col">Team2</th>
            <th scope="col">Time</th>
            <th scope="col">Result</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($bets as $i => $bet)
        <tr>
            <th scope="row">{{$i + 1}}</th>
            <td>{{$bet['team1']}}</td>
            <td>{{$bet['team2']}}</td>
            <td>{{$bet['match_time']}}</td>
            <td>{{$bet['result1'] . ':' . $bet['result2']}}</td>
        </tr>
        @endforeach
        </tbody>
    </table>

@endsection

