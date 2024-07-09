<?php
namespace Database\Seeders;

use App\Models\QuizQuestion;
use Illuminate\Database\Seeder;

class QuizQuestionSeeder extends Seeder
{
    public function run()
    {
        // Question 1
        QuizQuestion::createQuizQuestion(
            'What is the most common use of PET plastic?',
            'Bottling water and soft drinks',
            ['Packaging food', 'Bottling water and soft drinks', 'Making clothing', 'Insulating homes'],
            'PET plastic uses',
            1
        );

        // Question 2
        QuizQuestion::createQuizQuestion(
            'What percentage of PET plastic is recycled in the United States?',
            '30%',
            ['10%', '20%', '30%', '40%'],
            'PET plastic recycling',
            2
        );

        // Question 3
        QuizQuestion::createQuizQuestion(
            'What is a common product made from recycled PET plastic?',
            'Fleece jackets',
            ['Plastic bags', 'Fleece jackets', 'Car parts', 'Toys'],
            'PET plastic recycling',
            1
        );

        // Question 4
        QuizQuestion::createQuizQuestion(
            'What is a benefit of using PET plastic?',
            'It is lightweight and shatter-resistant',
            ['It is biodegradable', 'It is compostable', 'It is lightweight and shatter-resistant', 'It is inexpensive to produce'],
            'PET plastic benefits',
            2
        );

        // Question 5
        QuizQuestion::createQuizQuestion(
            'What is a drawback of using PET plastic?',
            'It can take hundreds of years to decompose',
            ['It is too expensive to produce', 'It is not recyclable', 'It can take hundreds of years to decompose', 'It is not durable'],
            'PET plastic drawbacks',
            3
        );
    }
}
