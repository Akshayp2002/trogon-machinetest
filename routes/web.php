<?php

use App\Http\Controllers\Exams\ReportController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/exam-reports',[ReportController::class, 'index'])->name('exam-reports');
Route::get('/exam-results/{id}',[ReportController::class, 'viewExamResults'])->name('exam-results');
Route::get('/exam-leaderboard/{id}',[ReportController::class, 'viewLeaderboard'])->name('exam-leaderboard');
Route::get('/student-report/{user_id}/{exam_id}',[ReportController::class, 'studentsReport'])->name('student-report');
