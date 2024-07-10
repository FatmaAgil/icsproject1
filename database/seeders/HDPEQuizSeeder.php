<?php
// Database/Seeders/HDPEQuizSeeder.php

namespace Database\Seeders;

use App\Models\HDPEQuiz;
use Illuminate\Database\Seeder;

class HDPEQuizSeeder extends Seeder
{
    public function run()
    {
        // Question 1
        HDPEQuiz::create([
            'question' => 'What is HDPE plastic commonly used for?',
            'correct_answer' => 'Making bottles and containers',
            'options' => ['Making bags and wraps', 'Making bottles and containers', 'Making pipes and fittings', 'Making automotive parts'],
            'category' => 'HDPE plastic uses',
            'difficulty' => 1,
        ]);

        // Question 2
        HDPEQuiz::create([
            'question' => 'What percentage of HDPE plastic is recycled in the United States?',
            'correct_answer' => '30-40%',
            'options' => ['10-20%', '20-30%', '30-40%', '40-50%'],
            'category' => 'HDPE plastic recycling',
            'difficulty' => 2,
        ]);

        // Question 3
        HDPEQuiz::create([
            'question' => 'What is a common product made from recycled HDPE plastic?',
            'correct_answer' => 'Plastic lumber',
            'options' => ['New bottles and containers', 'Plastic bags', 'Plastic lumber', 'Fuel tanks'],
            'category' => 'HDPE plastic recycling',
            'difficulty' => 1,
        ]);

        // Question 4
        HDPEQuiz::create([
            'question' => 'What is a benefit of using HDPE plastic?',
            'correct_answer' => 'It is strong and resistant to corrosion',
            'options' => ['It is biodegradable', 'It is compostable', 'It is strong and resistant to corrosion', 'It is inexpensive to produce'],
            'category' => 'HDPE plastic benefits',
            'difficulty' => 2,
        ]);

        // Question 5
        HDPEQuiz::create([
            'question' => 'What is a drawback of using HDPE plastic?',
            'correct_answer' => 'It can take hundreds of years to decompose',
            'options' => ['It is too expensive to produce', 'It is not recyclable', 'It can take hundreds of years to decompose', 'It is not flexible'],
            'category' => 'HDPE plastic drawbacks',
            'difficulty' => 3,
        ]);
    }
}
