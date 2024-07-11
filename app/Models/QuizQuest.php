<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizQuest extends Model
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
    public static function createQuizQuest($question, $correctAnswer, $options, $category, $difficulty)

    {

        $quizQuest = new self();
        $quizQuest->question = $question;
        $quizQuest->correct_answer = $correctAnswer;
        $quizQuest->options = $options;
        $quizQuest->category = $category;
        $quizQuest->difficulty = $difficulty;
        $quizQuest->save();
        return $quizQuest;

}
}
