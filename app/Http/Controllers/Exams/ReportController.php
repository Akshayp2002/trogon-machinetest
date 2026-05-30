<?php

namespace App\Http\Controllers\Exams;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Models\ExamAnswer;
use App\Models\ExamAttempt;
use Illuminate\Http\Request;

class ReportController extends Controller
{

    public function index()
    {
        $exams = Exam::paginate();
        return view('exams.reports.index', compact('exams'));
    }

    public function viewExamResults($id)
    {
        $results = ExamAttempt::with('user')
            ->where('exam_id', $id)
            ->where('exam_status', 'submitted')
            ->paginate(10);
        return view('exams.reports.results', compact('results', 'id'));
    }

    public function viewLeaderboard($id)
    {
        $leaderboard = ExamAttempt::with('user')
            ->where('exam_id', $id)
            ->where('exam_status', 'submitted')
            ->orderBy('score', 'desc')
            ->take(10)->get();
        return view('exams.reports.leaderboard', compact('leaderboard'));
    }

    public function studentsReport($user_id, $exam_id)
    {
        $studentResult = ExamAttempt::with('user')
            ->where('user_id', $user_id)
            ->where('exam_id', $exam_id)
            ->where('exam_status', 'submitted')
            ->firstOrFail();

        $breakdown = ExamAnswer::with('questions')->where('exam_id', $exam_id)
            ->where('user_id', $user_id)->get();
        return view('exams.reports.student-result', compact('studentResult', 'breakdown'));
    }
}
