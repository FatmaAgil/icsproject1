<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PpQuestion extends Model
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
    public static function createPpQuestion($question, $correctAnswer, $options, $category, $difficulty)

    {

        $ppQuestion = new self();
        $ppQuestion  ->question = $question;
        $ppQuestion  ->correct_answer = $correctAnswer;
        $ppQuestion  ->options = $options;
        $ppQuestion  ->category = $category;
        $ppQuestion  ->difficulty = $difficulty;
        $ppQuestion  ->save();
        return $ppQuestion  ;

}
}
