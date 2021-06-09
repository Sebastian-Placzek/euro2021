@extends('layouts.app')

@section('content')
    <div class="container">
        <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
                <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
                <span class="fs-4"></span>
            </a>

            <ul class="nav nav-pills">
                <li class="nav-item"><a href="{{route('home')}}" class="nav-link " aria-current="page">Home</a></li>
                <li class="nav-item"><a href="{{route('matches')}}" class="nav-link active ">Matches</a></li>
                <li class="nav-item"><a href="{{route('showBets')}}" class="nav-link">Active Bets</a></li>
                <li class="nav-item"><a href="{{route('closedBets')}}" class="nav-link">Closed Bets</a></li>
                <li class="nav-item"><a href="{{route('scoreboard')}}" class="nav-link">Scoreboard</a></li>
                @if (Auth::user()->permission == 'admin')
                    <li class="nav-item"><a href="{{route('showAdminPanel')}}" class="nav-link">Admin</a></li>
                @endif

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
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($matches as $i => $match) { ?>
        @csrf
        <tr>
            <th scope="row"><?php echo $i +  1 ?></th>
            <td><?php echo $match['team1'] ?></td>
            <td><?php echo $match['team2'] ?></td>
            <td><?php echo $match['match_time'] ?></td>
            <td>
                <a href="/bet?id=<?php echo $match['id'] ?>" class="btn btn-sm btn-outline-primary">BET</a>
            </td>
        </tr>
        <?php } ?>
        </tbody>
</table>
@endsection


