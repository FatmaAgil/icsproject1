<?php

namespace Database\Seeders;

use App\Models\PpQuestion;
use Illuminate\Database\Seeder;


class PPQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Question 1
        ppQuestion::create([
            'question' => 'What is PP plastic commonly used for?',
            'correct_answer' => 'Making bottles, caps, and containers',
            'options' => ['Making plastic bags', 'Making pipes', 'Making bottles, caps, and containers', 'Making automotive parts'],
            'category' => 'PP plastic uses',
            'difficulty' => 1,
        ]);

        // Question 2
        ppQuestion::create([
            'question' => 'What is a common product made from recycled PP plastic?',
            'correct_answer' => 'Furniture',
            'options' => ['New bottles', 'Plastic bags', 'Furniture', 'Fuel tanks'],
            'category' => 'PP plastic recycling',
            'difficulty' => 2,
        ]);

        // Question 3
        ppQuestion::create([
            'question' => 'What is a characteristic of PP plastic?',
            'correct_answer' => 'It has a high melting point',
            'options' => ['It is flexible', 'It has a high melting point', 'It is biodegradable', 'It is not recyclable'],
            'category' => 'PP plastic characteristics',
            'difficulty' => 1,
        ]);

        // Question 4
        ppQuestion::create([
            'question' => 'What percentage of PP plastic is recycled globally?',
            'correct_answer' => 'Approximately 20%',
            'options' => ['Less than 5%', 'Approximately 10%', 'Approximately 20%', 'More than 30%'],
            'category' => 'PP plastic recycling',
            'difficulty' => 3,
        ]);

        // Question 5
        ppQuestion::create([
            'question' => 'What is a drawback of using PP plastic?',
            'correct_answer' => 'It can be difficult to color',
            'options' => ['It is too expensive', 'It is not flexible', 'It can be difficult to color', 'It is not strong'],
            'category' => 'PP plastic drawbacks',
            'difficulty' => 2,
        ]);
    }
}
