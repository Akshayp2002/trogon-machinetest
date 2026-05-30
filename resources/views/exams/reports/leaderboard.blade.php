@extends('welcome')
@section('main')
    <div class="table-container">
        <h1>Student Leaderboard</h1>
        <table class="styled-table">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Student Name</th>
                    <th>Score</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($leaderboard as $leaderboard)
                    <tr>
                        {{-- @dd( $leaderboard); --}}
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $leaderboard->user->name ?? 'User Not Found' }}</td>
                        <td>{{ $leaderboard->score ?? 'N/A' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
