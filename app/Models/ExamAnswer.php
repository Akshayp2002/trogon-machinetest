<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExamAnswer extends Model
{
    protected $table = "exam_answer";

    public function questions()
    {
        return $this->belongsTo(QuestionBank::class, 'question_id','id');
    }
}
