<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
Use App\Models\OtherQuestion;

class OtherPlasticSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Question 6
otherQuestion::create([
    'question' => 'What is Polystyrene (PS) plastic commonly used for?',
    'correct_answer' => 'Making foam cups, packaging materials, and insulation',
    'options' => ['Making bottles and containers', 'Making pipes and fittings', 'Making foam cups, packaging materials, and insulation', 'Making medical devices'],
    'category' => 'Polystyrene plastic uses',
    'difficulty' => 2,
]);

// Question 7
otherQuestion::create([
    'question' => 'What is a characteristic of Polyamide (PA) plastic?',
    'correct_answer' => 'It is strong, flexible, and resistant to abrasion',
    'options' => ['It is rigid and brittle', 'It is flexible and lightweight', 'It is strong, flexible, and resistant to abrasion', 'It is biodegradable'],
    'category' => 'Polyamide plastic characteristics',
    'difficulty' => 2,
]);

// Question 8
otherQuestion::create([
    'question' => 'What is Acrylic (PMMA) plastic commonly used for?',
    'correct_answer' => 'Making display cases, lenses, and medical devices',
    'options' => ['Making bottles and containers', 'Making pipes and fittings', 'Making display cases, lenses, and medical devices', 'Making automotive parts'],
    'category' => 'Acrylic plastic uses',
    'difficulty' => 2,
]);

// Question 9
otherQuestion::create([
    'question' => 'What is a drawback of using Polycarbonate (PC) plastic?',
    'correct_answer' => 'It can be prone to cracking and shattering',
    'options' => ['It is too expensive to produce', 'It is not flexible', 'It can be prone to cracking and shattering', 'It is not recyclable'],
    'category' => 'Polycarbonate plastic drawbacks',
    'difficulty' => 3,
]);

// Question 10
otherQuestion::create([
    'question' => 'What is Teflon (PTFE) plastic commonly used for?',
    'correct_answer' => 'Making non-stick coatings and medical devices',
    'options' => ['Making bottles and containers', 'Making pipes and fittings', 'Making non-stick coatings and medical devices', 'Making automotive parts'],
    'category' => 'Teflon plastic uses',
    'difficulty' => 2,
]);
    }
}
