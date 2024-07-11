<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class HDPEQuiz extends Model
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
        
        'options' =>'array',
    ];
    public static function createHDPEQuiz($question, $correctAnswer, $options, $category, $difficulty)

    {

        $HDPEQuiz = new self();
        $HDPEQuiz ->question = $question;
        $HDPEQuiz ->correct_answer = $correctAnswer;
        $HDPEQuiz ->options = $options;
        $HDPEQuiz ->category = $category;
        $HDPEQuiz ->difficulty = $difficulty;
        $HDPEQuiz ->save();
        return $HDPEQuiz;

}
}
