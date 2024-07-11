<?php

namespace Database\Seeders;

use App\Models\PvcQuestion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PvcQuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Define the questions array
        $questions = [
            [
                'question' => 'What is PVC commonly used for?',
                'correct_answer' => 'd',
                'options' => [
                    'a' => 'Packaging',
                    'b' => 'Pipes and fittings',
                    'c' => 'Electrical insulation',
                    'd' => 'All of the above',
                ],
                'category' => 'General Knowledge',
                'difficulty' => 'Easy',
            ],
            [
                'question' => 'What does PVC stand for?',
                'correct_answer' => 'a',
                'options' => [
                    'a' => 'Polyvinyl Chloride',
                    'b' => 'Polyethylene',
                    'c' => 'Polypropylene',
                    'd' => 'Polystyrene',
                ],
                'category' => 'General Knowledge',
                'difficulty' => 'Easy',
            ],
            [
                'question' => 'Is PVC recyclable?',
                'correct_answer' => 'a',
                'options' => [
                    'a' => 'Yes',
                    'b' => 'No',
                    'c' => 'Only in some cases',
                    'd' => 'None of the above',
                ],
                'category' => 'Recycling',
                'difficulty' => 'Medium',
            ],
            [
                'question' => 'Which industry uses the most PVC?',
                'correct_answer' => 'a',
                'options' => [
                    'a' => 'Construction',
                    'b' => 'Automotive',
                    'c' => 'Electronics',
                    'd' => 'Packaging',
                ],
                'category' => 'Industry',
                'difficulty' => 'Medium',
            ],
            [
                'question' => 'What are the main components of PVC?',
                'correct_answer' => 'a',
                'options' => [
                    'a' => 'Chlorine and Ethylene',
                    'b' => 'Carbon and Hydrogen',
                    'c' => 'Oxygen and Nitrogen',
                    'd' => 'Sulfur and Phosphorus',
                ],
                'category' => 'Chemistry',
                'difficulty' => 'Hard',
            ],
            [
                'question' => 'What is a major environmental concern with PVC?',
                'correct_answer' => 'b',
                'options' => [
                    'a' => 'It is biodegradable',
                    'b' => 'It releases harmful chemicals when burned',
                    'c' => 'It cannot be recycled',
                    'd' => 'It uses too much water in production',
                ],
                'category' => 'Environment',
                'difficulty' => 'Medium',
            ],
            [
                'question' => 'How is PVC commonly recycled?',
                'correct_answer' => 'a',
                'options' => [
                    'a' => 'It is melted and remolded',
                    'b' => 'It is chemically broken down and reformed',
                    'c' => 'It is composted',
                    'd' => 'It is used as fuel',
                ],
                'category' => 'Recycling',
                'difficulty' => 'Hard',
            ],
            [
                'question' => 'What property makes PVC ideal for plumbing applications?',
                'correct_answer' => 'b',
                'options' => [
                    'a' => 'High strength',
                    'b' => 'Resistance to corrosion',
                    'c' => 'Electrical conductivity',
                    'd' => 'High melting point',
                ],
                'category' => 'Properties',
                'difficulty' => 'Easy',
            ],
            [
                'question' => 'PVC is often used as an alternative to which material?',
                'correct_answer' => 'a',
                'options' => [
                    'a' => 'Metal',
                    'b' => 'Wood',
                    'c' => 'Glass',
                    'd' => 'Ceramic',
                ],
                'category' => 'Materials',
                'difficulty' => 'Medium',
            ],
            [
                'question' => 'What additive can be used to make PVC flexible?',
                'correct_answer' => 'a',
                'options' => [
                    'a' => 'Plasticizer',
                    'b' => 'Stabilizer',
                    'c' => 'Colorant',
                    'd' => 'Filler',
                ],
                'category' => 'Chemistry',
                'difficulty' => 'Hard',
            ],
            // Add more questions as needed
        ];


    }
}
