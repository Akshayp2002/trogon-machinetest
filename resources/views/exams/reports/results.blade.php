@extends('welcome')
@section('main')
    <div class="table-container">
        <h1>Exam-wise Report</h1>
        <table class="styled-table">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Student Name</th>
                    <th>Total Correct Answers</th>
                    <th>Total Wrong Answers</th>
                    <th>Total Skipped</th>
                    <th>Score</th>
                    <th>View Result</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($results as $result)
                    <tr>
                        <td>{{ $loop->iteration ?? 'N/A' }}</td>
                        <td>{{ $result->user->name ?? 'User Not Found' }}</td>
                        <td>{{ $result->correct ?? 'N/A' }}</td>
                        <td>{{ $result->incorrect ?? 'N/A' }}</td>
                        <td>{{ $result->skip ?? 'N/A' }}</td>
                        <td>{{ $result->score ?? 'N/A' }}</td>
                        <td>
                            @if ($result->user?->id)
                                <a href="{{ route('student-report', ['user_id' => $result->user?->id, 'exam_id' => $id]) }}">View
                                    Result</a>
                            @else
                                <span>Not Available</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-4">
            {{ $results->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection
