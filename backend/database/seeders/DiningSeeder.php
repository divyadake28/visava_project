<?php

namespace Database\Seeders;

use App\Models\Dining;
use Illuminate\Database\Seeder;

class DiningSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            [
                'title_mr' => 'अस्सल गावरान जेवण व अमर्यादित थाळी',
                'title_en' => 'Authentic Gavran Thali & Village Feasts',
                'badge_mr' => 'अस्सल जेवण',
                'badge_en' => 'Gavran Lunch',
                'badge_icon' => '🍛',
                'category_mr' => 'दुपारचे / रात्रीचे जेवण',
                'category_en' => 'Lunch & Dinner',
                'short_description_mr' => 'ज्वारी-बाजरीची गरमागरम चुलीवरची भाकरी, अस्सल गावरान पिठलं, खर्डा/ठेचा, वांग्याचे भरीत, शेतातील ताजी भाजी, ताक आणि चुलीवरचा सुगंध.',
                'short_description_en' => 'Enjoy a traditional Gavran Thali with hot Jowar/Bajra Bhakri, authentic Pithla, Thecha, roasted Baingan Bharta, fresh farm greens, and homemade flavors.',
                'image' => 'uploads/dining/authentic-maharashtrian-cuisine.png',
                'dietary_type' => 'pure_veg',
                'sort_order' => 1,
                'is_active' => true,
                'status' => 'active',
            ],
            [
                'title_mr' => 'पारंपरिक गावरान नाश्ता',
                'title_en' => 'Traditional Village Breakfast',
                'badge_mr' => 'सकाळचा नाश्ता',
                'badge_en' => 'Village Breakfast',
                'badge_icon' => '🌅',
                'category_mr' => 'सकाळचा नाश्ता',
                'category_en' => 'Breakfast',
                'short_description_mr' => 'सकाळच्या शुद्ध हवेत गरमागरम थालिपीठ-लोणी, कांदे पोहे, उपमा आणि चुलीवरचा अस्सल गुळाचा किंवा आल्याचा चहा.',
                'short_description_en' => 'Start your morning with freshly prepared Thalipeeth with white butter, steaming Kande Pohe, Upma, and wood-fired organic Jaggery/Ginger Tea.',
                'image' => 'uploads/dining/traditional-village-breakfast.jpg',
                'dietary_type' => 'pure_veg',
                'sort_order' => 2,
                'is_active' => true,
                'status' => 'active',
            ],
            [
                'title_mr' => 'चुलीवरची झणझणीत मिसळ',
                'title_en' => 'Wood-Fired Maharashtrian Misal Pav',
                'badge_mr' => 'खास आकर्षण',
                'badge_en' => 'Wood-Fired Special',
                'badge_icon' => '🔥',
                'category_mr' => 'खास आकर्षण',
                'category_en' => 'Specials',
                'short_description_mr' => 'खास गावरान मसाल्यांमध्ये चुलीवर शिजवलेला कट, मटकी उसळ, कुरकुरीत फरसाण, कांदा-लिंबू आणि मऊ पावासह अस्सल चव.',
                'short_description_en' => 'Slow-simmered on traditional clay stoves with handmade village spices, sprouted moth beans, crunchy farsan, onion, lemon, and soft pav.',
                'image' => 'uploads/dining/wood-fired-misal.jpg',
                'dietary_type' => 'pure_veg',
                'sort_order' => 3,
                'is_active' => true,
                'status' => 'active',
            ],
            [
                'title_mr' => 'संध्याकाळचा हाय-टी व भजी',
                'title_en' => 'High Tea & Countryside Snacks',
                'badge_mr' => 'संध्याकाळचा चहा',
                'badge_en' => 'Evening Tea',
                'badge_icon' => '☕',
                'category_mr' => 'पेये व स्नॅक्स',
                'category_en' => 'High Tea & Snacks',
                'short_description_mr' => 'निसर्गाच्या सान्निध्यात संध्याकाळचा गरमागरम कडक चहा आणि सोबत कुरकुरीत कांदा भजी व पारंपरिक स्नॅक्स.',
                'short_description_en' => 'Crispy Kanda Bhaji, steaming tea infused with natural spices, and evening tranquility amid lush farms and country breeze.',
                'image' => 'uploads/dining/traditional-village-breakfast.jpg',
                'dietary_type' => 'pure_veg',
                'sort_order' => 4,
                'is_active' => true,
                'status' => 'active',
            ],
            [
                'title_mr' => 'बागेतील ताजी सेंद्रिय फळे व गूळ',
                'title_en' => 'Seasonal Farm-Fresh Organic Fruits',
                'badge_mr' => 'ताज्या फळांची मेजवानी',
                'badge_en' => 'Organic Fruits',
                'badge_icon' => '🍍',
                'category_mr' => 'शेतातील फळे',
                'category_en' => 'Farm Fruits',
                'short_description_mr' => 'हंगामानुसार बागेतील ताजी द्राक्षे, डाळिंब, पेरू, बोरं, सीताफळ आणि उसाचा ताजा गूळ चाखण्याची नामी संधी.',
                'short_description_en' => 'Taste seasonal sweetness straight from our orchards — fresh grapes, pomegranates, guavas, sweet limes, and pure sugarcane jaggery.',
                'image' => 'uploads/dining/seasonal-farm-fresh-fruits.jpg',
                'dietary_type' => 'pure_veg',
                'sort_order' => 5,
                'is_active' => true,
                'status' => 'active',
            ],
            [
                'title_mr' => 'कौटुंबिक व ग्रुप मेजवानी पॅकेजेस',
                'title_en' => 'Customized Group Feasts & Outing Menus',
                'badge_mr' => 'ग्रुप मेजवानी',
                'badge_en' => 'Group Feasts',
                'badge_icon' => '👨‍👩‍👧‍👦',
                'category_mr' => 'ग्रुप मेजवानी',
                'category_en' => 'Group Feasts',
                'short_description_mr' => 'शालेय सहली, कौटुंबिक स्नेहसंमेलन, वाढदिवस आणि कॉर्पोरेट आऊटिंगसाठी खास सानुकूलित मेन्यू व अमर्यादित डायनिंग.',
                'short_description_en' => 'Customized unlimited meal packages for school picnics, corporate outings, birthdays, and family gatherings with authentic village hospitality.',
                'image' => 'uploads/dining/authentic-maharashtrian-cuisine.png',
                'dietary_type' => 'pure_veg',
                'sort_order' => 6,
                'is_active' => true,
                'status' => 'active',
            ],
        ];

        foreach ($items as $item) {
            Dining::updateOrCreate(
                ['title_en' => $item['title_en']],
                $item
            );
        }
    }
}
