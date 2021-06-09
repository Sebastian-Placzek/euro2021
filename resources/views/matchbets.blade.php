@extends('layouts.app')

@section('content')

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
                <li class="nav-item"><a href="#" class="nav-link active">Match Bets</a></li>
            </ul>
        </header>
    </div>


    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">User</th>
            <th scope="col">Match</th>
            <th scope="col">Match Time</th>
            <th scope="col">Result</th>
            <th scope="col">Score</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($bets as $i => $bet) { ?>
        <tr>
            <th scope="row"><?php echo $i + 1 ?></th>
            <td><?php echo $bet['name'] ?></td>
            <td><?php echo $bet['team1'] . ' - ' . $bet['team2']  ?></td>
            <td><?php echo $bet['match_time'] ?></td>
            <td><?php echo $bet['result1'] . ':' . $bet['result2'] ?></td>
            <td><?php echo $bet['score'] ?></td>
        </tr>
        <?php } ?>
        </tbody>
    </table>
@endsection

