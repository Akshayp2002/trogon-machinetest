<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExamAttempt extends Model
{
    protected $table = "exam_attempt";

    public function user(){
        return $this->belongsTo(User::class);
    }
}
