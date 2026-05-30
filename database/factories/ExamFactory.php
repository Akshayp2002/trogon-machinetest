<?php

namespace Database\Factories;

use App\Models\Exam;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Exam>
 */
class ExamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $demoExams = [
            'Mathematics 101',
            'Physics Fundamentals',
            'Chemistry Lab Exam',
            'Biology Basics',
            'English Literature',
            'History Survey',
            'Geography World Tour',
            'Economics 101',
            'Psychology Intro',
            'Computer Science Basics',
            'Data Structures',
            'Web Development',
            'Database Design',
            'Software Engineering',
            'Machine Learning Basics',
            'Advanced JavaScript',
            'React Fundamentals',
            'Laravel Mastery',
            'DevOps Essentials',
            'Cloud Computing',
        ];

        return [
            "exam_name" => $this->faker->randomElement($demoExams),
        ];
    }
}
