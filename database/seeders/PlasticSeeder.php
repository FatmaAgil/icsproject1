<?php

namespace Database\Seeders;

use App\Models\Plastic;
use APP\Http\Controllers\PETPlasticController;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class PlasticSeeder extends Seeder
{
    public function run()
    {
        $plastics = [
            [
                'type' => 'PET',
                'title' => 'Understanding PET Plastics: A Growing Environmental Concern',
                'introduction' => 'PET plastics are widely used in our daily lives, but their impact on the environment is a growing concern. PET plastics are commonly used in water bottles, food packaging, and clothing. They are lightweight, shatter-resistant, and can be recycled.',
                'environmental_impact' => 'PET plastics contribute to the staggering 8 million tons of plastic waste that enter our oceans every year. The production and disposal of PET plastics result in significant greenhouse gas emissions, contributing to climate change. PET plastics can take hundreds of years to decompose, harming wildlife and contaminating soil and water. Additionally, the extraction of fossil fuels for PET production contributes to deforestation, habitat destruction, and water pollution.',
                'brief_history' => 'PET plastics were first introduced in the 1940s and have since become one of the most widely used plastics in the world. In the 1970s, PET bottles became popular for packaging soft drinks, and today PET is used in a wide range of applications.',
                'video_links' => 'https://www.youtube.com/watch?v=HBCOyyY73e0, https://www.youtube.com/watch?v=g1WTgGyirDw',
                'recycling_info' => 'PET plastics can be recycled, but the process is often contaminated by other materials. Recycling PET plastics can reduce greenhouse gas emissions and conserve natural resources. PET plastics can be recycled into new products such as clothing, carpets, and packaging materials.',
                'physical_properties' => [
                    'density' => 1.38,
                    'melting point' => 250,
                    'tensile strength' => '50-70 MPa',
                ],
                'uses' => 'PET plastics are commonly used in water bottles, food packaging, clothing, and textiles.',
                'images' => ['PET-Symbol.png', 'PET-bottles.png', 'plastic.png'],
            ],
            [
                'type' => 'HDPE',
                'title' => 'The Benefits and Drawbacks of HDPE Plastics',
                'introduction' => 'HDPE plastics are commonly used in packaging and plastic bags, but their environmental impact is often overlooked. HDPE plastics are used in milk jugs, laundry detergent bottles, and oil bottles. They are durable, resistant to corrosion, and can be recycled.',
                'environmental_impact' => 'HDPE plastics are not biodegradable and can take hundreds of years to decompose. They also contribute to the plastic waste problem, harming wildlife and contaminating soil and water. The production of HDPE plastics requires large amounts of fossil fuels, contributing to climate change.',
                'brief_history' => 'HDPE plastics were first introduced in the 1950s and have since become a popular choice for packaging and plastic bags. In the 1980s, HDPE became widely used in plastic bottles and containers.',
                'video_links' => 'https://www.youtube.com/watch?v=kUR6_bQLU-E, https://www.youtube.com/watch?v=XUNxgXibKr8',
                'recycling_info' => 'HDPE plastics can be recycled, but the process is often contaminated by other materials. Recycling HDPE plastics can reduce greenhouse gas emissions and conserve natural resources. HDPE plastics can be recycled into new products such as plastic lumber, playground equipment, and packaging materials.',
                'physical_properties' => [
                    'density' => 0.95,
                    'melting point' => 120,
                    'tensile strength' => '20-30 MPa',
                ],
                'uses' => 'HDPE plastics are commonly used in packaging, plastic bags, milk jugs, laundry detergent bottles, and oil bottles.',
                'images' => ['HDPE-Symbol.png', 'HDPE-bottles.png', 'plastic.png'],
            ],
            [
                'type' => 'PVC',
                'title' => 'The Versatility and Risks of PVC Plastics',
                'introduction' => 'PVC plastics are used in a wide range of products, from pipes to medical devices, but they pose significant environmental and health risks. PVC is durable, resistant to chemicals, and can be made flexible or rigid.',
                'environmental_impact' => 'PVC production releases harmful chemicals, including dioxins, which are persistent environmental pollutants. PVC is not easily recyclable and often ends up in landfills, where it can release toxic substances. Incineration of PVC also produces dangerous byproducts.',
                'brief_history' => 'PVC was first polymerized in the 19th century, but it wasn’t until the 1920s that it became commercially viable. Its use expanded rapidly during and after World War II, and it is now one of the most widely produced plastics in the world.',
                'video_links' => 'https://www.youtube.com/watch?v=z2-4p-tVOdQ, https://www.youtube.com/watch?v=wvP4R6p4U0c',
                'recycling_info' => 'PVC recycling is challenging and not widely practiced. Mechanical recycling and feedstock recycling are possible but not common. Efforts are being made to improve PVC recycling processes.',
                'physical_properties' => [
                    'density' => 1.40,
                    'melting point' => 80,
                    'tensile strength' => '30-50 MPa',
                ],
                'uses' => 'PVC is used in pipes, window frames, flooring, medical devices, and more.',
                'images' => ['PVC-Symbol.png', 'PVC-pipes.png', 'plastic.png'],
            ],
            [
                'type' => 'LDPE',
                'title' => 'LDPE Plastics: Convenience and Consequences',
                'introduction' => 'LDPE plastics are known for their flexibility and are used in a variety of products, but their environmental impact is significant. LDPE is used in plastic bags, six-pack rings, and various containers.',
                'environmental_impact' => 'LDPE is not biodegradable and contributes to the plastic pollution problem. It can take centuries to decompose and poses a threat to marine and terrestrial wildlife. The production of LDPE also consumes significant fossil fuels.',
                'brief_history' => 'LDPE was the first grade of polyethylene, discovered in the 1930s. It became commercially important during and after World War II and is now widely used in various applications.',
                'video_links' => 'https://www.youtube.com/watch?v=C9h4NpXt1gI, https://www.youtube.com/watch?v=0Oupz25hNA0',
                'recycling_info' => 'LDPE can be recycled, but the process is less common compared to other plastics due to contamination and economic factors. Recycled LDPE can be used in products like garbage bags and floor tiles.',
                'physical_properties' => [
                    'density' => 0.92,
                    'melting point' => 105,
                    'tensile strength' => '8-20 MPa',
                ],
                'uses' => 'LDPE is used in plastic bags, six-pack rings, various containers, and films.',
                'images' => ['LDPE-Symbol.png', 'LDPE-bags.png', 'plastic.png'],
            ],
            [
                'type' => 'PP',
                'title' => 'PP Plastics: Strengths and Environmental Impact',
                'introduction' => 'Polypropylene (PP) plastics are versatile and used in a range of products, but their environmental impact cannot be ignored. PP is used in packaging, automotive parts, and textiles.',
                'environmental_impact' => 'PP is not biodegradable and contributes to plastic pollution. Its production involves significant energy consumption and greenhouse gas emissions. PP waste often ends up in landfills or oceans, where it poses risks to wildlife.',
                'brief_history' => 'Polypropylene was first polymerized in the 1950s and quickly became popular for its versatility and durability. It is now one of the most widely produced plastics worldwide.',
                'video_links' => 'https://www.youtube.com/watch?v=2mQy2t7g-Ok, https://www.youtube.com/watch?v=U8NiK5wcxmQ',
                'recycling_info' => 'PP can be recycled, but the process is not widespread. Recycled PP can be used in products like automotive parts, textiles, and reusable containers.',
                'physical_properties' => [
                    'density' => 0.90,
                    'melting point' => 160,
                    'tensile strength' => '25-40 MPa',
                ],
                'uses' => 'PP is used in packaging, automotive parts, textiles, and reusable containers.',
                'images' => ['PP-Symbol.png', 'PP-products.png', 'plastic.png'],
            ],
            [
                'type' => 'PS',
                'title' => 'PS Plastics: Versatility and Environmental Challenges',
                'introduction' => 'Polystyrene (PS) plastics are used in a variety of products, but their environmental impact is concerning. PS is used in disposable coffee cups, plastic food boxes, plastic cutlery, and packaging.',
                'environmental_impact' => 'PS is not biodegradable and contributes significantly to plastic waste. It can take hundreds of years to decompose, and its production releases harmful chemicals. PS waste often ends up in landfills or oceans, harming wildlife.',
                'brief_history' => 'Polystyrene was first discovered in the early 19th century, but it wasn’t until the 1930s that it became commercially important. It is now widely used in both solid and foam forms.',
                'video_links' => 'https://www.youtube.com/watch?v=1p1TRoPi0hI, https://www.youtube.com/watch?v=xLYtTVDn9tg',
                'recycling_info' => 'PS recycling is possible but not widely practiced due to economic and contamination issues. Recycled PS can be used in products like insulation and light switch plates.',
                'physical_properties' => [
                    'density' => 1.05,
                    'melting point' => 100,
                    'tensile strength' => '30-60 MPa',
                ],
                'uses' => 'PS is used in disposable coffee cups, plastic food boxes, plastic cutlery, and packaging.',
                'images' => ['PS-Symbol.png', 'PS-products.png', 'plastic.png'],
            ],
            [
                'type' => 'Other',
                'title' => 'Other Plastics: A Mixed Bag of Environmental Impacts',
                'introduction' => 'The "Other" category includes a variety of plastics that do not fit into the six major types. These can include bioplastics, polycarbonate, and acrylic, each with its own set of properties and environmental impacts.',
                'environmental_impact' => 'The environmental impact of "Other" plastics varies widely. Some, like bioplastics, are designed to be more environmentally friendly, while others, like polycarbonate, pose significant environmental and health risks. Proper disposal and recycling are essential.',
                'brief_history' => 'Plastics in the "Other" category have diverse histories and applications, from advanced engineering materials to biodegradable alternatives. Their development continues to evolve with advancements in technology and sustainability.',
                'video_links' => 'https://www.youtube.com/watch?v=HBTzi9uZW1s, https://www.youtube.com/watch?v=6fC8wplB4A4',
                'recycling_info' => 'Recycling practices for "Other" plastics vary greatly. Some can be recycled through specialized processes, while others are difficult to recycle. It is important to follow local recycling guidelines for these materials.',
                'physical_properties' => [
                    'density' => 'Varies',
                    'melting point' => 'Varies',
                    'tensile strength' => 'Varies',
                ],
                'uses' => 'Other plastics are used in a wide range of applications, from medical devices to electronic components to biodegradable packaging.',
                'images' => ['Other-Symbol.png', 'Other-products.png', 'plastic.png'],
            ],
        ];

        foreach ($plastics as $plastic) {
            Plastic::create($plastic);
        }
        foreach ($plastics as $plastic) {
            if (!Plastic::where('type', $plastic['type'])->exists()) {
                try {
                    Plastic::create($plastic);
                } catch (\Exception $e) {
                    Log::error("Error seeding plastic data: " . $e->getMessage());

                }

            }

        }
    }
}
