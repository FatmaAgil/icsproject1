<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtherQuestion extends Model
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
    public static function createOtherQuestion($question, $correctAnswer, $options, $category, $difficulty)

    {

        $otherQuestion = new self();
        $otherQuestion->question = $question;
        $otherQuestion->correct_answer = $correctAnswer;
        $otherQuestion->options = $options;
        $otherQuestion->category = $category;
        $otherQuestion->difficulty = $difficulty;
        $otherQuestion->save();
        return $otherQuestion;

}
}
