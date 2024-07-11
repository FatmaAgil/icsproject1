<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\QuizQuest;

class LDPEQuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Question 1
        QuizQuest::create([
            'question' => 'What is LDPE plastic commonly used for?',
            'correct_answer' => 'Making plastic bags and packaging',
            'options' => ['Making bottles and containers', 'Making pipes and fittings', 'Making plastic bags and packaging', 'Making automotive parts'],
            'category' => 'LDPE plastic uses',
            'difficulty' => 1,
        ]);

        // Question 2
        QuizQuest::create([
            'question' => 'What is a common product made from recycled LDPE plastic?',
            'correct_answer' => 'Plastic lumber',
            'options' => ['New bottles and containers', 'Plastic bags', 'Plastic lumber', 'Fuel tanks'],
            'category' => 'LDPE plastic recycling',
            'difficulty' => 2,
        ]);

        // Question 3
        QuizQuest::create([
            'question' => 'What is a characteristic of LDPE plastic?',
            'correct_answer' => 'It is flexible and lightweight',
            'options' => ['It is rigid and strong', 'It is flexible and lightweight', 'It is biodegradable', 'It is not recyclable'],
            'category' => 'LDPE plastic characteristics',
            'difficulty' => 1,
        ]);

        // Question 4
        QuizQuest::create([
            'question' => 'What percentage of LDPE plastic is recycled in the United States?',
            'correct_answer' => '5-10%',
            'options' => ['0-5%', '5-10%', '10-15%', '15-20%'],
            'category' => 'LDPE plastic recycling',
            'difficulty' => 3,
        ]);

        // Question 5
        QuizQuest::create([
            'question' => 'What is a drawback of using LDPE plastic?',
            'correct_answer' => 'It can be difficult to recycle',
            'options' => ['It is too expensive to produce', 'It is not flexible', 'It can be difficult to recycle', 'It is not strong'],
            'category' => 'LDPE plastic drawbacks',
            'difficulty' => 2,
        ]);
    }
}
