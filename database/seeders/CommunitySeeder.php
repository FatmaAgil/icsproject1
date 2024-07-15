<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Community;

class CommunitySeeder extends Seeder
{
    public function run()
    {
        $communities = [

            [
                'name' => 'Plastic Collectors',
                'description' => 'A community for people who love collecting plastic figurines and toys.',
                'image' => 'https://www.gettyimages.com/gi-resources/images/Homepage/Hero/UK/CMS_Creative_164657083_Kingfisher.jpg',
            ],
            [
                'name' => 'Beach Cleaners',
                'description' => 'A community for people who organize beach cleanups and collect plastic waste.',
                'image' => 'https://www.nationalgeographic.org/encyclopedia/beach-cleanup/',
            ],
            [
                'name' => 'Recycling Rebels',
                'description' => 'A community for people who are passionate about reducing plastic waste and promoting sustainable living.',
                'image' => 'https://www.wwf.org.uk/sites/default/files/2020-02/Plastic-pollution-GettyImages-1149449952.jpg',
            ],

            [
                'name' => 'Plastic Hunters',
                'description' => 'A community for people who love hunting for rare and unique plastic items.',
                'image' => 'https://www.theguardian.com/environment/2019/jun/05/plastic-pollution-ocean-waste-photography',
            ],
            [
                'name' => 'Eco-Warriors',
                'description' => 'A community for people who are dedicated to reducing plastic waste and promoting eco-friendly living.',
                'image' => 'https://www.unep.org/resources/image/2019-06-05-08-43-11',
            ],
        ];

        foreach ($communities as $community) {
            Community::createCommunity($community['name'], $community['description'], $community['image']);
        }
    }
}
