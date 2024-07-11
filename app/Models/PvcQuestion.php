<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class PvcQuestion extends Model
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
    public static function createPvcQuestion($question, $correctAnswer, $options, $category, $difficulty)
    {
        $pvcQuestion = new self();
        $pvcQuestion->question = $question;
        $pvcQuestion->correct_answer = $correctAnswer;
        $pvcQuestion->options = $options;
        $pvcQuestion->category = $category;
        $pvcQuestion->difficulty = $difficulty;
        $pvcQuestion->save();
        return $pvcQuestion;

}
}

