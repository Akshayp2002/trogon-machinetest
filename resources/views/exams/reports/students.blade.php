@extends('welcome')
@section('main')
    <div class="table-container">
        <h1>Students</h1>
        <table class="styled-table">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Exams</th>
                    <th>View Results</th>
                    <th>View Leaderboard</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($exams as $exam)
                    <tr>
                        <td>{{ $exam->id ?? 'N/A' }}</td>
                        <td>{{ $exam->exam_name ?? 'N/A' }}</td>
                        <td><a href="{{ route('exam-results', $exam->id) }}">View</a></td>
                        <td><a href="{{ route('exam-leaderboard', $exam->id) }}">View</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <!-- Pagination Links -->
        <div class="mt-4">
            {{ $exams->links() }}
        </div>
    </div>
@endsection
