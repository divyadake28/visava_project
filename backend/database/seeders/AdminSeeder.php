<?php

namespace Database\Seeders;

use App\Models\Activity;
use App\Models\Blog;
use App\Models\Event;
use App\Models\Gallery;
use App\Models\Package;
use App\Models\Setting;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Admin User
        $admin = User::updateOrCreate(
            ['email' => 'admin@visava.com'],
            [
                'name' => 'Visawa Admin',
                'password' => Hash::make('password'),
                'is_admin' => true,
                'email_verified_at' => now(),
            ]
        );

        // 2. Multilingual Settings & Homepage CMS for Visawa Agro Tourism – Babacha Mala
        $settings = [
            ['key' => 'site_name_mr', 'value' => 'विसावा ॲग्रो टुरिझम – बाबांचा मळा', 'group' => 'general'],
            ['key' => 'site_name_en', 'value' => 'Visawa Agro Tourism – Babacha Mala', 'group' => 'general'],
            ['key' => 'site_email', 'value' => 'info@visava.com', 'group' => 'contact'],
            ['key' => 'site_phone', 'value' => '+91 98765 43210', 'group' => 'contact'],
            ['key' => 'address_mr', 'value' => 'विसावा ॲग्रो टुरिझम – बाबांचा मळा, निसर्गरम्य परिसर, महाराष्ट्र, भारत', 'group' => 'contact'],
            ['key' => 'address_en', 'value' => 'Visawa Agro Tourism – Babacha Mala, Scenic Countryside, Maharashtra, India', 'group' => 'contact'],
            ['key' => 'logo', 'value' => '', 'group' => 'general'],
            ['key' => 'favicon', 'value' => '', 'group' => 'general'],

            ['key' => 'facebook_url', 'value' => 'https://facebook.com/visawa', 'group' => 'social'],
            ['key' => 'instagram_url', 'value' => 'https://instagram.com/visawa', 'group' => 'social'],
            ['key' => 'youtube_url', 'value' => 'https://youtube.com/@visawa', 'group' => 'social'],
            ['key' => 'linkedin_url', 'value' => 'https://linkedin.com/company/visawa', 'group' => 'social'],

            ['key' => 'meta_title_mr', 'value' => 'विसावा ॲग्रो टुरिझम – बाबांचा मळा | सर्वोत्तम कौटुंबिक कृषी पर्यटन केंद्र', 'group' => 'seo'],
            ['key' => 'meta_title_en', 'value' => 'Visawa Agro Tourism – Babacha Mala | Best Nature & Farm Getaway', 'group' => 'seo'],
            ['key' => 'meta_description_mr', 'value' => 'द्राक्ष बागांची सफर, चुलीवरचे अस्सल गावरान भोजन, स्विमिंग पूल आणि कौटुंबिक मनोरंजनाचा आनंद घ्या.', 'group' => 'seo'],
            ['key' => 'meta_description_en', 'value' => 'Experience nature, vineyard tours, wood-fired authentic food, pool, and family fun at Babacha Mala.', 'group' => 'seo'],
            ['key' => 'meta_keywords_mr', 'value' => 'विसावा, ॲग्रो टुरिझम, बाबांचा मळा, कृषी पर्यटन, हुरडा पार्टी, गावरान जेवण', 'group' => 'seo'],
            ['key' => 'meta_keywords_en', 'value' => 'visawa, agro tourism, babacha mala, farm tour, hurda party, village food', 'group' => 'seo'],

            ['key' => 'hero_title_mr', 'value' => 'निसर्गाच्या सानिध्यात, ग्रामीण संस्कृतीचा अविस्मरणीय विसावा', 'group' => 'hero'],
            ['key' => 'hero_title_en', 'value' => 'Experience Nature, Tradition & Unforgettable Hospitality', 'group' => 'hero'],
            ['key' => 'hero_subtitle_mr', 'value' => 'विसावा ॲग्रो टुरिझम – बाबांचा मळा येथे कौटुंबिक आनंद, चुलीवरची चव, द्राक्ष बागांची सफर, ग्रामीण खेळ आणि शांत मुक्कामाचा आनंद घ्या.', 'group' => 'hero'],
            ['key' => 'hero_subtitle_en', 'value' => 'Discover the rustic charm of rural Maharashtra with vineyard tours, wood-fired dining, pool, and peaceful cottage stays.', 'group' => 'hero'],
            ['key' => 'hero_image', 'value' => 'https://images.unsplash.com/photo-1500382017468-9049fed747ef?w=1920&auto=format&fit=crop&q=85', 'group' => 'hero'],
        ];

        foreach ($settings as $item) {
            Setting::updateOrCreate(['key' => $item['key']], $item);
        }

        // 3. Seed Exactly the 6 Requested Packages in Exact Order
        $packages = [
            [
                'slug' => 'day-picnic-package',
                'title_mr' => 'डे पिकनिक पॅकेज',
                'title_en' => 'Day Picnic Package',
                'duration_mr' => '१ दिवस (सकाळी ९:०० ते संध्याकाळी ६:३०)',
                'duration_en' => '1 Day (9:00 AM – 6:30 PM)',
                'price' => 799.00,
                'discounted_price' => 699.00,
                'short_description_mr' => 'सकाळचा नाश्ता, चुलीवरचे अस्सल गावरान जेवण, स्विमिंग पूल, रेन डान्स आणि शिवार फेरीसह संपूर्ण दिवसाची मौजमजा.',
                'short_description_en' => 'Full-day agro picnic with breakfast, wood-fired Maharashtrian lunch, high tea, swimming pool, rain dance, and farm tour.',
                'description_mr' => 'निसर्गाच्या सान्निध्यात एक अविस्मरणीय दिवस घालवा. अस्सल चुलीवरची गावरान मिसळ, जेवण, स्विमिंग पूल, रेन डान्स, द्राक्ष बागांची सफर आणि बैलगाडी राईडचा मनमुराद आनंद घ्या.',
                'description_en' => 'Experience a refreshing full-day outing with your loved ones. Enjoy farm-fresh authentic village food, access to swimming pool, pulsating rain dance, vineyard tour, bullock cart rides, and traditional rural sports.',
                'name' => 'Day Picnic Package',
                'summary' => 'Full-day agro picnic with breakfast, wood-fired Maharashtrian lunch, high tea, swimming pool, rain dance, and farm tour.',
                'description' => 'Experience a refreshing full-day outing with your loved ones. Enjoy farm-fresh authentic village food, access to swimming pool, pulsating rain dance, vineyard tour, bullock cart rides, and traditional rural sports.',
                'inclusions' => json_encode([
                    'Welcome Drink & Morning Breakfast / Tea',
                    'Unlimited Wood-Fired Authentic Maharashtrian Lunch & Misal',
                    'Evening High Tea & Village Snacks',
                    'Swimming Pool & Music Rain Dance Access',
                    'Grape Vineyard & Organic Farm Guided Tour',
                    'Bullock Cart Ride & Rural Games (Viti-Dandu, Lagori)'
                ]),
                'exclusions' => json_encode([
                    'Overnight Cottage Stay',
                    'Personal Shopping & Nursery Purchases',
                    'Extra Bottled Beverages'
                ]),
                'featured_image' => 'https://images.unsplash.com/photo-1571003123894-1f0594d2b5d9?w=800&auto=format&fit=crop&q=80',
                'status' => 'active',
                'is_active' => true,
                'is_featured' => true,
                'created_by' => $admin->id,
            ],
            [
                'slug' => 'family-package',
                'title_mr' => 'कौटुंबिक फॅमिली पॅकेज',
                'title_en' => 'Family Package',
                'duration_mr' => 'पूर्ण दिवस / १ रात्र मुक्काम पर्याय',
                'duration_en' => 'Full Day / 1 Night Option',
                'price' => 2499.00,
                'discounted_price' => 2199.00,
                'short_description_mr' => 'कुटुंबासाठी (२ मोठे + २ लहान मुले) सर्व जेवण, मुलांचा ॲडव्हेंचर झोन आणि कौटुंबिक मनोरंजनासह खास कॉम्बो पॅकेज.',
                'short_description_en' => 'Special combo package for families (2 Adults + 2 Kids) with all meals, kids adventure zone, and bullock cart rides.',
                'description_mr' => 'शहरी धकाधकीपासून दूर संपूर्ण कुटुंबासाठी आनंददायी क्षण. लहान मुलांसाठी सुरक्षित खेळ परिसर, स्विमिंग पूल, बैलगाडी सफर आणि शुद्ध सात्विक गावरान जेवणाची उत्तम सोय.',
                'description_en' => 'Specially crafted for families looking for peaceful quality time away from city stress. Includes safe children play areas, organic farm activities, poolside relaxation, and wholesome traditional food.',
                'name' => 'Family Package',
                'summary' => 'Special combo package for families (2 Adults + 2 Kids) with all meals, kids adventure zone, and bullock cart rides.',
                'description' => 'Specially crafted for families looking for peaceful quality time away from city stress. Includes safe children play areas, organic farm activities, poolside relaxation, and wholesome traditional food.',
                'inclusions' => json_encode([
                    'Entry for 2 Adults & 2 Children under 10',
                    'All Meals: Breakfast, Lunch, High Tea & Snacks',
                    'Dedicated Family Shaded Cottage / Seating Area',
                    'Kids Fun & Adventure Zone Access',
                    'Private Bullock Cart Ride Experience',
                    'Swimming Pool & Rain Dance with Floats'
                ]),
                'exclusions' => json_encode([
                    'Overnight Room Stay (Available on Upgrade)',
                    'Driver / Extra Guest Charges'
                ]),
                'featured_image' => 'https://images.unsplash.com/photo-1511895426328-dc8714191300?w=800&auto=format&fit=crop&q=80',
                'status' => 'active',
                'is_active' => true,
                'is_featured' => true,
                'created_by' => $admin->id,
            ],
            [
                'slug' => 'school-college-trip-package',
                'title_mr' => 'शालेय व महाविद्यालयीन सहल पॅकेज',
                'title_en' => 'School & College Trip Package',
                'duration_mr' => '१ दिवस (सकाळी ८:३० ते संध्याकाळी ५:३०)',
                'duration_en' => '1 Day (8:30 AM – 5:30 PM)',
                'price' => 499.00,
                'discounted_price' => 449.00,
                'short_description_mr' => 'विद्यार्थ्यांसाठी सेंद्रिय शेती प्रात्यक्षिके, निसर्ग मार्गदर्शन, पौष्टिक जेवण आणि पारंपारिक मैदानी खेळांची सहल.',
                'short_description_en' => 'Educational agro-tourism visit with hands-on farming demos, botanical guidance, student meals, and rural sports.',
                'description_mr' => 'विद्यार्थ्यांना शेती आणि निसर्गाचे महत्त्व शिकवणारी आनंददायी सहल. सेंद्रिय खत निर्मिती, जलसंवर्धन, बीजारोपण प्रात्यक्षिके आणि सुरक्षित मैदानी खेळांचे आयोजन.',
                'description_en' => 'A fun-filled educational picnic tailored for students. Kids learn organic agriculture, water harvesting, botanical diversity, pottery making, and enjoy safe supervised games.',
                'name' => 'School & College Trip Package',
                'summary' => 'Educational agro-tourism visit with hands-on farming demos, botanical guidance, student meals, and rural sports.',
                'description' => 'A fun-filled educational picnic tailored for students. Kids learn organic agriculture, water harvesting, botanical diversity, pottery making, and enjoy safe supervised games.',
                'inclusions' => json_encode([
                    'Specially Curated Hygienic Student Breakfast & Lunch',
                    'Guided Educational Farm & Botany Tour',
                    'Hands-on Agricultural Activity & Potting Demonstration',
                    'Traditional Outdoor Games & Sports Coordinator',
                    'Swimming Pool Access under Lifeguard Supervision',
                    'Complimentary Entry for Accompanying Teachers (1 per 20 students)'
                ]),
                'exclusions' => json_encode([
                    'School Bus Transportation',
                    'Personal Memorabilia'
                ]),
                'featured_image' => 'https://images.unsplash.com/photo-1509062522246-3755977927d7?w=800&auto=format&fit=crop&q=80',
                'status' => 'active',
                'is_active' => true,
                'is_featured' => true,
                'created_by' => $admin->id,
            ],
            [
                'slug' => 'corporate-outing-package',
                'title_mr' => 'कॉर्पोरेट टीम आऊटिंग पॅकेज',
                'title_en' => 'Corporate Outing Package',
                'duration_mr' => '१ दिवस / बहु-दिवसीय टीम रिट्रीट',
                'duration_en' => '1 Day / Multi-Day Team Retreat',
                'price' => 1299.00,
                'discounted_price' => 1099.00,
                'short_description_mr' => 'कंपनी कर्मचाऱ्यांसाठी टीम बिल्डिंग खेळ, ओपन-एअर लॉन, डीजे रेन डान्स, बुफे जेवण आणि रिलॅक्सेशन.',
                'short_description_en' => 'Team building retreat with open-air conference lawn, team games, DJ rain dance, buffet dining, and relaxation.',
                'description_mr' => 'कंपनीच्या सहकाऱ्यांसाठी ताणतणावमुक्त आणि उत्साही दिवस. टीम बॉन्डिंग उपक्रम, प्रशस्त लॉन, डीजे रेन डान्स, स्वादिष्ट बुफे जेवण आणि उत्तम सोयीसुविधा.',
                'description_en' => 'Boost team morale and relieve corporate burnout with curated team activities, spacious lush green lawns for group games, rain dance party, and grand buffet meals.',
                'name' => 'Corporate Outing Package',
                'summary' => 'Team building retreat with open-air conference lawn, team games, DJ rain dance, buffet dining, and relaxation.',
                'description' => 'Boost team morale and relieve corporate burnout with curated team activities, spacious lush green lawns for group games, rain dance party, and grand buffet meals.',
                'inclusions' => json_encode([
                    'Welcome Mocktails & Executive Breakfast',
                    'Unlimited Royal Buffet Lunch & Evening High Tea',
                    'Spacious Lawn for Corporate Team Building Activities',
                    'Dedicated Event Anchor / Coordinator for Team Games',
                    'Rain Dance with DJ Sound System',
                    'Projector / PA System Setup on Request'
                ]),
                'exclusions' => json_encode([
                    'Alcoholic Beverages',
                    'Special Custom Stage Setup (Available on Add-on)'
                ]),
                'featured_image' => 'https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=800&auto=format&fit=crop&q=80',
                'status' => 'active',
                'is_active' => true,
                'is_featured' => false,
                'created_by' => $admin->id,
            ],
            [
                'slug' => 'group-package',
                'title_mr' => 'ग्रुप व ग्रुप गेट-टुगेदर पॅकेज',
                'title_en' => 'Group Package',
                'duration_mr' => '१ दिवस (किमान १५ व्यक्ती)',
                'duration_en' => '1 Day (Minimum 15 Guests)',
                'price' => 749.00,
                'discounted_price' => 649.00,
                'short_description_mr' => 'मित्र-मैत्रिणी, ज्येष्ठ नागरिक मंडळे आणि सोसायटी ग्रुप्ससाठी सवलतीच्या दरातील खास ग्रुप पॅकेज.',
                'short_description_en' => 'Special discounted group rates for kitty parties, senior citizen groups, society gatherings, and friend reunions.',
                'description_mr' => '१५ पेक्षा जास्त व्यक्तींच्या समूहासाठी खास सवलत. एकत्र गप्पा मारण्यासाठी खाजगी जागा, स्विमिंग पूल, बैलगाडी राईड आणि गरमागरम चुलीवरच्या जेवणाची मेजवानी.',
                'description_en' => 'Perfect for large gatherings of 15+ members. Enjoy private seating gazebos, nostalgic rural games, farm tours, swimming pool fun, and hot traditional food together.',
                'name' => 'Group Package',
                'summary' => 'Special discounted group rates for kitty parties, senior citizen groups, society gatherings, and friend reunions.',
                'description' => 'Perfect for large gatherings of 15+ members. Enjoy private seating gazebos, nostalgic rural games, farm tours, swimming pool fun, and hot traditional food together.',
                'inclusions' => json_encode([
                    'Special Group Discounted Pricing',
                    'Complete Meal Package: Breakfast, Lunch, Evening Snacks',
                    'Reserved Group Dining & Relaxation Area',
                    'Full Access to Pool, Rain Dance, and Farm Walks',
                    'Group Photoshoot Spots & Props',
                    'Musical Setup for Antakshari / Group Singing'
                ]),
                'exclusions' => json_encode([
                    'Individual Room Allocation',
                    'Transportation'
                ]),
                'featured_image' => 'https://images.unsplash.com/photo-1529156069898-49953e39b3ac?w=800&auto=format&fit=crop&q=80',
                'status' => 'active',
                'is_active' => true,
                'is_featured' => false,
                'created_by' => $admin->id,
            ],
            [
                'slug' => 'overnight-stay-package',
                'title_mr' => 'मुक्काम कॉटेज स्टे पॅकेज (२४ तास)',
                'title_en' => 'Overnight Stay Package',
                'duration_mr' => '२४ तास (चेक-इन दुपारी १२:०० – दुसऱ्या दिवशी १०:००)',
                'duration_en' => '24 Hours (Check-in 12:00 PM – Next Day 10:00 AM)',
                'price' => 3999.00,
                'discounted_price' => 3499.00,
                'short_description_mr' => 'वातानुकूलित लक्झरी कॉटेज मुक्काम, सर्व ४ वेळचे जेवण, रात्रीची शेकोटी आणि रम्य पहाट शिवार फेरी.',
                'short_description_en' => 'Luxury AC eco-cottage stay with all 4 meals (Lunch, High Tea, Dinner, Breakfast), night bonfire, and sunrise walk.',
                'description_mr' => 'निसर्गाच्या कुशीत शांत रात्रीचा मुक्काम. वातानुकूलित लाकडी कॉटेज, संध्याकाळी शेकोटी, चारही वेळचे स्वादिष्ट जेवण आणि सकाळी पक्षांच्या किलबिलाटात प्रसन्न शिवार फेरी.',
                'description_en' => 'Rejuvenate with a serene night amidst nature. Stay in cozy AC wooden cottages with private verandas, relish evening bonfires under starry skies, 4 complete meals, and peaceful morning bird walks.',
                'name' => 'Overnight Stay Package',
                'summary' => 'Luxury AC eco-cottage stay with all 4 meals (Lunch, High Tea, Dinner, Breakfast), night bonfire, and sunrise walk.',
                'description' => 'Rejuvenate with a serene night amidst nature. Stay in cozy AC wooden cottages with private verandas, relish evening bonfires under starry skies, 4 complete meals, and peaceful morning bird walks.',
                'inclusions' => json_encode([
                    'AC Deluxe Nature-View Wooden Cottage Accommodation',
                    '4 Complete Meals: Lunch, High Tea, Dinner & Next Day Breakfast',
                    'Evening Cozy Bonfire & Music Gathering',
                    'Early Morning Guided Sunrise Farm Walk',
                    'Full 2-Day Access to Pool, Rain Dance & Activities',
                    'Free Wi-Fi & 24x7 Power Backup'
                ]),
                'exclusions' => json_encode([
                    'Late Check-out beyond 11:00 AM',
                    'Special Midnight Room Service'
                ]),
                'featured_image' => 'https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?w=800&auto=format&fit=crop&q=80',
                'status' => 'active',
                'is_active' => true,
                'is_featured' => false,
                'created_by' => $admin->id,
            ],
        ];

        // Ensure clean state for packages
        Package::withTrashed()->forceDelete();
        foreach ($packages as $pkg) {
            Package::create($pkg);
        }

        // 4. Seed Exactly the 6 Requested Events in Exact Order
        $events = [
            [
                'slug' => 'birthday-parties',
                'title_mr' => 'वाढदिवस व पार्टी सेलिब्रेशन',
                'title_en' => 'Birthday Parties',
                'location_mr' => 'बाबांचा मळा – सेलिब्रेशन लॉन व पूलसाइड',
                'location_en' => 'Babacha Mala – Celebration Lawn & Poolside',
                'event_date' => now()->addDays(5),
                'price' => 599.00,
                'short_description_mr' => 'थीम डेकोरेशन, डीजे म्युझिक, पूलसाइड पार्टी, केक कटिंग आणि स्वादिष्ट जेवणासह अविस्मरणीय वाढदिवस सोहळा.',
                'short_description_en' => 'Grand birthday celebration packages with theme decorations, DJ music, poolside party, cake table, and mouthwatering buffet.',
                'description_mr' => 'निसर्गरम्य वातावरणात आपल्या प्रियजनांचा वाढदिवस साजरा करा. आकर्षक सजावट, डीजे साउंड, स्विमिंग पूल, रेन डान्स, स्वादिष्ट स्टार्टर्स आणि अस्सल गावरान जेवणाची परिपूर्ण व्यवस्था.',
                'description_en' => 'Celebrate your special milestone amidst the beauty of nature. We provide vibrant balloons and floral décor, outdoor sound setup, pool & rain dance access, tasty starters, and unlimited traditional/buffet dining.',
                'title' => 'Birthday Parties',
                'location' => 'Babacha Mala – Celebration Lawn & Poolside',
                'start_date' => now()->addDays(5),
                'description' => 'Celebrate your special milestone amidst the beauty of nature. We provide vibrant balloons and floral décor, outdoor sound setup, pool & rain dance access, tasty starters, and unlimited traditional/buffet dining.',
                'image' => 'https://images.unsplash.com/photo-1464349095431-e9a21285b5f3?w=800&auto=format&fit=crop&q=80',
                'banner_image' => 'https://images.unsplash.com/photo-1464349095431-e9a21285b5f3?w=800&auto=format&fit=crop&q=80',
                'status' => 'active',
                'is_active' => true,
                'created_by' => $admin->id,
            ],
            [
                'slug' => 'school-picnics',
                'title_mr' => 'शालेय व कॉलेज सहल',
                'title_en' => 'School Picnics',
                'location_mr' => 'बाबांचा मळा – कृषी विज्ञान व क्रीडांगण',
                'location_en' => 'Babacha Mala – Agro Science & Sports Ground',
                'event_date' => now()->addDays(10),
                'price' => 449.00,
                'short_description_mr' => 'विद्यार्थ्यांसाठी सुरक्षित, माहितीपूर्ण आणि आनंददायी सहल; सेंद्रिय शेती धडे, पौष्टिक अल्पोपहार आणि देशी खेळ.',
                'short_description_en' => 'Safe, educational, and fun-filled outdoor school picnics with guided farm tours, student meals, and traditional sports.',
                'description_mr' => 'शाळा आणि महाविद्यालयांसाठी विशेष सहल आयोजन. वनस्पतींची ओळख, सेंद्रिय खत निर्मिती, जलसंवर्धन, कुंभारकाम, मैदानी खेळ आणि शुद्ध सात्विक भोजनाची सोय.',
                'description_en' => 'Tailored specifically for schools, colleges, and educational academies. Includes botanical knowledge sessions, water conservation workshops, pottery making, tree plantation, sports coordinators, and clean student meals.',
                'title' => 'School Picnics',
                'location' => 'Babacha Mala – Agro Science & Sports Ground',
                'start_date' => now()->addDays(10),
                'description' => 'Tailored specifically for schools, colleges, and educational academies. Includes botanical knowledge sessions, water conservation workshops, pottery making, tree plantation, sports coordinators, and clean student meals.',
                'image' => 'https://images.unsplash.com/photo-1509062522246-3755977927d7?w=800&auto=format&fit=crop&q=80',
                'banner_image' => 'https://images.unsplash.com/photo-1509062522246-3755977927d7?w=800&auto=format&fit=crop&q=80',
                'status' => 'active',
                'is_active' => true,
                'created_by' => $admin->id,
            ],
            [
                'slug' => 'corporate-events',
                'title_mr' => 'कॉर्पोरेट टीम बिल्डिंग व मिटिंग्ज',
                'title_en' => 'Corporate Events',
                'location_mr' => 'बाबांचा मळा – ओपन-एअर कॉन्फरन्स लॉन',
                'location_en' => 'Babacha Mala – Open-Air Conference Lawn',
                'event_date' => now()->addDays(15),
                'price' => 1099.00,
                'short_description_mr' => 'कर्मचाऱ्यांसाठी टीम बिल्डिंग उपक्रम, वार्षिक स्नेहसंमेलन, लीडरशिप रिट्रीट आणि प्रशस्त लॉनवरील इव्हेंट्स.',
                'short_description_en' => 'Team retreats, leadership offsites, annual day celebrations, and employee engagement games in a scenic open-air campus.',
                'description_mr' => 'ऑफिसच्या चार भिंतींच्या पलीकडे निसर्गरम्य ठिकाणी टीम बॉन्डिंग. ओपन लॉन, पीए सिस्टीम, ग्रुप गेम्स, डीजे रेन डान्स आणि व्हीआयपी बुफे जेवणासह उत्तम सोय.',
                'description_en' => 'Escape stressful boardroom settings. Host team outings, presentations, outdoor team building exercises, cocktail-free retreats, and grand barbecue dinners in a calm countryside environment.',
                'title' => 'Corporate Events',
                'location' => 'Babacha Mala – Open-Air Conference Lawn',
                'start_date' => now()->addDays(15),
                'description' => 'Escape stressful boardroom settings. Host team outings, presentations, outdoor team building exercises, cocktail-free retreats, and grand barbecue dinners in a calm countryside environment.',
                'image' => 'https://images.unsplash.com/photo-1511578314322-379afb476865?w=800&auto=format&fit=crop&q=80',
                'banner_image' => 'https://images.unsplash.com/photo-1511578314322-379afb476865?w=800&auto=format&fit=crop&q=80',
                'status' => 'active',
                'is_active' => true,
                'created_by' => $admin->id,
            ],
            [
                'slug' => 'family-gatherings',
                'title_mr' => 'कौटुंबिक स्नेहसंमेलन व मेळावे',
                'title_en' => 'Family Gatherings',
                'location_mr' => 'बाबांचा मळा – सावलीदार हेरिटेज गझेबोज',
                'location_en' => 'Babacha Mala – Shaded Heritage Gazebos',
                'event_date' => now()->addDays(20),
                'price' => 699.00,
                'short_description_mr' => 'एकत्र कुटुंबासाठी प्रशस्त जागा, लहान मुलांचे खेळ, बैलगाडी सफर आणि गरमागरम चुलीवरची अस्सल गावरान मेजवानी.',
                'short_description_en' => 'Spacious gazebos, kids play parks, bullock cart rides, and hot wood-fired chulha food for large joint family reunions.',
                'description_mr' => 'आजी-आजोबांपासून नातवंडांपर्यंत सर्वांना आनंद देणारा कौटुंबिक सोहळा. शांत सावली, विहीर स्नान, संगीत, पारंपारिक खेळ आणि पोटभर गावरान जेवणाचा आनंद.',
                'description_en' => 'Create cherished lifetime memories with multiple generations coming together. Enjoy private shaded pavilions, elderly-friendly walking paths, children play zones, music, and wholesome Maharashtrian cuisine.',
                'title' => 'Family Gatherings',
                'location' => 'Babacha Mala – Shaded Heritage Gazebos',
                'start_date' => now()->addDays(20),
                'description' => 'Create cherished lifetime memories with multiple generations coming together. Enjoy private shaded pavilions, elderly-friendly walking paths, children play zones, music, and wholesome Maharashtrian cuisine.',
                'image' => 'https://images.unsplash.com/photo-1511895426328-dc8714191300?w=800&auto=format&fit=crop&q=80',
                'banner_image' => 'https://images.unsplash.com/photo-1511895426328-dc8714191300?w=800&auto=format&fit=crop&q=80',
                'status' => 'active',
                'is_active' => true,
                'created_by' => $admin->id,
            ],
            [
                'slug' => 'pre-wedding-photoshoots',
                'title_mr' => 'प्री-वेडिंग व कपल फोटोशूट',
                'title_en' => 'Pre-Wedding Photoshoots',
                'location_mr' => 'बाबांचा मळा – द्राक्ष बागा व निसर्गरम्य परिसर',
                'location_en' => 'Babacha Mala – Vineyard Trails & Scenic Lakeview',
                'event_date' => now()->addDays(25),
                'price' => 2499.00,
                'short_description_mr' => 'द्राक्ष बागा, हिरवेगार शिवार, लाकडी कॉटेज, विहीर, पारंपारिक बैलगाडी आणि विहंगम सनसेट स्पॉट्ससह खास फोटोशूट.',
                'short_description_en' => 'Stunning agro backdrops, sunset vineyard trails, rustic wooden cottages, decorated bullock carts, and private changing suites.',
                'description_mr' => 'तुमच्या लग्नापूर्वीचे सोनेरी क्षण कॅमेऱ्यात टिपण्यासाठी परिपूर्ण जागा. १५ एकर परिसर, २०+ नैसर्गिक बॅकड्रॉप्स, सनसेट पॉईंट्स, प्रायव्हेट ड्रेसिंग रूम्स आणि रिफ्रेशमेंटची सोय.',
                'description_en' => 'Capture your timeless romantic moments with 20+ photogenic locations across 15 acres. Includes lush grape vineyards, rustic bullock carts, floral swings, poolside reflections, and dedicated private AC changing rooms.',
                'title' => 'Pre-Wedding Photoshoots',
                'location' => 'Babacha Mala – Vineyard Trails & Scenic Lakeview',
                'start_date' => now()->addDays(25),
                'description' => 'Capture your timeless romantic moments with 20+ photogenic locations across 15 acres. Includes lush grape vineyards, rustic bullock carts, floral swings, poolside reflections, and dedicated private AC changing rooms.',
                'image' => 'https://images.unsplash.com/photo-1583939003579-730e3918a45a?w=800&auto=format&fit=crop&q=80',
                'banner_image' => 'https://images.unsplash.com/photo-1583939003579-730e3918a45a?w=800&auto=format&fit=crop&q=80',
                'status' => 'active',
                'is_active' => true,
                'created_by' => $admin->id,
            ],
            [
                'slug' => 'cultural-programs',
                'title_mr' => 'सांस्कृतिक व पारंपारिक लोककला कार्यक्रम',
                'title_en' => 'Cultural Programs',
                'location_mr' => 'बाबांचा मळा – हेरिटेज ॲम्फीथिएटर',
                'location_en' => 'Babacha Mala – Heritage Amphitheatre',
                'event_date' => now()->addDays(30),
                'price' => 499.00,
                'short_description_mr' => 'पारंपारिक लोकनृत्य, गोंधळ, भारुड, संगीत रजनी आणि महाराष्ट्राच्या समृद्ध लोकसंस्कृतीचे दर्शन.',
                'short_description_en' => 'Folk dances (Lavani, Gondhal), traditional music nights, seasonal harvest festivals, and Maharashtrian cultural celebrations.',
                'description_mr' => 'महाराष्ट्राच्या लोककलेचा आणि संस्कृतीचा गौरव. लावणी, पोवाडा, लेझीम, ढोल-ताशा गजर आणि अस्सल गावरान सण-उत्सवांचा अविस्मरणीय अनुभव.',
                'description_en' => 'Immerse in the rich traditions of Maharashtra. Experience live folk performances, Powada ballads, rhythmic Lezim dances, Dhol-Tasha beats, traditional crafts exhibitions, and authentic festive treats.',
                'title' => 'Cultural Programs',
                'location' => 'Babacha Mala – Heritage Amphitheatre',
                'start_date' => now()->addDays(30),
                'description' => 'Immerse in the rich traditions of Maharashtra. Experience live folk performances, Powada ballads, rhythmic Lezim dances, Dhol-Tasha beats, traditional crafts exhibitions, and authentic festive treats.',
                'image' => 'https://images.unsplash.com/photo-1514525253161-7a46d19cd819?w=800&auto=format&fit=crop&q=80',
                'banner_image' => 'https://images.unsplash.com/photo-1514525253161-7a46d19cd819?w=800&auto=format&fit=crop&q=80',
                'status' => 'active',
                'is_active' => true,
                'created_by' => $admin->id,
            ],
        ];

        // Ensure clean state for events
        Event::withTrashed()->forceDelete();
        foreach ($events as $evt) {
            Event::create($evt);
        }

        // 5. Seed Authentic Agro-Tourism Gallery Photos
        Gallery::withTrashed()->forceDelete();
        $galleryItems = [
            // Farm & Nature
            [
                'title_mr' => 'द्राक्ष बागांची विहंगम दृश्ये',
                'title_en' => 'Lush Grape Vineyards',
                'category_mr' => 'शेती व निसर्ग',
                'category_en' => 'Farm & Nature',
                'category' => 'Farm & Nature',
                'image' => 'https://images.unsplash.com/photo-1595974482597-4b8da8879bc5?w=1200&auto=format&fit=crop&q=85',
                'sort_order' => 1,
            ],
            [
                'title_mr' => 'सेंद्रिय शेती व फळबागा शिवार',
                'title_en' => 'Organic Farming & Fruit Orchards',
                'category_mr' => 'शेती व निसर्ग',
                'category_en' => 'Farm & Nature',
                'category' => 'Farm & Nature',
                'image' => 'https://images.unsplash.com/photo-1500382017468-9049fed747ef?w=1200&auto=format&fit=crop&q=85',
                'sort_order' => 2,
            ],
            [
                'title_mr' => 'प्रसन्न पहाट शिवार फेरी व निसर्ग वाट',
                'title_en' => 'Serene Morning Nature Trail',
                'category_mr' => 'शेती व निसर्ग',
                'category_en' => 'Farm & Nature',
                'category' => 'Farm & Nature',
                'image' => 'https://images.unsplash.com/photo-1448375240586-882707db888b?w=1200&auto=format&fit=crop&q=85',
                'sort_order' => 3,
            ],

            // Activities
            [
                'title_mr' => 'पारंपारिक सजवलेली बैलगाडी सफर',
                'title_en' => 'Traditional Bullock Cart Ride',
                'category_mr' => 'उपक्रम',
                'category_en' => 'Activities',
                'category' => 'Activities',
                'image' => 'https://images.unsplash.com/photo-1500937386664-56d1dfef3854?w=1200&auto=format&fit=crop&q=85',
                'sort_order' => 4,
            ],
            [
                'title_mr' => 'स्विमिंग पूल व विहीर स्नान मौज',
                'title_en' => 'Swimming Pool & Well Bathing',
                'category_mr' => 'उपक्रम',
                'category_en' => 'Activities',
                'category' => 'Activities',
                'image' => 'https://images.unsplash.com/photo-1571003123894-1f0594d2b5d9?w=1200&auto=format&fit=crop&q=85',
                'sort_order' => 5,
            ],
            [
                'title_mr' => 'रेन डान्स व म्युझिक मस्ती',
                'title_en' => 'Rain Dance & Music Fun',
                'category_mr' => 'उपक्रम',
                'category_en' => 'Activities',
                'category' => 'Activities',
                'image' => 'https://images.unsplash.com/photo-1533105079780-92b9be482077?w=1200&auto=format&fit=crop&q=85',
                'sort_order' => 6,
            ],
            [
                'title_mr' => 'पारंपारिक ग्रामीण खेळ व लगोरी',
                'title_en' => 'Rural Games & Outdoor Sports',
                'category_mr' => 'उपक्रम',
                'category_en' => 'Activities',
                'category' => 'Activities',
                'image' => 'https://images.unsplash.com/photo-1526676037777-05a232554f77?w=1200&auto=format&fit=crop&q=85',
                'sort_order' => 7,
            ],

            // Food
            [
                'title_mr' => 'चुलीवरची झणझणीत मिसळ व गावरान थाळी',
                'title_en' => 'Authentic Wood-Fired Misal & Village Thali',
                'category_mr' => 'खाद्यसंस्कृती',
                'category_en' => 'Food',
                'category' => 'Food',
                'image' => 'https://images.unsplash.com/photo-1601050690597-df0568f70950?w=1200&auto=format&fit=crop&q=85',
                'sort_order' => 8,
            ],
            [
                'title_mr' => 'हिवाळी हुरडा पार्टी व गरम कणसे',
                'title_en' => 'Winter Hurda Party Festival',
                'category_mr' => 'खाद्यसंस्कृती',
                'category_en' => 'Food',
                'category' => 'Food',
                'image' => 'https://images.unsplash.com/photo-1543083477-4f785aeafaa9?w=1200&auto=format&fit=crop&q=85',
                'sort_order' => 9,
            ],

            // Events
            [
                'title_mr' => 'द्राक्ष बागांमध्ये प्री-वेडिंग फोटोशूट',
                'title_en' => 'Pre-Wedding Vineyard Photoshoot',
                'category_mr' => 'सोहळे व कार्यक्रम',
                'category_en' => 'Events',
                'category' => 'Events',
                'image' => 'https://images.unsplash.com/photo-1583939003579-730e3918a45a?w=1200&auto=format&fit=crop&q=85',
                'sort_order' => 10,
            ],
            [
                'title_mr' => 'सांस्कृतिक व लोककला कार्यक्रम',
                'title_en' => 'Traditional Cultural & Folk Shows',
                'category_mr' => 'सोहळे व कार्यक्रम',
                'category_en' => 'Events',
                'category' => 'Events',
                'image' => 'https://images.unsplash.com/photo-1514525253161-7a46d19cd819?w=1200&auto=format&fit=crop&q=85',
                'sort_order' => 11,
            ],

            // Guest Moments & Stay
            [
                'title_mr' => 'कौटुंबिक पर्यटनाचे अविस्मरणीय क्षण',
                'title_en' => 'Cherished Family Guest Moments',
                'category_mr' => 'पाहुण्यांचे क्षण',
                'category_en' => 'Guest Moments',
                'category' => 'Guest Moments',
                'image' => 'https://images.unsplash.com/photo-1511895426328-dc8714191300?w=1200&auto=format&fit=crop&q=85',
                'sort_order' => 12,
            ],
            [
                'title_mr' => 'निसर्गरम्य लाकडी हेरिटेज कॉटेज मुक्काम',
                'title_en' => 'Deluxe Nature Cottages & Stay',
                'category_mr' => 'पाहुण्यांचे क्षण',
                'category_en' => 'Guest Moments',
                'category' => 'Guest Moments',
                'image' => 'https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?w=1200&auto=format&fit=crop&q=85',
                'sort_order' => 13,
            ],
        ];

        foreach ($galleryItems as $g) {
            Gallery::create([
                'title_mr' => $g['title_mr'],
                'title_en' => $g['title_en'],
                'title' => $g['title_en'],
                'category_mr' => $g['category_mr'],
                'category_en' => $g['category_en'],
                'category' => $g['category'],
                'image' => $g['image'],
                'sort_order' => $g['sort_order'],
                'status' => 'active',
                'is_active' => true,
                'created_by' => $admin->id,
            ]);
        }

        // 6. Seed 3 Realistic Testimonials
        $testimonials = [
            [
                'client_name' => 'सचिन कुलकर्णी (Sachin Kulkarni)',
                'name' => 'सचिन कुलकर्णी (Sachin Kulkarni)',
                'client_designation_mr' => 'पुणे (कौटुंबिक पर्यटक)',
                'client_designation_en' => 'Pune (Family Visitor)',
                'designation' => 'Pune (Family Visitor)',
                'review_mr' => 'बाबांचा मळा येथे आमच्या संपूर्ण कुटुंबाला प्रचंड आनंद मिळाला. चुलीवरची मिसळ आणि हुरडा पार्टी अप्रतिम होती. मुले शेती आणि स्विमिंग पूलमध्ये रमून गेली.',
                'review_en' => 'Our entire family had a fabulous experience at Babacha Mala! The wood-fired Misal and fresh Hurda party were outstanding. The kids loved the farm activities and pool.',
                'comment' => 'Our entire family had a fabulous experience at Babacha Mala! The wood-fired Misal and fresh Hurda party were outstanding. The kids loved the farm activities and pool.',
                'rating' => 5,
                'status' => 'active',
                'is_approved' => true,
            ],
            [
                'client_name' => 'प्रिया सावंत (Priya Sawant)',
                'name' => 'प्रिया सावंत (Priya Sawant)',
                'client_designation_mr' => 'मुंबई (कॉर्पोरेट ग्रुप लीडर)',
                'client_designation_en' => 'Mumbai (Corporate Group)',
                'designation' => 'Mumbai (Corporate Group)',
                'review_mr' => 'शहरी गोंगाटापासून दूर अतिशय शांत आणि निसर्गरम्य जागा. कॉटेजेस स्वच्छ आहेत आणि आदरातिथ्य घरच्यासारखे आहे. आम्ही नक्की पुन्हा येऊ!',
                'review_en' => 'A serene and rejuvenating getaway from city life. The cottages are sparkling clean and the staff hospitality is heartwarming. Highly recommended for group outings!',
                'comment' => 'A serene and rejuvenating getaway from city life. The cottages are sparkling clean and the staff hospitality is heartwarming. Highly recommended for group outings!',
                'rating' => 5,
                'status' => 'active',
                'is_approved' => true,
            ],
            [
                'client_name' => 'अमित पाटील (Amit Patil)',
                'name' => 'अमित पाटील (Amit Patil)',
                'client_designation_mr' => 'नाशिक (डे पिकनिक पाहुणे)',
                'client_designation_en' => 'Nashik (Day Picnic Guest)',
                'designation' => 'Nashik (Day Picnic Guest)',
                'review_mr' => 'द्राक्ष बागांची सफर आणि बैलगाडी राईड खूपच छान होती. अस्सल गावरान जेवणाची चव जिभेवर रेंगाळत राहते. वाजवी दरात सर्वोत्तम पॅकेज!',
                'review_en' => 'The vineyard tour and bullock cart ride took us back to our childhood roots. The pure rustic Gavran food is unforgettable. Best value for money agro tour!',
                'comment' => 'The vineyard tour and bullock cart ride took us back to our childhood roots. The pure rustic Gavran food is unforgettable. Best value for money agro tour!',
                'rating' => 5,
                'status' => 'active',
                'is_approved' => true,
            ],
        ];

        foreach ($testimonials as $t) {
            Testimonial::updateOrCreate(['client_name' => $t['client_name']], $t);
        }

        // 7. Seed Exactly the 10 Specified Activities in Exact Order
        $activities = [
            [
                'title_mr' => 'स्वच्छ स्विमिंग पूल व विहीर स्नान',
                'title_en' => 'Swimming Pool',
                'short_description_mr' => 'शुद्ध आणि स्वच्छ पाण्याचा स्विमिंग पूल, लहान मुलांचा पूल आणि पारंपारिक विहीर स्नान.',
                'short_description_en' => 'Crystal-clear filtered swimming pool with kids splash area and authentic farm well bathing experience.',
                'description_mr' => 'उन्हाळ्याच्या आणि सुट्टीच्या दिवसात संपूर्ण कुटुंबासाठी मनसोक्त जलविहार आणि पारंपारिक विहिरीच्या पाण्याचा आनंद.',
                'description_en' => 'Relax and refresh in our hygienic swimming pool amidst nature, featuring filtered water and traditional well bathing.',
                'image' => 'https://images.unsplash.com/photo-1571003123894-1f0594d2b5d9?w=800&auto=format&fit=crop&q=80',
                'icon' => '🏊‍♂️',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'title_mr' => 'रेन डान्स आणि म्युझिक पार्टी',
                'title_en' => 'Rain Dance',
                'short_description_mr' => 'थंडगार पाण्याच्या सरींमध्ये डीजे संगीताच्या तालावर मनमुराद नाचण्याचा आनंद.',
                'short_description_en' => 'High-energy rain dance floor with cool water mist showers and live music beats.',
                'description_mr' => 'मित्र आणि कुटुंबासह संगीताच्या तालावर थंडगार पाण्याच्या सरींखाली आनंदोत्सव साजरा करा.',
                'description_en' => 'Celebrate joyful moments with family and friends on our spacious rain dance arena with high-quality sound.',
                'image' => 'https://images.unsplash.com/photo-1514525253161-7a46d19cd819?w=800&auto=format&fit=crop&q=80',
                'icon' => '🎵',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'title_mr' => 'द्राक्ष बागा शिवार फेरी',
                'title_en' => 'Grape Vineyard Tour',
                'short_description_mr' => '१५ एकर विस्तीर्ण द्राक्ष बागा आणि फळबागांची मार्गदर्शित शिवार फेरी.',
                'short_description_en' => 'Guided educational walk through lush grape vineyards and organic fruit orchards.',
                'description_mr' => 'विस्तीर्ण द्राक्ष बागांमध्ये फिरा, आधुनिक शेती पद्धतींची माहिती घ्या आणि गोड फळांचा आस्वाद घ्या.',
                'description_en' => 'Stroll through sprawling vineyards, learn about cultivation techniques, and taste freshly plucked fruits.',
                'image' => 'https://images.unsplash.com/photo-1595974482597-4b8da8879bc5?w=800&auto=format&fit=crop&q=80',
                'icon' => '🍇',
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'title_mr' => 'चुलीवरची अस्सल गावरान मिसळ व जेवण',
                'title_en' => 'Traditional Wood-Fired Misal',
                'short_description_mr' => 'शेतातील ताज्या भाज्या आणि चुलीवर तयार केलेली झणझणीत गावरान मिसळ व जेवण.',
                'short_description_en' => 'Farm-to-table dining prepared on traditional wood-fired earthen chulhas.',
                'description_mr' => 'गरमागरम बाजरी-ज्वारीची भाकरी, पिठलं-ठेचा, वांग्याचं भरीत आणि शुद्ध गावठी तुपातील चविष्ट जेवण.',
                'description_en' => 'Relish piping hot wood-fired misal, bajra bhakris, pithla-thecha, and authentic rural delicacies.',
                'image' => 'https://images.unsplash.com/photo-1601050690597-df0568f70950?w=800&auto=format&fit=crop&q=80',
                'icon' => '🍲',
                'sort_order' => 4,
                'is_active' => true,
            ],
            [
                'title_mr' => 'सेंद्रिय शेती व शिवार फेरी',
                'title_en' => 'Farm Visit',
                'short_description_mr' => 'सेंद्रिय शेती, भाजीपाला आणि विविध पिकांची माहिती देणारी प्रत्यक्ष शिवार फेरी.',
                'short_description_en' => 'Educational agro-tour across 15 acres of organic crops, polyhouses, and vegetation.',
                'description_mr' => 'सेंद्रिय शेती, आधुनिक तंत्रज्ञान आणि हिरवेगार शिवार जवळून अनुभवण्याची उत्तम संधी.',
                'description_en' => 'Explore sustainable organic farming methods, visit green polyhouses, and reconnect with agriculture roots.',
                'image' => 'https://images.unsplash.com/photo-1500382017468-9049fed747ef?w=800&auto=format&fit=crop&q=80',
                'icon' => '🌾',
                'sort_order' => 5,
                'is_active' => true,
            ],
            [
                'title_mr' => 'पारंपारिक बैलगाडी सफर',
                'title_en' => 'Bullock Cart Ride',
                'short_description_mr' => 'सजावट केलेल्या पारंपारिक बैलगाडीतून मळ्याच्या बांधावरून रपेट मारण्याचा आनंद.',
                'short_description_en' => 'Nostalgic ride on beautifully decorated bullock carts around countryside farm trails.',
                'description_mr' => 'लहान-मोठ्या सर्वांसाठी बैलगाडीतून फिरण्याचा आणि ग्रामीण संस्कृती अनुभवण्याचा आनंददायी क्षण.',
                'description_en' => 'Experience rural transport heritage with authentic bullock cart rides across rustic village tracks.',
                'image' => 'https://images.unsplash.com/photo-1500937386664-56d1dfef3854?w=800&auto=format&fit=crop&q=80',
                'icon' => '🐂',
                'sort_order' => 6,
                'is_active' => true,
            ],
            [
                'title_mr' => 'पारंपारिक ग्रामीण खेळ',
                'title_en' => 'Rural Games',
                'short_description_mr' => 'विटी-दांडू, लगोरी, गोट्या, रस्सीखेच आणि जुन्या पारंपारिक खेळांची धमाल.',
                'short_description_en' => 'Classic outdoor village sports: Viti-Dandu, Lagori, Marbles, Tug-of-war, and archery.',
                'description_mr' => 'मोबाईलपासून दूर मोकळ्या मैदानात विटी-दांडू, लगोरी आणि जुन्या खेळांचा मनमुराद आनंद घ्या.',
                'description_en' => 'Relive childhood nostalgia and bond with family playing traditional Maharashtrian village games.',
                'image' => 'https://images.unsplash.com/photo-1511882150382-421056c89033?w=800&auto=format&fit=crop&q=80',
                'icon' => '🎯',
                'sort_order' => 7,
                'is_active' => true,
            ],
            [
                'title_mr' => 'मुलांचा खेळ परिसर व ॲडव्हेंचर झोन',
                'title_en' => 'Children’s Play Area',
                'short_description_mr' => 'झोपाळे, घसरगुंडी, क्लायंबिंग, ट्रॅम्पोलिन आणि वाळूचे सुरक्षित मैदान.',
                'short_description_en' => 'Dedicated kids outdoor adventure park with swings, slides, nets, trampoline, and sand pit.',
                'description_mr' => 'निसर्गाच्या मोकळ्या हवेत लहान मुलांच्या आनंदासाठी सुरक्षित आणि सुसज्ज खेळाचे मैदान.',
                'description_en' => 'A safe and vibrant outdoor play space specially designed for kids to enjoy active play in nature.',
                'image' => 'https://images.unsplash.com/photo-1533105079780-92b9be482077?w=800&auto=format&fit=crop&q=80',
                'icon' => '🎈',
                'sort_order' => 8,
                'is_active' => true,
            ],
            [
                'title_mr' => 'निसर्ग पायवाट व पक्षी निरीक्षण',
                'title_en' => 'Nature Walk',
                'short_description_mr' => 'हिरवेगार वृक्ष, फुलांच्या बागा आणि पक्ष्यांच्या किलबिलाटात रम्य पायवाट सफर.',
                'short_description_en' => 'Peaceful shaded walking trails through tree groves with fresh morning breezes and bird sounds.',
                'description_mr' => 'शहरातील प्रदूषणापासून दूर शांत निसर्गात पक्षांचा किलबिलाट ऐकत निवांत चालण्याचा आनंद.',
                'description_en' => 'Breathe fresh unpolluted air, spot native birds, and soak in tranquil greenery along marked trails.',
                'image' => 'https://images.unsplash.com/photo-1441974231531-c6227db76b6e?w=800&auto=format&fit=crop&q=80',
                'icon' => '🌳',
                'sort_order' => 9,
                'is_active' => true,
            ],
            [
                'title_mr' => 'हंगामी शेती कामे व पिक प्रात्यक्षिके',
                'title_en' => 'Seasonal Farming Activities',
                'short_description_mr' => 'भाजीपाला खुडणे, बीजारोपण, हुरडा भाजणे आणि शेतीच्या प्रत्यक्ष कामांचा अनुभव.',
                'short_description_en' => 'Hands-on vegetable harvesting, seed planting, hurda roasting, and farming traditions.',
                'description_mr' => 'प्रत्यक्ष शेतात उतरून भाजीपाला खुडणे, बी लावणे आणि हुरडा पार्टीचा खरा ग्रामीण अनुभव घ्या.',
                'description_en' => 'Experience the joy of harvesting your own farm-fresh vegetables and participate in seasonal traditions.',
                'image' => 'https://images.unsplash.com/photo-1592417817098-8f3d69109853?w=800&auto=format&fit=crop&q=80',
                'icon' => '🌱',
                'sort_order' => 10,
                'is_active' => true,
            ],
        ];

        // Ensure clean state for activities
        Activity::query()->delete();
        foreach ($activities as $act) {
            Activity::create($act);
        }
    }
}