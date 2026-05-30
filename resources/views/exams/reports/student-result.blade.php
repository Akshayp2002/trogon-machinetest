@extends('welcome')
@section('main')
    <div class="table-container">
        <h1>Student Exam Result</h1>

        <div class="detail-section">
            <h3>Student Information</h3>
            <div class="detail-row">
                <strong>Student Name:</strong>
                <span>{{ $studentResult->user->name ?? 'N/A' }}</span>
            </div>
            <div class="detail-row">
                <strong>Email:</strong>
                <span>{{ $studentResult->user->email ?? 'N/A' }}</span>
            </div>
        </div>

        <div class="detail-section">
            <h3>Exam Results</h3>
            <div class="detail-row">
                <strong>Correct Answers:</strong>
                <span>{{ $studentResult->correct ?? 'N/A' }}</span>
            </div>
            <div class="detail-row">
                <strong>Incorrect Answers:</strong>
                <span>{{ $studentResult->incorrect ?? 'N/A' }}</span>
            </div>
            <div class="detail-row">
                <strong>Skipped:</strong>
                <span>{{ $studentResult->skip ?? 'N/A' }}</span>
            </div>
            <div class="detail-row">
                <strong>Score:</strong>
                <span><strong>{{ $studentResult->score ?? 'N/A' }}</strong></span>
            </div>
            <div class="detail-row">
                <strong>Status:</strong>
                <span>{{ $studentResult->exam_status ?? 'N/A' }}</span>
            </div>
        </div>

        <div style="text-align: center; margin-top: 30px;">
            <a href="{{ route('exam-results', $studentResult->exam_id) }}" class="btn btn-primary">Back to Results</a>
        </div>

        <h1>Exam-wise Report</h1>
        <table class="styled-table">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Question</th>
                    <th>All available options</th>
                    <th>Selected Answers</th>
                    <th>Correct Answer</th>
                    <th>Result</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($breakdown as $breakdown)
                    @php
                        $submitted = isset($breakdown->answer_submitted)
                            ? json_decode($breakdown->answer_submitted, true)
                            : null;
                        $correct = isset($breakdown->answer_correct)
                            ? json_decode($breakdown->answer_correct, true)
                            : null;
                        $isCorrect = $submitted === $correct && $submitted !== null;
                    @endphp
                    <tr>
                        <td>{{ $loop->iteration ?? 'N/A' }}</td>
                        <td>{{ strip_tags($breakdown->questions->title) ?? 'Question Not Found' }}</td>
                        <td>
                            @if (isset($breakdown->questions->options) && ($options = json_decode($breakdown->questions->options, true)))
                                @foreach ($options as $index => $option)
                                    <div><strong>Option {{ $index + 1 }}:</strong> {{ $option }}</div>
                                @endforeach
                            @else
                                Options Not Found
                            @endif
                        </td>
                        </td>
                        <td>{{ isset($breakdown->answer_submitted) ? implode(',', json_decode($breakdown->answer_submitted, true)) : 'N/A' }}
                        </td>
                        <td>{{ isset($breakdown->answer_correct) ? implode(',', json_decode($breakdown->answer_correct, true)) : 'N/A' }}
                        </td>
                        <td>
                            @if ($isCorrect)
                                <span style="color: green; font-weight: bold; font-size: 18px;">✓</span>
                            @else
                                <span style="color: red; font-weight: bold; font-size: 18px;">✗</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-4">
            {{-- {{ $breakdown->links() }} --}}
        </div>
    </div>
@endsection
