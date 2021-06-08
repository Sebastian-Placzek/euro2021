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
                <li class="nav-item"><a href="{{route('matches')}}" class="nav-link  ">Matches</a></li>
                <li class="nav-item"><a href="{{route('showBets')}}" class="nav-link ">My bets</a></li>
                @if (Auth::user()->permission == 'admin')
                    <li class="nav-item"><a href="{{route('showAdminPanel')}}" class="nav-link">Admin</a></li>
                @endif
                <li class="nav-item"><a href="{{route('scoreboard')}}" class="nav-link active">Scoreboard</a></li>
                <li class="nav-item"><a href="#" class="nav-link">About</a></li>
            </ul>
        </header>
    </div>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Score</th>
            <th scope="col">Number of matches</th>
            <th scope="col">Accuracy</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($scores as $i => $score) { ?>
        @csrf
        <tr>
            <th scope="row"><?php echo $i +  1 ?></th>
            <td><?php echo $score['name'] ?></td>
            <td><?php echo $score['score'] ?></td>
            <td><?php echo $score['bet_count'] ?></td>
            <td><?php echo $score['score']/($score['bet_count'] * 4) * 100 ?></td>
        </tr>
        <?php } ?>
        </tbody>
    </table>
@endsection
