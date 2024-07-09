<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Faq;
class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Faq::create(['question' => 'What is Recycle Connect?', 'answer' => 'Recycle Connect is a platform to connect plastic users to recycling organizations.']);
        Faq::create(['question' => 'How do I sign up?', 'answer' => 'You can sign up by clicking on the sign-up button on the homepage.']);
    }
}
