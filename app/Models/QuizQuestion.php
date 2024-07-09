<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizQuestion extends Model
{
    use HasFactory;
    protected $fillable = [
        'question',
        'correct_answer',
        'options',
        'category',
        'difficulty',

    ];


    protected $casts = [

        'options' => 'array',

    ];
    public static function createQuizQuestion($question, $correctAnswer, $options, $category, $difficulty)

    {

        $quizQuestion = new self();
        $quizQuestion->question = $question;
        $quizQuestion->correct_answer = $correctAnswer;
        $quizQuestion->options = $options;
        $quizQuestion->category = $category;
        $quizQuestion->difficulty = $difficulty;
        $quizQuestion->save();
        return $quizQuestion;

}
}
