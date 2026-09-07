-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: test_recovery
-- ------------------------------------------------------
-- Server version	10.4.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `activities`
--

DROP TABLE IF EXISTS `activities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `activities` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title_mr` varchar(255) DEFAULT NULL,
  `title_en` varchar(255) DEFAULT NULL,
  `short_description_mr` text DEFAULT NULL,
  `short_description_en` text DEFAULT NULL,
  `description_mr` longtext DEFAULT NULL,
  `description_en` longtext DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activities`
--

LOCK TABLES `activities` WRITE;
/*!40000 ALTER TABLE `activities` DISABLE KEYS */;
INSERT INTO `activities` VALUES (1,'भव्य वॉटर पार्क आणि स्लाइड्स','Grand Water Park & Slides','अनेक प्रकारच्या आंतरराष्ट्रीय दर्जाच्या वॉटर स्लाइड्स, वेव्ह पूल आणि लेझी रिव्हर.','Multi-tier high speed water slides, artificial wave pool, and lazy river.','विसावा वॉटर पार्क हे संपूर्ण कुटुंबासाठी मनमुराद आनंदाचे ठिकाण आहे. येथे लहानांपासून मोठ्यांपर्यंत सर्वांसाठी सुरक्षित व स्वच्छ पाण्याचे राइड्स उपलब्ध आहेत.','Visava Water Park provides world-class aquatic fun with certified lifeguards, UV-filtered pure water, and exciting slides for all age groups.',NULL,'🌊',1,1,'2026-08-25 04:36:25','2026-08-25 06:07:38','2026-08-25 06:07:38'),(2,'थ्रिल अम्युझमेंट राइड्स','Thrill Amusement Rides','रोलर कोस्टर, जायंट व्हील, बंपर कार्स आणि साहसी खेळ.','Roller coasters, giant wheels, bumper cars and family adventure games.','उत्कंठावर्धक अम्युझमेंट राइड्सचा अनुभव घ्या. आंतरराष्ट्रीय मानकांनुसार तपासणी केलेल्या सुरक्षित राइड्स.','Experience adrenaline-pumping mechanical rides engineered with precision safety and world-class standards.',NULL,'🎢',2,1,'2026-08-25 04:36:25','2026-08-25 06:07:38','2026-08-25 06:07:38'),(3,'लक्झरी व्हिला व डिलक्स कॉटेजेस','Luxury Stay & Deluxe Cottages','निसर्गरम्य बागांमध्ये वसलेले आधुनिक सुविधांयुक्त कॉटेजेस.','Garden view luxury cottages with modern amenities and scenic balconies.','शांत आणि प्रसन्न वातावरणात कुटुंबासह सुट्टी घालवण्यासाठी विसावा रिसॉर्टचे सुसज्ज कॉटेजेस उत्तम पर्याय आहेत.','Spacious cottages equipped with high-speed Wi-Fi, air conditioning, and 24/7 room service nestled in nature.',NULL,'🏡',3,1,'2026-08-25 04:36:25','2026-08-25 06:07:38','2026-08-25 06:07:38'),(4,'मल्टी-कुझिन रेस्टॉरंट व बुफे','Multi-Cuisine Dining & Cafes','स्वादिष्ट महाराष्ट्रीय, पंजाबी आणि चायनीज शाकाहारी व मांसाहारी भोजन.','Authentic Maharashtrian delicacies, North Indian buffets, and poolside cafes.','शुद्ध आणि ताज्या घटकांपासून तयार केलेले स्वादिष्ट अन्न. विसावा किचनमध्ये अमर्यादित बुफेची सुविधा.','Hygienic culinary masterclasses, authentic local flavors, and refreshing mocktails served at our resort restaurants.',NULL,'🍽️',4,1,'2026-08-25 04:36:25','2026-08-25 06:07:38','2026-08-25 06:07:38'),(5,'रेन डान्स आणि लाईव्ह डीजे पार्टी','Rain Dance & Live DJ Party','पाण्याच्या फवाऱ्यांखाली संगीताच्या तालावर थिरकण्याचा अनोखा अनुभव.','High-energy rain dance floor with pulsating live DJ music beats.','दररोज दुपारी आणि संध्याकाळी खास रेन डान्स पार्टी आयोजित केली जाते, जिथे सर्व वयोगटातील पाहुणे उत्साहाने सहभागी होतात.','Groove to the latest Bollywood and global beats under artificial rain showers with state-of-the-art sound systems.',NULL,'🎵',5,1,'2026-08-25 04:36:25','2026-08-25 06:07:38','2026-08-25 06:07:38'),(6,'किड्स फन व ॲडव्हेंचर झोन','Kids Fun & Adventure Zone','लहान मुलांसाठी सुरक्षित खेळ, ट्रॅम्पोलिन आणि टॉय ट्रेन्स.','Dedicated safe play area with trampolines, toy trains, and sand games.','लहान मुलांच्या कल्पकतेला आणि मनोरंजनाला वाव देणारे आकर्षक खेळ आणि सुरक्षित वातावरण.','A secure and colorful play park curated for toddlers and young children with cushioned play equipment.',NULL,'🎈',6,1,'2026-08-25 04:36:25','2026-08-25 06:07:38','2026-08-25 06:07:38'),(7,'द्राक्ष बागा व सेंद्रिय शेती शिवार फेरी','Grape Vineyard & Organic Farm Tour','१५ एकर विस्तीर्ण सेंद्रिय शेती, द्राक्ष बागा आणि फळबागांची मार्गदर्शित सफर.','Guided educational tour across 15 acres of organic farming, grape vineyards, and fruit orchards.','प्रत्यक्ष झाडावरून ताजी फळे चाखण्याचा आनंद आणि सेंद्रिय शेतीची सविस्तर माहिती.','Taste fresh fruits straight from the vine and learn sustainable farming practices with our resident experts.','https://images.unsplash.com/photo-1595974482597-4b8da8879bc5?w=800&auto=format&fit=crop&q=80','🍇',1,1,'2026-08-25 05:32:17','2026-08-25 06:07:38','2026-08-25 06:07:38'),(8,'चुलीवरची अस्सल गावरान मिसळ व जेवण','Wood-Fired Authentic Maharashtrian Dining','शेतात पिकवलेल्या ताज्या भाज्या आणि चुलीवरची झणझणीत गावरान चव.','Farm-to-table dining prepared on traditional earthen chulhas with secret village spices.','गरमागरम बाजरी-ज्वारीची भाकरी, पिठलं-ठेचा, वांग्याचं भरीत आणि शुद्ध गावठी तूप.','Savor piping hot bhakris, pithla-thecha, zanzanit misal, and farm-fresh organic vegetable curries.','https://images.unsplash.com/photo-1601050690597-df0568f70950?w=800&auto=format&fit=crop&q=80','🍲',2,1,'2026-08-25 05:32:17','2026-08-25 06:07:38','2026-08-25 06:07:38'),(9,'पारंपारिक बैलगाडी सफर व ग्रामीण खेळ','Traditional Bullock Cart Ride & Rural Games','सजावट केलेल्या बैलगाडीतून मळ्याची सफर, विटी-दांडू, गोट्या व लगोरी.','Enjoy scenic bullock cart rides across farm trails along with nostalgic childhood village games.','लहान मुलांसाठी आणि कुटुंबीयांसाठी अस्सल जुन्या आठवणींना उजाळा देणारा अनुभव.','Relive childhood nostalgia with traditional outdoor sports, tractor rides, and pottery making.','https://images.unsplash.com/photo-1500937386664-56d1dfef3854?w=800&auto=format&fit=crop&q=80','🐂',3,1,'2026-08-25 05:32:17','2026-08-25 06:07:38','2026-08-25 06:07:38'),(10,'स्वच्छ स्विमिंग पूल, रेन डान्स व विहीर स्नान','Swimming Pool, Rain Dance & Well Bathing','शुद्ध पाण्याचा स्विमिंग पूल, रेन डान्स फ्लोअर आणि पारंपारिक विहीर स्नान.','Ultra-filtered clean swimming pool, pulsating rain dance floor, and traditional farm well bathing.','उन्हाळ्याच्या आणि सुट्टीच्या दिवसात संपूर्ण कुटुंबासाठी मनसोक्त जलविहार.','Cool off in our hygienic swimming pool with separate kids splash area and music-synced rain dance.','https://images.unsplash.com/photo-1571003123894-1f0594d2b5d9?w=800&auto=format&fit=crop&q=80','🏊‍♂️',4,1,'2026-08-25 05:32:17','2026-08-25 06:07:38','2026-08-25 06:07:38'),(11,'हंगामी हुरडा पार्टी व शेकोटी','Seasonal Hurda Party & Bonfire','हिवाळ्यातील गरमागरम भाजलेला हुरडा, गुळ-शेंगदाणा चटणी आणि संध्याकाळची शेकोटी.','Roasted tender green jowar hurda served with delicious chutneys and cozy evening bonfires.','थंडीच्या मोसमात मळ्यातील हुरड्याची चव आणि कौटुंबिक गप्पांची रंगतदार संध्याकाळ.','Gather around the glowing bonfire for roasted hurda feasts under starry countryside skies.','https://images.unsplash.com/photo-1543083477-4f785aeafaa9?w=800&auto=format&fit=crop&q=80','🌾',5,1,'2026-08-25 05:32:17','2026-08-25 06:07:38','2026-08-25 06:07:38'),(12,'डिलक्स फार्म कॉटेज व निसर्गरम्य मुक्काम','Deluxe Farm Cottages & Peaceful Stay','हिरवेगार बागांमध्ये वसलेले सुसज्ज वातानुकूलित कॉटेजेस आणि प्रशस्त व्हरांडा.','Spacious nature-view deluxe cottages with modern amenities, AC, and serene private verandas.','शांत आणि प्रदूषणमुक्त वातावरणात कुटुंबासह सुरक्षित मुक्कामाची उत्तम सोय.','Wake up to the chirping of birds and crisp fresh air in our thoughtfully designed rustic cottages.','https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?w=800&auto=format&fit=crop&q=80','🏡',6,1,'2026-08-25 05:32:17','2026-08-25 06:07:38','2026-08-25 06:07:38'),(13,'मुलांचा ॲडव्हेंचर व खेळ परिसर','Children\'s Play Area & Adventure Zone','झोपाळे, घसरगुंडी, क्लायंबिंग आणि सुरक्षित मैदानी खेळांचे विस्तीर्ण मैदान.','Safe outdoor playground with swings, slides, climbing nets, and spacious green turf.','लहान मुलांच्या सर्वांगीण विकासासाठी आणि आनंदासाठी सुरक्षित खेळाचे आकर्षण.','A joyful haven for kids with curated outdoor obstacles, trampolines, and sand play pits.','https://images.unsplash.com/photo-1533105079780-92b9be482077?w=800&auto=format&fit=crop&q=80','🎈',7,1,'2026-08-25 05:53:31','2026-08-25 06:07:38','2026-08-25 06:07:38'),(14,'रेन डान्स आणि म्युझिक पार्टी','Rain Dance & Music Party','मनमुराद संगीताच्या तालावर थंडगार पाण्याच्या सरींमध्ये नाचण्याचा आनंद.','Dance to upbeat festive tunes under refreshing cooling water mist sprays and showers.','मित्र आणि कुटुंबासह आनंदोत्सव साजरा करण्यासाठी खास रेन डान्स फ्लोअर.','High-energy outdoor rain dance arena equipped with state-of-the-art sound systems.','https://images.unsplash.com/photo-1514525253161-7a46d19cd819?w=800&auto=format&fit=crop&q=80','🎵',8,1,'2026-08-25 05:53:31','2026-08-25 06:07:38','2026-08-25 06:07:38'),(15,'निसर्ग पायवाट व पक्षी निरीक्षण','Nature Walk & Bird Watching Trail','हिरवेगार वृक्ष, फुलांच्या बागा आणि विविध पक्ष्यांच्या दर्शनासाठी रम्य पायवाट.','Scenic walking trails through green groves, flowering gardens, and birding spots.','सकाळच्या कोवळ्या उन्हात निसर्गाच्या कुशीत शांत मनःशांती देणारी सफर.','Breathe deep and reconnect with nature on our peaceful marked farm trails.','https://images.unsplash.com/photo-1441974231531-c6227db76b6e?w=800&auto=format&fit=crop&q=80','🌳',9,1,'2026-08-25 05:53:31','2026-08-25 06:07:38','2026-08-25 06:07:38'),(16,'सेंद्रिय शेती व पिक प्रात्यक्षिके','Seasonal Farming & Organic Harvesting','भाजीपाला खुडणे, बीजारोपण आणि शेती कामांचा प्रत्यक्ष अनुभव.','Hands-on organic harvesting, vegetable picking, and planting demonstrations.','शहरी पाहुण्यांना आणि विद्यार्थ्यांना शेतीचे महत्त्व शिकवणारे प्रत्यक्ष प्रात्यक्षिक.','Get your hands in the soil and harvest seasonal produce straight from our living beds.','https://images.unsplash.com/photo-1500382017468-9049fed747ef?w=800&auto=format&fit=crop&q=80','🌱',10,1,'2026-08-25 05:53:31','2026-08-25 06:07:38','2026-08-25 06:07:38'),(17,'स्वच्छ स्विमिंग पूल व विहीर स्नान','Swimming Pool','शुद्ध आणि स्वच्छ पाण्याचा स्विमिंग पूल, लहान मुलांचा पूल आणि पारंपारिक विहीर स्नान.','Crystal-clear filtered swimming pool with kids splash area and authentic farm well bathing experience.','उन्हाळ्याच्या आणि सुट्टीच्या दिवसात संपूर्ण कुटुंबासाठी मनसोक्त जलविहार आणि पारंपारिक विहिरीच्या पाण्याचा आनंद.','Relax and refresh in our hygienic swimming pool amidst nature, featuring filtered water and traditional well bathing.','https://images.unsplash.com/photo-1571003123894-1f0594d2b5d9?w=800&auto=format&fit=crop&q=80','🏊‍♂️',1,1,'2026-08-25 06:07:38','2026-08-25 06:15:30','2026-08-25 06:15:30'),(18,'रेन डान्स आणि म्युझिक पार्टी','Rain Dance','थंडगार पाण्याच्या सरींमध्ये डीजे संगीताच्या तालावर मनमुराद नाचण्याचा आनंद.','High-energy rain dance floor with cool water mist showers and live music beats.','मित्र आणि कुटुंबासह संगीताच्या तालावर थंडगार पाण्याच्या सरींखाली आनंदोत्सव साजरा करा.','Celebrate joyful moments with family and friends on our spacious rain dance arena with high-quality sound.','https://images.unsplash.com/photo-1514525253161-7a46d19cd819?w=800&auto=format&fit=crop&q=80','🎵',2,1,'2026-08-25 06:07:38','2026-08-25 06:15:30','2026-08-25 06:15:30'),(19,'द्राक्ष बागा शिवार फेरी','Grape Vineyard Tour','१५ एकर विस्तीर्ण द्राक्ष बागा आणि फळबागांची मार्गदर्शित शिवार फेरी.','Guided educational walk through lush grape vineyards and organic fruit orchards.','विस्तीर्ण द्राक्ष बागांमध्ये फिरा, आधुनिक शेती पद्धतींची माहिती घ्या आणि गोड फळांचा आस्वाद घ्या.','Stroll through sprawling vineyards, learn about cultivation techniques, and taste freshly plucked fruits.','https://images.unsplash.com/photo-1595974482597-4b8da8879bc5?w=800&auto=format&fit=crop&q=80','🍇',3,1,'2026-08-25 06:07:38','2026-08-25 06:15:30','2026-08-25 06:15:30'),(20,'चुलीवरची अस्सल गावरान मिसळ व जेवण','Traditional Wood-Fired Misal','शेतातील ताज्या भाज्या आणि चुलीवर तयार केलेली झणझणीत गावरान मिसळ व जेवण.','Farm-to-table dining prepared on traditional wood-fired earthen chulhas.','गरमागरम बाजरी-ज्वारीची भाकरी, पिठलं-ठेचा, वांग्याचं भरीत आणि शुद्ध गावठी तुपातील चविष्ट जेवण.','Relish piping hot wood-fired misal, bajra bhakris, pithla-thecha, and authentic rural delicacies.','https://images.unsplash.com/photo-1601050690597-df0568f70950?w=800&auto=format&fit=crop&q=80','🍲',4,1,'2026-08-25 06:07:38','2026-08-25 06:15:30','2026-08-25 06:15:30'),(21,'सेंद्रिय शेती व शिवार फेरी','Farm Visit','सेंद्रिय शेती, भाजीपाला आणि विविध पिकांची माहिती देणारी प्रत्यक्ष शिवार फेरी.','Educational agro-tour across 15 acres of organic crops, polyhouses, and vegetation.','सेंद्रिय शेती, आधुनिक तंत्रज्ञान आणि हिरवेगार शिवार जवळून अनुभवण्याची उत्तम संधी.','Explore sustainable organic farming methods, visit green polyhouses, and reconnect with agriculture roots.','https://images.unsplash.com/photo-1500382017468-9049fed747ef?w=800&auto=format&fit=crop&q=80','🌾',5,1,'2026-08-25 06:07:38','2026-08-25 06:15:30','2026-08-25 06:15:30'),(22,'पारंपारिक बैलगाडी सफर','Bullock Cart Ride','सजावट केलेल्या पारंपारिक बैलगाडीतून मळ्याच्या बांधावरून रपेट मारण्याचा आनंद.','Nostalgic ride on beautifully decorated bullock carts around countryside farm trails.','लहान-मोठ्या सर्वांसाठी बैलगाडीतून फिरण्याचा आणि ग्रामीण संस्कृती अनुभवण्याचा आनंददायी क्षण.','Experience rural transport heritage with authentic bullock cart rides across rustic village tracks.','https://images.unsplash.com/photo-1500937386664-56d1dfef3854?w=800&auto=format&fit=crop&q=80','🐂',6,1,'2026-08-25 06:07:38','2026-08-25 06:15:30','2026-08-25 06:15:30'),(23,'पारंपारिक ग्रामीण खेळ','Rural Games','विटी-दांडू, लगोरी, गोट्या, रस्सीखेच आणि जुन्या पारंपारिक खेळांची धमाल.','Classic outdoor village sports: Viti-Dandu, Lagori, Marbles, Tug-of-war, and archery.','मोबाईलपासून दूर मोकळ्या मैदानात विटी-दांडू, लगोरी आणि जुन्या खेळांचा मनमुराद आनंद घ्या.','Relive childhood nostalgia and bond with family playing traditional Maharashtrian village games.','https://images.unsplash.com/photo-1511882150382-421056c89033?w=800&auto=format&fit=crop&q=80','🎯',7,1,'2026-08-25 06:07:38','2026-08-25 06:15:30','2026-08-25 06:15:30'),(24,'मुलांचा खेळ परिसर व ॲडव्हेंचर झोन','Children’s Play Area','झोपाळे, घसरगुंडी, क्लायंबिंग, ट्रॅम्पोलिन आणि वाळूचे सुरक्षित मैदान.','Dedicated kids outdoor adventure park with swings, slides, nets, trampoline, and sand pit.','निसर्गाच्या मोकळ्या हवेत लहान मुलांच्या आनंदासाठी सुरक्षित आणि सुसज्ज खेळाचे मैदान.','A safe and vibrant outdoor play space specially designed for kids to enjoy active play in nature.','https://images.unsplash.com/photo-1533105079780-92b9be482077?w=800&auto=format&fit=crop&q=80','🎈',8,1,'2026-08-25 06:07:38','2026-08-25 06:15:30','2026-08-25 06:15:30'),(25,'निसर्ग पायवाट व पक्षी निरीक्षण','Nature Walk','हिरवेगार वृक्ष, फुलांच्या बागा आणि पक्ष्यांच्या किलबिलाटात रम्य पायवाट सफर.','Peaceful shaded walking trails through tree groves with fresh morning breezes and bird sounds.','शहरातील प्रदूषणापासून दूर शांत निसर्गात पक्षांचा किलबिलाट ऐकत निवांत चालण्याचा आनंद.','Breathe fresh unpolluted air, spot native birds, and soak in tranquil greenery along marked trails.','https://images.unsplash.com/photo-1441974231531-c6227db76b6e?w=800&auto=format&fit=crop&q=80','🌳',9,1,'2026-08-25 06:07:38','2026-08-25 06:15:30','2026-08-25 06:15:30'),(26,'हंगामी शेती कामे व पिक प्रात्यक्षिके','Seasonal Farming Activities','भाजीपाला खुडणे, बीजारोपण, हुरडा भाजणे आणि शेतीच्या प्रत्यक्ष कामांचा अनुभव.','Hands-on vegetable harvesting, seed planting, hurda roasting, and farming traditions.','प्रत्यक्ष शेतात उतरून भाजीपाला खुडणे, बी लावणे आणि हुरडा पार्टीचा खरा ग्रामीण अनुभव घ्या.','Experience the joy of harvesting your own farm-fresh vegetables and participate in seasonal traditions.','https://images.unsplash.com/photo-1592417817098-8f3d69109853?w=800&auto=format&fit=crop&q=80','🌱',10,1,'2026-08-25 06:07:38','2026-08-25 06:15:30','2026-08-25 06:15:30'),(27,'स्वच्छ स्विमिंग पूल व विहीर स्नान','Swimming Pool','शुद्ध आणि स्वच्छ पाण्याचा स्विमिंग पूल, लहान मुलांचा पूल आणि पारंपारिक विहीर स्नान.','Crystal-clear filtered swimming pool with kids splash area and authentic farm well bathing experience.','उन्हाळ्याच्या आणि सुट्टीच्या दिवसात संपूर्ण कुटुंबासाठी मनसोक्त जलविहार आणि पारंपारिक विहिरीच्या पाण्याचा आनंद.','Relax and refresh in our hygienic swimming pool amidst nature, featuring filtered water and traditional well bathing.','https://images.unsplash.com/photo-1571003123894-1f0594d2b5d9?w=800&auto=format&fit=crop&q=80','🏊‍♂️',1,1,'2026-08-25 06:15:30','2026-08-25 06:27:15','2026-08-25 06:27:15'),(28,'रेन डान्स आणि म्युझिक पार्टी','Rain Dance','थंडगार पाण्याच्या सरींमध्ये डीजे संगीताच्या तालावर मनमुराद नाचण्याचा आनंद.','High-energy rain dance floor with cool water mist showers and live music beats.','मित्र आणि कुटुंबासह संगीताच्या तालावर थंडगार पाण्याच्या सरींखाली आनंदोत्सव साजरा करा.','Celebrate joyful moments with family and friends on our spacious rain dance arena with high-quality sound.','https://images.unsplash.com/photo-1514525253161-7a46d19cd819?w=800&auto=format&fit=crop&q=80','🎵',2,1,'2026-08-25 06:15:30','2026-08-25 06:27:15','2026-08-25 06:27:15'),(29,'द्राक्ष बागा शिवार फेरी','Grape Vineyard Tour','१५ एकर विस्तीर्ण द्राक्ष बागा आणि फळबागांची मार्गदर्शित शिवार फेरी.','Guided educational walk through lush grape vineyards and organic fruit orchards.','विस्तीर्ण द्राक्ष बागांमध्ये फिरा, आधुनिक शेती पद्धतींची माहिती घ्या आणि गोड फळांचा आस्वाद घ्या.','Stroll through sprawling vineyards, learn about cultivation techniques, and taste freshly plucked fruits.','https://images.unsplash.com/photo-1595974482597-4b8da8879bc5?w=800&auto=format&fit=crop&q=80','🍇',3,1,'2026-08-25 06:15:30','2026-08-25 06:27:15','2026-08-25 06:27:15'),(30,'चुलीवरची अस्सल गावरान मिसळ व जेवण','Traditional Wood-Fired Misal','शेतातील ताज्या भाज्या आणि चुलीवर तयार केलेली झणझणीत गावरान मिसळ व जेवण.','Farm-to-table dining prepared on traditional wood-fired earthen chulhas.','गरमागरम बाजरी-ज्वारीची भाकरी, पिठलं-ठेचा, वांग्याचं भरीत आणि शुद्ध गावठी तुपातील चविष्ट जेवण.','Relish piping hot wood-fired misal, bajra bhakris, pithla-thecha, and authentic rural delicacies.','https://images.unsplash.com/photo-1601050690597-df0568f70950?w=800&auto=format&fit=crop&q=80','🍲',4,1,'2026-08-25 06:15:30','2026-08-25 06:27:15','2026-08-25 06:27:15'),(31,'सेंद्रिय शेती व शिवार फेरी','Farm Visit','सेंद्रिय शेती, भाजीपाला आणि विविध पिकांची माहिती देणारी प्रत्यक्ष शिवार फेरी.','Educational agro-tour across 15 acres of organic crops, polyhouses, and vegetation.','सेंद्रिय शेती, आधुनिक तंत्रज्ञान आणि हिरवेगार शिवार जवळून अनुभवण्याची उत्तम संधी.','Explore sustainable organic farming methods, visit green polyhouses, and reconnect with agriculture roots.','https://images.unsplash.com/photo-1500382017468-9049fed747ef?w=800&auto=format&fit=crop&q=80','🌾',5,1,'2026-08-25 06:15:30','2026-08-25 06:27:15','2026-08-25 06:27:15'),(32,'पारंपारिक बैलगाडी सफर','Bullock Cart Ride','सजावट केलेल्या पारंपारिक बैलगाडीतून मळ्याच्या बांधावरून रपेट मारण्याचा आनंद.','Nostalgic ride on beautifully decorated bullock carts around countryside farm trails.','लहान-मोठ्या सर्वांसाठी बैलगाडीतून फिरण्याचा आणि ग्रामीण संस्कृती अनुभवण्याचा आनंददायी क्षण.','Experience rural transport heritage with authentic bullock cart rides across rustic village tracks.','https://images.unsplash.com/photo-1500937386664-56d1dfef3854?w=800&auto=format&fit=crop&q=80','🐂',6,1,'2026-08-25 06:15:30','2026-08-25 06:27:15','2026-08-25 06:27:15'),(33,'पारंपारिक ग्रामीण खेळ','Rural Games','विटी-दांडू, लगोरी, गोट्या, रस्सीखेच आणि जुन्या पारंपारिक खेळांची धमाल.','Classic outdoor village sports: Viti-Dandu, Lagori, Marbles, Tug-of-war, and archery.','मोबाईलपासून दूर मोकळ्या मैदानात विटी-दांडू, लगोरी आणि जुन्या खेळांचा मनमुराद आनंद घ्या.','Relive childhood nostalgia and bond with family playing traditional Maharashtrian village games.','https://images.unsplash.com/photo-1511882150382-421056c89033?w=800&auto=format&fit=crop&q=80','🎯',7,1,'2026-08-25 06:15:30','2026-08-25 06:27:15','2026-08-25 06:27:15'),(34,'मुलांचा खेळ परिसर व ॲडव्हेंचर झोन','Children’s Play Area','झोपाळे, घसरगुंडी, क्लायंबिंग, ट्रॅम्पोलिन आणि वाळूचे सुरक्षित मैदान.','Dedicated kids outdoor adventure park with swings, slides, nets, trampoline, and sand pit.','निसर्गाच्या मोकळ्या हवेत लहान मुलांच्या आनंदासाठी सुरक्षित आणि सुसज्ज खेळाचे मैदान.','A safe and vibrant outdoor play space specially designed for kids to enjoy active play in nature.','https://images.unsplash.com/photo-1533105079780-92b9be482077?w=800&auto=format&fit=crop&q=80','🎈',8,1,'2026-08-25 06:15:30','2026-08-25 06:27:15','2026-08-25 06:27:15'),(35,'निसर्ग पायवाट व पक्षी निरीक्षण','Nature Walk','हिरवेगार वृक्ष, फुलांच्या बागा आणि पक्ष्यांच्या किलबिलाटात रम्य पायवाट सफर.','Peaceful shaded walking trails through tree groves with fresh morning breezes and bird sounds.','शहरातील प्रदूषणापासून दूर शांत निसर्गात पक्षांचा किलबिलाट ऐकत निवांत चालण्याचा आनंद.','Breathe fresh unpolluted air, spot native birds, and soak in tranquil greenery along marked trails.','https://images.unsplash.com/photo-1441974231531-c6227db76b6e?w=800&auto=format&fit=crop&q=80','🌳',9,1,'2026-08-25 06:15:30','2026-08-25 06:27:15','2026-08-25 06:27:15'),(36,'हंगामी शेती कामे व पिक प्रात्यक्षिके','Seasonal Farming Activities','भाजीपाला खुडणे, बीजारोपण, हुरडा भाजणे आणि शेतीच्या प्रत्यक्ष कामांचा अनुभव.','Hands-on vegetable harvesting, seed planting, hurda roasting, and farming traditions.','प्रत्यक्ष शेतात उतरून भाजीपाला खुडणे, बी लावणे आणि हुरडा पार्टीचा खरा ग्रामीण अनुभव घ्या.','Experience the joy of harvesting your own farm-fresh vegetables and participate in seasonal traditions.','https://images.unsplash.com/photo-1592417817098-8f3d69109853?w=800&auto=format&fit=crop&q=80','🌱',10,1,'2026-08-25 06:15:30','2026-08-25 06:27:15','2026-08-25 06:27:15'),(37,'स्वच्छ स्विमिंग पूल व विहीर स्नान','Swimming Pool','शुद्ध आणि स्वच्छ पाण्याचा स्विमिंग पूल, लहान मुलांचा पूल आणि पारंपारिक विहीर स्नान.','Crystal-clear filtered swimming pool with kids splash area and authentic farm well bathing experience.','उन्हाळ्याच्या आणि सुट्टीच्या दिवसात संपूर्ण कुटुंबासाठी मनसोक्त जलविहार आणि पारंपारिक विहिरीच्या पाण्याचा आनंद.','Relax and refresh in our hygienic swimming pool amidst nature, featuring filtered water and traditional well bathing.','https://images.unsplash.com/photo-1571003123894-1f0594d2b5d9?w=800&auto=format&fit=crop&q=80','🏊‍♂️',1,1,'2026-08-25 06:27:15','2026-08-25 06:43:48','2026-08-25 06:43:48'),(38,'रेन डान्स आणि म्युझिक पार्टी','Rain Dance','थंडगार पाण्याच्या सरींमध्ये डीजे संगीताच्या तालावर मनमुराद नाचण्याचा आनंद.','High-energy rain dance floor with cool water mist showers and live music beats.','मित्र आणि कुटुंबासह संगीताच्या तालावर थंडगार पाण्याच्या सरींखाली आनंदोत्सव साजरा करा.','Celebrate joyful moments with family and friends on our spacious rain dance arena with high-quality sound.','https://images.unsplash.com/photo-1514525253161-7a46d19cd819?w=800&auto=format&fit=crop&q=80','🎵',2,1,'2026-08-25 06:27:15','2026-08-25 06:43:48','2026-08-25 06:43:48'),(39,'द्राक्ष बागा शिवार फेरी','Grape Vineyard Tour','१५ एकर विस्तीर्ण द्राक्ष बागा आणि फळबागांची मार्गदर्शित शिवार फेरी.','Guided educational walk through lush grape vineyards and organic fruit orchards.','विस्तीर्ण द्राक्ष बागांमध्ये फिरा, आधुनिक शेती पद्धतींची माहिती घ्या आणि गोड फळांचा आस्वाद घ्या.','Stroll through sprawling vineyards, learn about cultivation techniques, and taste freshly plucked fruits.','https://images.unsplash.com/photo-1595974482597-4b8da8879bc5?w=800&auto=format&fit=crop&q=80','🍇',3,1,'2026-08-25 06:27:15','2026-08-25 06:43:48','2026-08-25 06:43:48'),(40,'चुलीवरची अस्सल गावरान मिसळ व जेवण','Traditional Wood-Fired Misal','शेतातील ताज्या भाज्या आणि चुलीवर तयार केलेली झणझणीत गावरान मिसळ व जेवण.','Farm-to-table dining prepared on traditional wood-fired earthen chulhas.','गरमागरम बाजरी-ज्वारीची भाकरी, पिठलं-ठेचा, वांग्याचं भरीत आणि शुद्ध गावठी तुपातील चविष्ट जेवण.','Relish piping hot wood-fired misal, bajra bhakris, pithla-thecha, and authentic rural delicacies.','https://images.unsplash.com/photo-1601050690597-df0568f70950?w=800&auto=format&fit=crop&q=80','🍲',4,1,'2026-08-25 06:27:15','2026-08-25 06:43:48','2026-08-25 06:43:48'),(41,'सेंद्रिय शेती व शिवार फेरी','Farm Visit','सेंद्रिय शेती, भाजीपाला आणि विविध पिकांची माहिती देणारी प्रत्यक्ष शिवार फेरी.','Educational agro-tour across 15 acres of organic crops, polyhouses, and vegetation.','सेंद्रिय शेती, आधुनिक तंत्रज्ञान आणि हिरवेगार शिवार जवळून अनुभवण्याची उत्तम संधी.','Explore sustainable organic farming methods, visit green polyhouses, and reconnect with agriculture roots.','https://images.unsplash.com/photo-1500382017468-9049fed747ef?w=800&auto=format&fit=crop&q=80','🌾',5,1,'2026-08-25 06:27:15','2026-08-25 06:43:48','2026-08-25 06:43:48'),(42,'पारंपारिक बैलगाडी सफर','Bullock Cart Ride','सजावट केलेल्या पारंपारिक बैलगाडीतून मळ्याच्या बांधावरून रपेट मारण्याचा आनंद.','Nostalgic ride on beautifully decorated bullock carts around countryside farm trails.','लहान-मोठ्या सर्वांसाठी बैलगाडीतून फिरण्याचा आणि ग्रामीण संस्कृती अनुभवण्याचा आनंददायी क्षण.','Experience rural transport heritage with authentic bullock cart rides across rustic village tracks.','https://images.unsplash.com/photo-1500937386664-56d1dfef3854?w=800&auto=format&fit=crop&q=80','🐂',6,1,'2026-08-25 06:27:15','2026-08-25 06:43:48','2026-08-25 06:43:48'),(43,'पारंपारिक ग्रामीण खेळ','Rural Games','विटी-दांडू, लगोरी, गोट्या, रस्सीखेच आणि जुन्या पारंपारिक खेळांची धमाल.','Classic outdoor village sports: Viti-Dandu, Lagori, Marbles, Tug-of-war, and archery.','मोबाईलपासून दूर मोकळ्या मैदानात विटी-दांडू, लगोरी आणि जुन्या खेळांचा मनमुराद आनंद घ्या.','Relive childhood nostalgia and bond with family playing traditional Maharashtrian village games.','https://images.unsplash.com/photo-1511882150382-421056c89033?w=800&auto=format&fit=crop&q=80','🎯',7,1,'2026-08-25 06:27:15','2026-08-25 06:43:48','2026-08-25 06:43:48'),(44,'मुलांचा खेळ परिसर व ॲडव्हेंचर झोन','Children’s Play Area','झोपाळे, घसरगुंडी, क्लायंबिंग, ट्रॅम्पोलिन आणि वाळूचे सुरक्षित मैदान.','Dedicated kids outdoor adventure park with swings, slides, nets, trampoline, and sand pit.','निसर्गाच्या मोकळ्या हवेत लहान मुलांच्या आनंदासाठी सुरक्षित आणि सुसज्ज खेळाचे मैदान.','A safe and vibrant outdoor play space specially designed for kids to enjoy active play in nature.','https://images.unsplash.com/photo-1533105079780-92b9be482077?w=800&auto=format&fit=crop&q=80','🎈',8,1,'2026-08-25 06:27:15','2026-08-25 06:43:48','2026-08-25 06:43:48'),(45,'निसर्ग पायवाट व पक्षी निरीक्षण','Nature Walk','हिरवेगार वृक्ष, फुलांच्या बागा आणि पक्ष्यांच्या किलबिलाटात रम्य पायवाट सफर.','Peaceful shaded walking trails through tree groves with fresh morning breezes and bird sounds.','शहरातील प्रदूषणापासून दूर शांत निसर्गात पक्षांचा किलबिलाट ऐकत निवांत चालण्याचा आनंद.','Breathe fresh unpolluted air, spot native birds, and soak in tranquil greenery along marked trails.','https://images.unsplash.com/photo-1441974231531-c6227db76b6e?w=800&auto=format&fit=crop&q=80','🌳',9,1,'2026-08-25 06:27:15','2026-08-25 06:43:48','2026-08-25 06:43:48'),(46,'हंगामी शेती कामे व पिक प्रात्यक्षिके','Seasonal Farming Activities','भाजीपाला खुडणे, बीजारोपण, हुरडा भाजणे आणि शेतीच्या प्रत्यक्ष कामांचा अनुभव.','Hands-on vegetable harvesting, seed planting, hurda roasting, and farming traditions.','प्रत्यक्ष शेतात उतरून भाजीपाला खुडणे, बी लावणे आणि हुरडा पार्टीचा खरा ग्रामीण अनुभव घ्या.','Experience the joy of harvesting your own farm-fresh vegetables and participate in seasonal traditions.','https://images.unsplash.com/photo-1592417817098-8f3d69109853?w=800&auto=format&fit=crop&q=80','🌱',10,1,'2026-08-25 06:27:15','2026-08-25 06:43:48','2026-08-25 06:43:48'),(47,'स्वच्छ स्विमिंग पूल व विहीर स्नान','Swimming Pool','शुद्ध आणि स्वच्छ पाण्याचा स्विमिंग पूल, लहान मुलांचा पूल आणि पारंपारिक विहीर स्नान.','Crystal-clear filtered swimming pool with kids splash area and authentic farm well bathing experience.','उन्हाळ्याच्या आणि सुट्टीच्या दिवसात संपूर्ण कुटुंबासाठी मनसोक्त जलविहार आणि पारंपारिक विहिरीच्या पाण्याचा आनंद.','Relax and refresh in our hygienic swimming pool amidst nature, featuring filtered water and traditional well bathing.','uploads/activities/1787809332_GDBCa6Xmiv.jpg','🏊‍♂️',1,1,'2026-08-25 06:43:48','2026-08-31 03:09:45','2026-08-31 03:09:45'),(48,'रेन डान्स आणि म्युझिक पार्टी','Rain Dance','थंडगार पाण्याच्या सरींमध्ये डीजे संगीताच्या तालावर मनमुराद नाचण्याचा आनंद.','High-energy rain dance floor with cool water mist showers and live music beats.','मित्र आणि कुटुंबासह संगीताच्या तालावर थंडगार पाण्याच्या सरींखाली आनंदोत्सव साजरा करा.','Celebrate joyful moments with family and friends on our spacious rain dance arena with high-quality sound.','https://images.unsplash.com/photo-1514525253161-7a46d19cd819?w=800&auto=format&fit=crop&q=80','🎵',2,1,'2026-08-25 06:43:48','2026-08-31 03:09:45','2026-08-31 03:09:45'),(49,'द्राक्ष बागा शिवार फेरी','Grape Vineyard Tour','१५ एकर विस्तीर्ण द्राक्ष बागा आणि फळबागांची मार्गदर्शित शिवार फेरी.','Guided educational walk through lush grape vineyards and organic fruit orchards.','विस्तीर्ण द्राक्ष बागांमध्ये फिरा, आधुनिक शेती पद्धतींची माहिती घ्या आणि गोड फळांचा आस्वाद घ्या.','Stroll through sprawling vineyards, learn about cultivation techniques, and taste freshly plucked fruits.','uploads/activities/visawa_vineyard_patio.jpg','🍇',3,1,'2026-08-25 06:43:48','2026-08-31 03:09:45','2026-08-31 03:09:45'),(50,'चुलीवरची अस्सल गावरान मिसळ व जेवण','Traditional Wood-Fired Misal','शेतातील ताज्या भाज्या आणि चुलीवर तयार केलेली झणझणीत गावरान मिसळ व जेवण.','Farm-to-table dining prepared on traditional wood-fired earthen chulhas.','गरमागरम बाजरी-ज्वारीची भाकरी, पिठलं-ठेचा, वांग्याचं भरीत आणि शुद्ध गावठी तुपातील चविष्ट जेवण.','Relish piping hot wood-fired misal, bajra bhakris, pithla-thecha, and authentic rural delicacies.','uploads/activities/1787809217_TXV6BdK7Fg.jpg','🍲',4,1,'2026-08-25 06:43:48','2026-08-31 03:09:45','2026-08-31 03:09:45'),(51,'सेंद्रिय शेती व शिवार फेरी','Farm Visit','सेंद्रिय शेती, भाजीपाला आणि विविध पिकांची माहिती देणारी प्रत्यक्ष शिवार फेरी.','Educational agro-tour across 15 acres of organic crops, polyhouses, and vegetation.','सेंद्रिय शेती, आधुनिक तंत्रज्ञान आणि हिरवेगार शिवार जवळून अनुभवण्याची उत्तम संधी.','Explore sustainable organic farming methods, visit green polyhouses, and reconnect with agriculture roots.','uploads/activities/visawa_farm_orchard.jpg','🌾',5,1,'2026-08-25 06:43:48','2026-08-31 03:09:45','2026-08-31 03:09:45'),(52,'पारंपारिक बैलगाडी सफर','Bullock Cart Ride','सजावट केलेल्या पारंपारिक बैलगाडीतून मळ्याच्या बांधावरून रपेट मारण्याचा आनंद.','Nostalgic ride on beautifully decorated bullock carts around countryside farm trails.','लहान-मोठ्या सर्वांसाठी बैलगाडीतून फिरण्याचा आणि ग्रामीण संस्कृती अनुभवण्याचा आनंददायी क्षण.','Experience rural transport heritage with authentic bullock cart rides across rustic village tracks.','uploads/activities/visawa_goshala_cows.jpg','🐂',6,1,'2026-08-25 06:43:48','2026-08-31 03:09:45','2026-08-31 03:09:45'),(53,'पारंपारिक ग्रामीण खेळ','Rural Games','विटी-दांडू, लगोरी, गोट्या, रस्सीखेच आणि जुन्या पारंपारिक खेळांची धमाल.','Classic outdoor village sports: Viti-Dandu, Lagori, Marbles, Tug-of-war, and archery.','मोबाईलपासून दूर मोकळ्या मैदानात विटी-दांडू, लगोरी आणि जुन्या खेळांचा मनमुराद आनंद घ्या.','Relive childhood nostalgia and bond with family playing traditional Maharashtrian village games.','uploads/activities/visawa_rural_relaxation.jpg','🎯',7,1,'2026-08-25 06:43:48','2026-08-31 03:09:45','2026-08-31 03:09:45'),(54,'मुलांचा खेळ परिसर व ॲडव्हेंचर झोन','Children’s Play Area','झोपाळे, घसरगुंडी, क्लायंबिंग, ट्रॅम्पोलिन आणि वाळूचे सुरक्षित मैदान.','Dedicated kids outdoor adventure park with swings, slides, nets, trampoline, and sand pit.','निसर्गाच्या मोकळ्या हवेत लहान मुलांच्या आनंदासाठी सुरक्षित आणि सुसज्ज खेळाचे मैदान.','A safe and vibrant outdoor play space specially designed for kids to enjoy active play in nature.','uploads/activities/visawa_kids_tractor_train.jpg','🎈',8,1,'2026-08-25 06:43:48','2026-08-31 03:09:45','2026-08-31 03:09:45'),(55,'निसर्ग पायवाट व पक्षी निरीक्षण','Nature Walk','हिरवेगार वृक्ष, फुलांच्या बागा आणि पक्ष्यांच्या किलबिलाटात रम्य पायवाट सफर.','Peaceful shaded walking trails through tree groves with fresh morning breezes and bird sounds.','शहरातील प्रदूषणापासून दूर शांत निसर्गात पक्षांचा किलबिलाट ऐकत निवांत चालण्याचा आनंद.','Breathe fresh unpolluted air, spot native birds, and soak in tranquil greenery along marked trails.','uploads/activities/visawa_nature_bridge.jpg','🌳',9,1,'2026-08-25 06:43:48','2026-08-31 03:09:45','2026-08-31 03:09:45'),(56,'हंगामी शेती कामे व पिक प्रात्यक्षिके','Seasonal Farming Activities','भाजीपाला खुडणे, बीजारोपण, हुरडा भाजणे आणि शेतीच्या प्रत्यक्ष कामांचा अनुभव.','Hands-on vegetable harvesting, seed planting, hurda roasting, and farming traditions.','प्रत्यक्ष शेतात उतरून भाजीपाला खुडणे, बी लावणे आणि हुरडा पार्टीचा खरा ग्रामीण अनुभव घ्या.','Experience the joy of harvesting your own farm-fresh vegetables and participate in seasonal traditions.','uploads/activities/visawa_village_school.jpg','🌱',10,1,'2026-08-25 06:43:48','2026-08-31 03:09:45','2026-08-31 03:09:45'),(57,'स्वच्छ स्विमिंग पूल व विहीर स्नान','Swimming Pool','शुद्ध आणि स्वच्छ पाण्याचा स्विमिंग पूल, लहान मुलांचा पूल आणि पारंपारिक विहीर स्नान.','Crystal-clear filtered swimming pool with kids splash area and authentic farm well bathing experience.','उन्हाळ्याच्या आणि सुट्टीच्या दिवसात संपूर्ण कुटुंबासाठी मनसोक्त जलविहार आणि पारंपारिक विहिरीच्या पाण्याचा आनंद.','Relax and refresh in our hygienic swimming pool amidst nature, featuring filtered water and traditional well bathing.','https://images.unsplash.com/photo-1571003123894-1f0594d2b5d9?w=800&auto=format&fit=crop&q=80','🏊‍♂️',1,1,'2026-08-31 03:09:45','2026-08-31 03:10:07','2026-08-31 03:10:07'),(58,'रेन डान्स आणि म्युझिक पार्टी','Rain Dance','थंडगार पाण्याच्या सरींमध्ये डीजे संगीताच्या तालावर मनमुराद नाचण्याचा आनंद.','High-energy rain dance floor with cool water mist showers and live music beats.','मित्र आणि कुटुंबासह संगीताच्या तालावर थंडगार पाण्याच्या सरींखाली आनंदोत्सव साजरा करा.','Celebrate joyful moments with family and friends on our spacious rain dance arena with high-quality sound.','https://images.unsplash.com/photo-1514525253161-7a46d19cd819?w=800&auto=format&fit=crop&q=80','🎵',2,1,'2026-08-31 03:09:45','2026-08-31 03:10:07','2026-08-31 03:10:07'),(59,'द्राक्ष बागा शिवार फेरी','Grape Vineyard Tour','१५ एकर विस्तीर्ण द्राक्ष बागा आणि फळबागांची मार्गदर्शित शिवार फेरी.','Guided educational walk through lush grape vineyards and organic fruit orchards.','विस्तीर्ण द्राक्ष बागांमध्ये फिरा, आधुनिक शेती पद्धतींची माहिती घ्या आणि गोड फळांचा आस्वाद घ्या.','Stroll through sprawling vineyards, learn about cultivation techniques, and taste freshly plucked fruits.','uploads/activities/visawa_vineyard_patio.jpg','🍇',3,1,'2026-08-31 03:09:45','2026-08-31 03:10:07','2026-08-31 03:10:07'),(60,'चुलीवरची अस्सल गावरान मिसळ व जेवण','Traditional Wood-Fired Misal','शेतातील ताज्या भाज्या आणि चुलीवर तयार केलेली झणझणीत गावरान मिसळ व जेवण.','Farm-to-table dining prepared on traditional wood-fired earthen chulhas.','गरमागरम बाजरी-ज्वारीची भाकरी, पिठलं-ठेचा, वांग्याचं भरीत आणि शुद्ध गावठी तुपातील चविष्ट जेवण.','Relish piping hot wood-fired misal, bajra bhakris, pithla-thecha, and authentic rural delicacies.','https://images.unsplash.com/photo-1601050690597-df0568f70950?w=800&auto=format&fit=crop&q=80','🍲',4,1,'2026-08-31 03:09:45','2026-08-31 03:10:07','2026-08-31 03:10:07'),(61,'सेंद्रिय शेती व शिवार फेरी','Farm Visit','सेंद्रिय शेती, भाजीपाला आणि विविध पिकांची माहिती देणारी प्रत्यक्ष शिवार फेरी.','Educational agro-tour across 15 acres of organic crops, polyhouses, and vegetation.','सेंद्रिय शेती, आधुनिक तंत्रज्ञान आणि हिरवेगार शिवार जवळून अनुभवण्याची उत्तम संधी.','Explore sustainable organic farming methods, visit green polyhouses, and reconnect with agriculture roots.','uploads/activities/visawa_farm_orchard.jpg','🌾',5,1,'2026-08-31 03:09:45','2026-08-31 03:10:07','2026-08-31 03:10:07'),(62,'पारंपारिक बैलगाडी सफर','Bullock Cart Ride','सजावट केलेल्या पारंपारिक बैलगाडीतून मळ्याच्या बांधावरून रपेट मारण्याचा आनंद.','Nostalgic ride on beautifully decorated bullock carts around countryside farm trails.','लहान-मोठ्या सर्वांसाठी बैलगाडीतून फिरण्याचा आणि ग्रामीण संस्कृती अनुभवण्याचा आनंददायी क्षण.','Experience rural transport heritage with authentic bullock cart rides across rustic village tracks.','uploads/activities/visawa_goshala_cows.jpg','🐂',6,1,'2026-08-31 03:09:45','2026-08-31 03:10:07','2026-08-31 03:10:07'),(63,'पारंपारिक ग्रामीण खेळ','Rural Games','विटी-दांडू, लगोरी, गोट्या, रस्सीखेच आणि जुन्या पारंपारिक खेळांची धमाल.','Classic outdoor village sports: Viti-Dandu, Lagori, Marbles, Tug-of-war, and archery.','मोबाईलपासून दूर मोकळ्या मैदानात विटी-दांडू, लगोरी आणि जुन्या खेळांचा मनमुराद आनंद घ्या.','Relive childhood nostalgia and bond with family playing traditional Maharashtrian village games.','uploads/activities/visawa_rural_relaxation.jpg','🎯',7,1,'2026-08-31 03:09:45','2026-08-31 03:10:07','2026-08-31 03:10:07'),(64,'मुलांचा खेळ परिसर व ॲडव्हेंचर झोन','Children’s Play Area','झोपाळे, घसरगुंडी, क्लायंबिंग, ट्रॅम्पोलिन आणि वाळूचे सुरक्षित मैदान.','Dedicated kids outdoor adventure park with swings, slides, nets, trampoline, and sand pit.','निसर्गाच्या मोकळ्या हवेत लहान मुलांच्या आनंदासाठी सुरक्षित आणि सुसज्ज खेळाचे मैदान.','A safe and vibrant outdoor play space specially designed for kids to enjoy active play in nature.','uploads/activities/visawa_kids_tractor_train.jpg','🎈',8,1,'2026-08-31 03:09:45','2026-08-31 03:10:07','2026-08-31 03:10:07'),(65,'निसर्ग पायवाट व पक्षी निरीक्षण','Nature Walk','हिरवेगार वृक्ष, फुलांच्या बागा आणि पक्ष्यांच्या किलबिलाटात रम्य पायवाट सफर.','Peaceful shaded walking trails through tree groves with fresh morning breezes and bird sounds.','शहरातील प्रदूषणापासून दूर शांत निसर्गात पक्षांचा किलबिलाट ऐकत निवांत चालण्याचा आनंद.','Breathe fresh unpolluted air, spot native birds, and soak in tranquil greenery along marked trails.','uploads/activities/visawa_nature_bridge.jpg','🌳',9,1,'2026-08-31 03:09:45','2026-08-31 03:10:07','2026-08-31 03:10:07'),(66,'हंगामी शेती कामे व पिक प्रात्यक्षिके','Seasonal Farming Activities','भाजीपाला खुडणे, बीजारोपण, हुरडा भाजणे आणि शेतीच्या प्रत्यक्ष कामांचा अनुभव.','Hands-on vegetable harvesting, seed planting, hurda roasting, and farming traditions.','प्रत्यक्ष शेतात उतरून भाजीपाला खुडणे, बी लावणे आणि हुरडा पार्टीचा खरा ग्रामीण अनुभव घ्या.','Experience the joy of harvesting your own farm-fresh vegetables and participate in seasonal traditions.','uploads/activities/visawa_village_school.jpg','🌱',10,1,'2026-08-31 03:09:45','2026-08-31 03:10:07','2026-08-31 03:10:07'),(67,'स्वच्छ स्विमिंग पूल व विहीर स्नान','Swimming Pool','शुद्ध आणि स्वच्छ पाण्याचा स्विमिंग पूल, लहान मुलांचा पूल आणि पारंपारिक विहीर स्नान.','Crystal-clear filtered swimming pool with kids splash area and authentic farm well bathing experience.','उन्हाळ्याच्या आणि सुट्टीच्या दिवसात संपूर्ण कुटुंबासाठी मनसोक्त जलविहार आणि पारंपारिक विहिरीच्या पाण्याचा आनंद.','Relax and refresh in our hygienic swimming pool amidst nature, featuring filtered water and traditional well bathing.','uploads/activities/1788174622_MGV4dIsKNK.png','🏊‍♂️',1,1,'2026-08-31 03:10:07','2026-08-31 05:40:24',NULL),(68,'रेन डान्स आणि म्युझिक पार्टी','Rain Dance','थंडगार पाण्याच्या सरींमध्ये डीजे संगीताच्या तालावर मनमुराद नाचण्याचा आनंद.','High-energy rain dance floor with cool water mist showers and live music beats.','मित्र आणि कुटुंबासह संगीताच्या तालावर थंडगार पाण्याच्या सरींखाली आनंदोत्सव साजरा करा.','Celebrate joyful moments with family and friends on our spacious rain dance arena with high-quality sound.','uploads/activities/1788176575_9F5sehyrIH.png','🎵',2,1,'2026-08-31 03:10:07','2026-08-31 06:12:57',NULL),(69,'द्राक्ष बागा शिवार फेरी','Grape Vineyard Tour','१५ एकर विस्तीर्ण द्राक्ष बागा आणि फळबागांची मार्गदर्शित शिवार फेरी.','Guided educational walk through lush grape vineyards and organic fruit orchards.','विस्तीर्ण द्राक्ष बागांमध्ये फिरा, आधुनिक शेती पद्धतींची माहिती घ्या आणि गोड फळांचा आस्वाद घ्या.','Stroll through sprawling vineyards, learn about cultivation techniques, and taste freshly plucked fruits.','uploads/activities/1788170900_Pnw5Bsuk4r.jpeg','🍇',3,1,'2026-08-31 03:10:07','2026-08-31 04:38:21',NULL),(70,'चुलीवरची अस्सल गावरान जेवण','Traditional Wood-Fired Village Feast','शेतातील ताज्या भाज्या आणि चुलीवर तयार केलेली झणझणीत गावरान मिसळ व जेवण.','Authentic Maharashtrian farm-to-table dining prepared on traditional wood-fired earthen chulhas.','गरमागरम बाजरी-ज्वारीची भाकरी, पिठलं-ठेचा, वांग्याचं भरीत आणि शुद्ध गावठी तुपातील चविष्ट जेवण.','Relish piping hot bajra and jowar bhakris, authentic pithla-thecha, stuffed brinjal (wangyach bharit), spiciest misal, and traditional Maharashtrian village delicacies cooked over firewood with homemade ghee.','uploads/activities/1788177339_pJwDZcJzAU.jpg','🍲',5,1,'2026-08-31 03:10:07','2026-08-31 06:26:05',NULL),(71,'सेंद्रिय शेती व शिवार फेरी','Farm Visit','सेंद्रिय शेती, भाजीपाला आणि विविध पिकांची माहिती देणारी प्रत्यक्ष शिवार फेरी.','Educational agro-tour across 15 acres of organic crops, polyhouses, and vegetation.','सेंद्रिय शेती, आधुनिक तंत्रज्ञान आणि हिरवेगार शिवार जवळून अनुभवण्याची उत्तम संधी.','Explore sustainable organic farming methods, visit green polyhouses, and reconnect with agriculture roots.','uploads/activities/1788171036_JHYDURV2Zk.jpeg','🌾',11,1,'2026-08-31 03:10:07','2026-08-31 06:45:57',NULL),(72,'पारंपारिक बैलगाडी सफर','Bullock Cart Ride','सजावट केलेल्या पारंपारिक बैलगाडीतून मळ्याच्या बांधावरून रपेट मारण्याचा आनंद.','Nostalgic ride on beautifully decorated bullock carts around countryside farm trails.','लहान-मोठ्या सर्वांसाठी बैलगाडीतून फिरण्याचा आणि ग्रामीण संस्कृती अनुभवण्याचा आनंददायी क्षण.','Experience rural transport heritage with authentic bullock cart rides across rustic village tracks.','uploads/activities/1788179326_cY2nOmcK8E.png','🐂',6,1,'2026-08-31 03:10:07','2026-08-31 06:58:48',NULL),(73,'पारंपारिक ग्रामीण खेळ','Rural Games','विटी-दांडू, लगोरी, गोट्या, रस्सीखेच आणि जुन्या पारंपारिक खेळांची धमाल.','Classic outdoor village sports: Viti-Dandu, Lagori, Marbles, Tug-of-war, and archery.','मोबाईलपासून दूर मोकळ्या मैदानात विटी-दांडू, लगोरी आणि जुन्या खेळांचा मनमुराद आनंद घ्या.','Relive childhood nostalgia and bond with family playing traditional Maharashtrian village games.','uploads/activities/1788170445_BXxYIblEVc.jpeg','🎯',7,1,'2026-08-31 03:10:07','2026-08-31 04:30:46',NULL),(74,'मुलांचा खेळ परिसर व ॲडव्हेंचर झोन','Children’s Play Area','झोपाळे, घसरगुंडी, क्लायंबिंग, ट्रॅम्पोलिन आणि वाळूचे सुरक्षित मैदान.','Dedicated kids outdoor adventure park with swings, slides, nets, trampoline, and sand pit.','निसर्गाच्या मोकळ्या हवेत लहान मुलांच्या आनंदासाठी सुरक्षित आणि सुसज्ज खेळाचे मैदान.','A safe and vibrant outdoor play space specially designed for kids to enjoy active play in nature.','uploads/activities/1788170567_TA2d7CN5el.jpeg','🎈',8,1,'2026-08-31 03:10:07','2026-08-31 04:32:48',NULL),(75,'निसर्ग पायवाट व पक्षी निरीक्षण','Nature Walk','हिरवेगार वृक्ष, फुलांच्या बागा आणि पक्ष्यांच्या किलबिलाटात रम्य पायवाट सफर.','Peaceful shaded walking trails through tree groves with fresh morning breezes and bird sounds.','शहरातील प्रदूषणापासून दूर शांत निसर्गात पक्षांचा किलबिलाट ऐकत निवांत चालण्याचा आनंद.','Breathe fresh unpolluted air, spot native birds, and soak in tranquil greenery along marked trails.','uploads/activities/1788169295_gkiwKZSVmq.jpeg','🌳',9,1,'2026-08-31 03:10:07','2026-08-31 04:11:35',NULL),(76,'हंगामी शेती कामे व पिक प्रात्यक्षिके','Seasonal Farming Activities','भाजीपाला खुडणे, बीजारोपण, हुरडा भाजणे आणि शेतीच्या प्रत्यक्ष कामांचा अनुभव.','Hands-on vegetable harvesting, seed planting, hurda roasting, and farming traditions.','प्रत्यक्ष शेतात उतरून भाजीपाला खुडणे, बी लावणे आणि हुरडा पार्टीचा खरा ग्रामीण अनुभव घ्या.','Experience the joy of harvesting your own farm-fresh vegetables and participate in seasonal traditions.','uploads/activities/1788173346_3RDB1EXAqd.jpeg','🌱',10,1,'2026-08-31 03:10:07','2026-08-31 05:19:07',NULL),(77,'शेती मार्गदर्शन व संस्कार केंद्र','Agricultural Awareness & Culture','शेतकर्‍यांची मेहनत आणि अन्न वाचवण्याचा संदेश देणारा शैक्षणिक व सांस्कृतिक उपक्रम.','Educational awareness about farmers\' hard work and the cultural importance of saving food.','विसावा ॲग्रो टुरिझममध्ये येणाऱ्या लहान मुलांना आणि पर्यटकांना शेतीचे महत्त्व, धान्याची निर्मिती आणि अन्नाचा आदर करण्याचे संस्कार दिले जातात. बळीराजाच्या कष्टातून अन्न कसे तयार होते याची जाणीव करून देणारा हा विशेष उपक्रम आहे.','At Visawa Agro Tourism, we impart values regarding farming and food respect to children and tourists. This activity highlights the dedication of farmers, explaining the lifecycle of crops and promoting the cultural significance of not wasting food.','uploads/activities/1788175548_DtvSEwNtKP.jpeg','🌾',12,1,'2026-08-31 05:55:50','2026-08-31 06:45:37',NULL),(78,'अस्सल गावरान हुर्डा पार्टी','Authentic Village Hurda Party','शेकोटीवर भाजलेला गरमागरम ताजा हुर्डा, सोबत गुळ, सुके खोबरे आणि झणझणीत चटण्यांचा आनंद','Enjoy fresh roasted tender jowar (Hurda) over open fire with jaggery and authentic spicy chutneys.','विसावा ॲग्रो टुरिझममध्ये हिवाळ्याच्या दिवसांत खास शेतात तयार होणाऱ्या ताज्या आणि मऊ हुर्ड्यांचा आनंद घ्या! पारंपरिक पद्धतीने निखाऱ्यांवर भाजलेला गरम हुर्डा, सोबत सोलापूर-कोल्हापूर प्रसिद्ध शेंगदाणा व लसूण चटणी, सुके खोबरे आणि अस्सल गावरान गूळ पर्यटकांना दिला जातो. संध्याकाळच्या निसर्गरम्य वातावरणात शेकोटीच्या शेजारी बसून या पारंपरिक खाद्यसंस्कृतीचा आनंद घेणे हा पर्यटकांसाठी एक अविस्मरणीय अनुभव ठरतो.','Experience the authentic taste of winter with our farm-fresh tender Hurda (roasted sorghum) at Visawa Agro Tourism. Roasted to perfection over open embers in traditional style, it is served with authentic garlic & peanut chutneys, dry coconut, and organic jaggery. Relaxing around the cozy evening campfire while savoring this rich Maharashtrian culinary tradition offers a delightful and unforgettable experience for families and groups.','uploads/activities/1788176558_0OI4x1bFJT.png','🌾',4,1,'2026-08-31 06:12:40','2026-08-31 06:12:40',NULL),(79,'फोटो पॉईंट्स व आठवणींचे केंद्र','Vintage Selfie Spots & Photography','पर्यटकांसाठी जुन्या आठवणींना उजाळा देणारे विंटेज फोटो पॉईंट्स.','Nostalgic vintage telephone booth spots perfect for photos and reels.','विसावा ॲग्रो टुरिझममधील पिवळाधम्मक विंटेज STD PCO टेलीफोन बूथ पर्यटकांसाठी जुन्या आठवणींना उजाळा देणारा एक खास फोटो पॉईंट आहे. निसर्गरम्य पार्श्वभूमीत कुटुंब आणि मित्रांसोबत सुंदर फोटोज, पोर्ट्रेट्स आणि सोशल मीडिया रील्स (Reels) काढण्यासाठी हे एक उत्तम ठिकाण आहे.','The vintage yellow STD PCO booth at Visawa Agro Tourism offers a nostalgic retro backdrop for guests. Surrounded by lush greenery, it is the perfect spot for taking memorable family photos, portraits, and creative social media reels.','uploads/activities/1788178485_WhiTwppnRF.jpeg','📸',13,1,'2026-08-31 06:44:49','2026-08-31 06:46:14',NULL),(80,'महाराष्ट्राची लोकसंस्कृती व वारसा','Cultural Heritage & Folk Tradition','महाराष्ट्राच्या समृद्ध लोककला आणि विंटेज संस्कृतीची खास झलक.','Experience the rich Maharashtrian culture and traditional heritage spots.','विसावा ॲग्रो टुरिझममध्ये महाराष्ट्राच्या समृद्ध लोकसंस्कृती आणि परंपरेचा अनोखा संगम अनुभवा. पर्यटकांना आपल्या मातीशी जोडणाऱ्या या सांस्कृतिक फोटो पॉईंटवर पारंपरिक वारकरी आणि शाहीर संस्कृतीची विलोभनीय मूर्ती उभारण्यात आली आहे. ग्रामीण पर्यटनाचा आनंद घेताना कुटुंब आणि मित्रांसोबत महाराष्ट्राच्या लोककलेचा हा समृद्ध वारसा कॅमेऱ्यात कैद करण्यासाठी आणि आठवणी जपण्यासाठी हे एक उत्तम ठिकाण आहे.','Experience the rich cultural roots of Maharashtra at Visawa Agro Tourism. This dedicated cultural selfie spot features a traditional Maharashtrian Varkari and folk artist statue, offering guests a glimpse into the state\'s vibrant heritage. Surrounded by scenic views, it serves as a wonderful backdrop for families and visitors to take memorable photos and connect with authentic rural traditions.','uploads/activities/1788237689_pCaDQabfwK.jpeg','🎭',14,1,'2026-08-31 23:11:34','2026-08-31 23:11:34',NULL);
/*!40000 ALTER TABLE `activities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blogs`
--

DROP TABLE IF EXISTS `blogs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blogs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title_mr` varchar(255) DEFAULT NULL,
  `title_en` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `short_description_mr` text DEFAULT NULL,
  `short_description_en` text DEFAULT NULL,
  `description_mr` longtext DEFAULT NULL,
  `description_en` longtext DEFAULT NULL,
  `excerpt` text DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `featured_image` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `created_by` bigint(20) unsigned DEFAULT NULL,
  `updated_by` bigint(20) unsigned DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `is_published` tinyint(1) NOT NULL DEFAULT 0,
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `blogs_slug_unique` (`slug`),
  KEY `blogs_created_by_foreign` (`created_by`),
  KEY `blogs_updated_by_foreign` (`updated_by`),
  CONSTRAINT `blogs_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `blogs_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blogs`
--

LOCK TABLES `blogs` WRITE;
/*!40000 ALTER TABLE `blogs` DISABLE KEYS */;
INSERT INTO `blogs` VALUES (1,'विसावा रिसॉर्टला भेट देण्यासाठी उत्तम वेळ कोणती?','Best Time to Visit Visava Amusement Park & Resort','Best Time to Visit Visava Amusement Park & Resort','best-time-to-visit-visava','ऋतूनुसार विसावा रिसॉर्टमधील मुख्य आकर्षणे आणि प्रवासाच्या टिप्स.','Seasonal attractions and travel tips for your visit to Visava Resort.','विसावा रिसॉर्टमध्ये वर्षभर विविध उपक्रम सुरू असतात. पावसाळ्यात निसर्ग सौंदर्य आणि हिवाळ्यात आनंददायी वातावरण पर्यटकांना आकर्षित करते.','Visava Resort is a year-round holiday destination with lush monsoon greenery and pleasant winter breeze for ideal family vacations.','Seasonal attractions and travel tips for your visit to Visava Resort.','Visava Resort is a year-round holiday destination with lush monsoon greenery and pleasant winter breeze for ideal family vacations.','uploads/blogs/visawa_cartwheel_bridge_blog.jpg','active',1,NULL,NULL,1,NULL,'2026-08-25 00:50:37','2026-08-31 03:00:57',NULL),(2,NULL,'this is a sample','this is a sample','this-is-a-sample-fzqar',NULL,'dfgf g',NULL,'fgfghgh gfh','dfgf g','fgfghgh gfh','uploads/blogs/visawa_grand_entrance_blog.jpg','active',1,NULL,NULL,1,NULL,'2026-08-25 01:15:54','2026-08-31 03:00:57',NULL),(3,'विसावा कृषी पर्यटनाचा अद्वितीय अनुभव – बाबांचा मळा','Experience Authentic Rural Culture at Visawa Agro Tourism',NULL,'experience-authentic-rural-culture-at-visawa','निसर्गाच्या सानिध्यात ग्रामीण जीवन, सेंद्रिय शेती आणि अस्सल चवींचा विसावा घ्या.','Immerse yourself in authentic rustic living, organic farming tours, and wood-fired Maharashtrian hospitality.','विसावा कृषी पर्यटन – बाबांचा मळा येथे कौटुंबिक आनंद, द्राक्ष बागांची सफर, ग्रामीण खेळ आणि शांत मुक्कामाचा मनमुराद आनंद मिळतो.','Discover Maharashtra countryside charm with vineyard strolls, authentic chulha food, kids adventure rides, and serene cottage stays.',NULL,NULL,'uploads/blogs/visawa_grand_entrance_blog.jpg','active',1,NULL,NULL,1,NULL,'2026-08-31 03:10:07','2026-08-31 03:10:07',NULL),(4,'विसावा कृषी पर्यटनाला भेट देण्याची प्रमुख कारणे','Top Reasons to Visit Visawa Agro Tourism Resort',NULL,'top-reasons-to-visit-visawa-agro-tourism','शहरी धावपळीपासून दूर संपूर्ण कुटुंबासाठी एक परिपूर्ण वीकेंड विसावा ठिकाण.','Why Babacha Mala is Maharashtra\'s premier destination for family outings, school trips, and corporate offsites.','विस्तीर्ण शिवार, बैलगाडी सफर, स्वादिष्ट गावरान मिसळ आणि कौटुंबिक सुट्टीसाठी सर्वोत्तम ठिकाण म्हणजे विसावा कृषी पर्यटन.','From pristine nature walks and cartwheel bridges to authentic folk traditions and pool fun, explore everything Visawa offers.',NULL,NULL,'uploads/blogs/visawa_cartwheel_bridge_blog.jpg','active',1,NULL,NULL,1,NULL,'2026-08-31 03:10:07','2026-08-31 03:10:07',NULL);
/*!40000 ALTER TABLE `blogs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_locks_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dining_items`
--

DROP TABLE IF EXISTS `dining_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dining_items` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title_mr` varchar(255) DEFAULT NULL,
  `title_en` varchar(255) DEFAULT NULL,
  `badge_mr` varchar(255) DEFAULT NULL,
  `badge_en` varchar(255) DEFAULT NULL,
  `badge_icon` varchar(20) DEFAULT NULL,
  `category_mr` varchar(255) DEFAULT NULL,
  `category_en` varchar(255) DEFAULT NULL,
  `short_description_mr` text DEFAULT NULL,
  `short_description_en` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `dietary_type` varchar(50) NOT NULL DEFAULT 'pure_veg',
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_by` bigint(20) unsigned DEFAULT NULL,
  `updated_by` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `dining_items_created_by_foreign` (`created_by`),
  KEY `dining_items_updated_by_foreign` (`updated_by`),
  CONSTRAINT `dining_items_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `dining_items_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dining_items`
--

LOCK TABLES `dining_items` WRITE;
/*!40000 ALTER TABLE `dining_items` DISABLE KEYS */;
INSERT INTO `dining_items` VALUES (1,'अस्सल गावरान जेवण व अमर्यादित थाळी','Authentic Gavran Thali & Village Feasts','अस्सल जेवण','Gavran Lunch','🍛','दुपारचे / रात्रीचे जेवण','Lunch & Dinner','ज्वारी-बाजरीची गरमागरम चुलीवरची भाकरी, अस्सल गावरान पिठलं, खर्डा/ठेचा, वांग्याचे भरीत, शेतातील ताजी भाजी, ताक आणि चुलीवरचा सुगंध.','Enjoy a traditional Gavran Thali with hot Jowar/Bajra Bhakri, authentic Pithla, Thecha, roasted Baingan Bharta, fresh farm greens, and homemade flavors.','uploads/dining/1788245707_7M5w1jvB2s.jpg','pure_veg',1,1,'active',NULL,1,'2026-09-01 01:00:21','2026-09-01 01:25:07',NULL),(2,'पारंपरिक गावरान नाश्ता','Traditional Village Breakfast','सकाळचा नाश्ता','Village Breakfast','🌅','सकाळचा नाश्ता','Breakfast','सकाळच्या शुद्ध हवेत गरमागरम थालिपीठ-लोणी, कांदे पोहे, उपमा आणि चुलीवरचा अस्सल गुळाचा किंवा आल्याचा चहा.','Start your morning with freshly prepared Thalipeeth with white butter, steaming Kande Pohe, Upma, and wood-fired organic Jaggery/Ginger Tea.','uploads/dining/1788245749_C4nRdTrmTJ.jpg','pure_veg',2,1,'active',NULL,1,'2026-09-01 01:00:21','2026-09-01 01:25:49',NULL),(3,'चुलीवरची झणझणीत मिसळ','Wood-Fired Maharashtrian Misal Pav','खास आकर्षण','Wood-Fired Special','🔥','खास आकर्षण','Specials','खास गावरान मसाल्यांमध्ये चुलीवर शिजवलेला कट, मटकी उसळ, कुरकुरीत फरसाण, कांदा-लिंबू आणि मऊ पावासह अस्सल चव.','Slow-simmered on traditional clay stoves with handmade village spices, sprouted moth beans, crunchy farsan, onion, lemon, and soft pav.','uploads/dining/1788245769_mye5oSqRrM.jpg','pure_veg',3,1,'active',NULL,1,'2026-09-01 01:00:21','2026-09-01 01:26:09',NULL),(4,'संध्याकाळचा हाय-टी व भजी','High Tea & Countryside Snacks','संध्याकाळचा चहा','Evening Tea','☕','पेये व स्नॅक्स','High Tea & Snacks','निसर्गाच्या सान्निध्यात संध्याकाळचा गरमागरम कडक चहा आणि सोबत कुरकुरीत कांदा भजी व पारंपरिक स्नॅक्स.','Crispy Kanda Bhaji, steaming tea infused with natural spices, and evening tranquility amid lush farms and country breeze.','uploads/dining/1788245853_v8alAvxyke.jpg','pure_veg',4,1,'active',NULL,1,'2026-09-01 01:00:21','2026-09-01 01:27:33',NULL),(5,'बागेतील ताजी सेंद्रिय फळे व गूळ','Seasonal Farm-Fresh Organic Fruits','ताज्या फळांची मेजवानी','Organic Fruits','🍍','शेतातील फळे','Farm Fruits','हंगामानुसार बागेतील ताजी द्राक्षे, डाळिंब, पेरू, बोरं, सीताफळ आणि उसाचा ताजा गूळ चाखण्याची नामी संधी.','Taste seasonal sweetness straight from our orchards — fresh grapes, pomegranates, guavas, sweet limes, and pure sugarcane jaggery.','uploads/dining/1788245788_KbJ3qcjItH.jpg','pure_veg',5,1,'active',NULL,1,'2026-09-01 01:00:21','2026-09-01 01:26:28',NULL),(6,'कौटुंबिक व ग्रुप मेजवानी पॅकेजेस','Customized Group Feasts & Outing Menus','ग्रुप मेजवानी','Group Feasts','👨‍👩‍👧‍👦','ग्रुप मेजवानी','Group Feasts','शालेय सहली, कौटुंबिक स्नेहसंमेलन, वाढदिवस आणि कॉर्पोरेट आऊटिंगसाठी खास सानुकूलित मेन्यू व अमर्यादित डायनिंग.','Customized unlimited meal packages for school picnics, corporate outings, birthdays, and family gatherings with authentic village hospitality.','uploads/dining/1788251540_Xv3Jv8mtJu.jpg','pure_veg',6,1,'active',NULL,1,'2026-09-01 01:00:21','2026-09-01 03:02:20',NULL),(7,'चाचणी थाळी','Test Thali','नवीन','New','🍛','थाळी','Thali','चाचणी वर्णन','Test description',NULL,'pure_veg',99,1,'active',NULL,NULL,'2026-09-01 01:07:12','2026-09-01 01:07:12','2026-09-01 01:07:12');
/*!40000 ALTER TABLE `dining_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `enquiries`
--

DROP TABLE IF EXISTS `enquiries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `enquiries` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` text NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'new',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `enquiries`
--

LOCK TABLES `enquiries` WRITE;
/*!40000 ALTER TABLE `enquiries` DISABLE KEYS */;
INSERT INTO `enquiries` VALUES (1,'Divya Dake','divyadake24@gmail.com','8625840262','family day picnik','this isgrh','new','2026-08-25 06:53:57','2026-08-25 06:53:57',NULL),(2,'Divya Dake','divya@example.com','8625840262','Family Day Picnic','I would like information about your day picnic package.','new','2026-08-28 04:22:52','2026-08-28 04:22:52',NULL),(3,'John Doe','john@example.com','8625840262','Weekend Cottage Booking','We are planning a visit this Saturday with 4 adults.','new','2026-08-28 04:23:02','2026-08-28 04:23:02',NULL),(4,'Divya Dake','divyadake24@gmail.com','7276495583','Family Day Picnic','I would like information about your day picnic package.','new','2026-08-28 04:26:02','2026-08-28 04:26:02',NULL),(5,'Divya Dake','divyadake24@gmail.com','8625840262','Family Day Picnic','I would like information about your day picnic package.','new','2026-08-28 04:27:41','2026-08-28 04:27:41',NULL),(6,'Divya Dake','divyadake24@gmail.com','8625840262','Family Day Picnic','I would like information about your day picnic package.','new','2026-08-28 04:30:19','2026-08-28 04:30:19',NULL),(7,'Divya Dake','divyadake24@gmail.com','8625840262','Family Day Picnic','I would like information about your day picnic package.','new','2026-08-28 04:32:29','2026-08-28 04:32:29',NULL),(8,'UTF8 Emoji Test 🌿','emoji@test.com','8625840262','🌿 Test Subject','🌿 Testing emoji preservation 🌿','new','2026-08-28 04:39:26','2026-08-28 04:39:26','2026-08-28 04:39:26'),(9,'Diagnostic Test 🌿','diagnostic@test.com','8625840262','🌿 Emoji Audit','🌿 Testing full UTF-8 emoji pipeline 🌿','diagnostic','2026-08-28 04:41:22','2026-08-28 04:41:22','2026-08-28 04:41:22'),(10,'DIvya Dake','divyadake24@gmail.com','7276495583','Family Day Picnic','I would like information about your day picnic package.','new','2026-08-28 04:44:53','2026-08-28 04:44:53',NULL),(11,'Divya Dake','divyadake24@gmail.com','8625840262','Family Day Picnic','I would like information about your day picnic package.','new','2026-08-28 04:46:38','2026-08-28 04:46:38',NULL),(12,'Divya Dake','divyadake24@gmail.com','8625840262','Family Day Picnic','I would like information about your day picnic package.','new','2026-08-28 04:46:50','2026-08-28 04:46:50',NULL),(13,'Divya Dake','divyadake24@gmail.com','7276495583','Family Day Picnic','I would like information about your day picnic package.','new','2026-08-28 04:48:38','2026-08-28 04:48:38',NULL),(14,'Divya Dake','divyadake24@gmail.com','7276495583','family day picnic','this se rg','new','2026-08-28 05:11:33','2026-08-28 05:11:33',NULL),(15,'Test Visitor','visitor@test.com','9876543210','Booking inquiry','Want to book picnic','new','2026-08-28 23:56:55','2026-08-28 23:56:55','2026-08-28 23:56:55');
/*!40000 ALTER TABLE `enquiries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `events` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title_mr` varchar(255) DEFAULT NULL,
  `title_en` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `location_mr` varchar(255) DEFAULT NULL,
  `location_en` varchar(255) DEFAULT NULL,
  `event_date` datetime DEFAULT NULL,
  `short_description_mr` text DEFAULT NULL,
  `short_description_en` text DEFAULT NULL,
  `description_mr` longtext DEFAULT NULL,
  `description_en` longtext DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `created_by` bigint(20) unsigned DEFAULT NULL,
  `updated_by` bigint(20) unsigned DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `banner_image` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `events_slug_unique` (`slug`),
  KEY `events_created_by_foreign` (`created_by`),
  KEY `events_updated_by_foreign` (`updated_by`),
  CONSTRAINT `events_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `events_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `events`
--

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
INSERT INTO `events` VALUES (23,'वाढदिवस व पार्टी सेलिब्रेशन','Birthday Parties','Birthday Parties','birthday-parties','बाबांचा मळा – सेलिब्रेशन लॉन व पूलसाइड','Babacha Mala – Celebration Lawn & Poolside','2026-09-05 08:40:00','थीम डेकोरेशन, डीजे म्युझिक, पूलसाइड पार्टी, केक कटिंग आणि स्वादिष्ट जेवणासह अविस्मरणीय वाढदिवस सोहळा.','Grand birthday celebration packages with theme decorations, DJ music, poolside party, cake table, and mouthwatering buffet.','निसर्गरम्य वातावरणात आपल्या प्रियजनांचा वाढदिवस साजरा करा. आकर्षक सजावट, डीजे साउंड, स्विमिंग पूल, रेन डान्स, स्वादिष्ट स्टार्टर्स आणि अस्सल गावरान जेवणाची परिपूर्ण व्यवस्था.','Celebrate your special milestone amidst the beauty of nature. We provide vibrant balloons and floral décor, outdoor sound setup, pool & rain dance access, tasty starters, and unlimited traditional/buffet dining.','uploads/events/1788169644_nM3u9BvAQj.jpg','active',1,1,'Celebrate your special milestone amidst the beauty of nature. We provide vibrant balloons and floral décor, outdoor sound setup, pool & rain dance access, tasty starters, and unlimited traditional/buffet dining.','Babacha Mala – Celebration Lawn & Poolside','2026-09-05 08:40:00',NULL,599.00,'uploads/events/1788169644_nM3u9BvAQj.jpg',1,'2026-08-31 03:10:07','2026-08-31 04:17:24',NULL),(24,'शालेय व कॉलेज सहल','School Picnics','School Picnics','school-picnics','बाबांचा मळा – कृषी विज्ञान व क्रीडांगण','Babacha Mala – Agro Science & Sports Ground','2026-09-10 08:40:00','विद्यार्थ्यांसाठी सुरक्षित, माहितीपूर्ण आणि आनंददायी सहल; सेंद्रिय शेती धडे, पौष्टिक अल्पोपहार आणि देशी खेळ.','Safe, educational, and fun-filled outdoor school picnics with guided farm tours, student meals, and traditional sports.','शाळा आणि महाविद्यालयांसाठी विशेष सहल आयोजन. वनस्पतींची ओळख, सेंद्रिय खत निर्मिती, जलसंवर्धन, कुंभारकाम, मैदानी खेळ आणि शुद्ध सात्विक भोजनाची सोय.','Tailored specifically for schools, colleges, and educational academies. Includes botanical knowledge sessions, water conservation workshops, pottery making, tree plantation, sports coordinators, and clean student meals.','uploads/events/1788169667_BuXJ0CCTTF.jpg','active',1,1,'Tailored specifically for schools, colleges, and educational academies. Includes botanical knowledge sessions, water conservation workshops, pottery making, tree plantation, sports coordinators, and clean student meals.','Babacha Mala – Agro Science & Sports Ground','2026-09-10 08:40:00',NULL,449.00,'uploads/events/1788169667_BuXJ0CCTTF.jpg',1,'2026-08-31 03:10:07','2026-08-31 04:17:47',NULL),(25,'कॉर्पोरेट टीम बिल्डिंग व मिटिंग्ज','Corporate Events','Corporate Events','corporate-events','बाबांचा मळा – ओपन-एअर कॉन्फरन्स लॉन','Babacha Mala – Open-Air Conference Lawn','2026-09-15 08:40:00','कर्मचाऱ्यांसाठी टीम बिल्डिंग उपक्रम, वार्षिक स्नेहसंमेलन, लीडरशिप रिट्रीट आणि प्रशस्त लॉनवरील इव्हेंट्स.','Team retreats, leadership offsites, annual day celebrations, and employee engagement games in a scenic open-air campus.','ऑफिसच्या चार भिंतींच्या पलीकडे निसर्गरम्य ठिकाणी टीम बॉन्डिंग. ओपन लॉन, पीए सिस्टीम, ग्रुप गेम्स, डीजे रेन डान्स आणि व्हीआयपी बुफे जेवणासह उत्तम सोय.','Escape stressful boardroom settings. Host team outings, presentations, outdoor team building exercises, cocktail-free retreats, and grand barbecue dinners in a calm countryside environment.','uploads/events/1788169695_1TfMbc8xcQ.jpg','active',1,1,'Escape stressful boardroom settings. Host team outings, presentations, outdoor team building exercises, cocktail-free retreats, and grand barbecue dinners in a calm countryside environment.','Babacha Mala – Open-Air Conference Lawn','2026-09-15 08:40:00',NULL,1099.00,'uploads/events/1788169695_1TfMbc8xcQ.jpg',1,'2026-08-31 03:10:07','2026-08-31 04:18:16',NULL),(26,'कौटुंबिक स्नेहसंमेलन व मेळावे','Family Gatherings','Family Gatherings','family-gatherings','बाबांचा मळा – सावलीदार हेरिटेज गझेबोज','Babacha Mala – Shaded Heritage Gazebos','2026-09-20 08:40:00','एकत्र कुटुंबासाठी प्रशस्त जागा, लहान मुलांचे खेळ, बैलगाडी सफर आणि गरमागरम चुलीवरची अस्सल गावरान मेजवानी.','Spacious gazebos, kids play parks, bullock cart rides, and hot wood-fired chulha food for large joint family reunions.','आजी-आजोबांपासून नातवंडांपर्यंत सर्वांना आनंद देणारा कौटुंबिक सोहळा. शांत सावली, विहीर स्नान, संगीत, पारंपारिक खेळ आणि पोटभर गावरान जेवणाचा आनंद.','Create cherished lifetime memories with multiple generations coming together. Enjoy private shaded pavilions, elderly-friendly walking paths, children play zones, music, and wholesome Maharashtrian cuisine.','uploads/events/1788169735_DNtmuqMODs.jpg','active',1,1,'Create cherished lifetime memories with multiple generations coming together. Enjoy private shaded pavilions, elderly-friendly walking paths, children play zones, music, and wholesome Maharashtrian cuisine.','Babacha Mala – Shaded Heritage Gazebos','2026-09-20 08:40:00',NULL,699.00,'uploads/events/1788169735_DNtmuqMODs.jpg',1,'2026-08-31 03:10:07','2026-08-31 04:18:55',NULL),(27,'प्री-वेडिंग व कपल फोटोशूट','Pre-Wedding Photoshoots','Pre-Wedding Photoshoots','pre-wedding-photoshoots','बाबांचा मळा – द्राक्ष बागा व निसर्गरम्य परिसर','Babacha Mala – Vineyard Trails & Scenic Lakeview','2026-09-25 08:40:07','द्राक्ष बागा, हिरवेगार शिवार, लाकडी कॉटेज, विहीर, पारंपारिक बैलगाडी आणि विहंगम सनसेट स्पॉट्ससह खास फोटोशूट.','Stunning agro backdrops, sunset vineyard trails, rustic wooden cottages, decorated bullock carts, and private changing suites.','तुमच्या लग्नापूर्वीचे सोनेरी क्षण कॅमेऱ्यात टिपण्यासाठी परिपूर्ण जागा. १५ एकर परिसर, २०+ नैसर्गिक बॅकड्रॉप्स, सनसेट पॉईंट्स, प्रायव्हेट ड्रेसिंग रूम्स आणि रिफ्रेशमेंटची सोय.','Capture your timeless romantic moments with 20+ photogenic locations across 15 acres. Includes lush grape vineyards, rustic bullock carts, floral swings, poolside reflections, and dedicated private AC changing rooms.','uploads/events/visawa_cartwheel_bridge.jpg','active',1,NULL,'Capture your timeless romantic moments with 20+ photogenic locations across 15 acres. Includes lush grape vineyards, rustic bullock carts, floral swings, poolside reflections, and dedicated private AC changing rooms.','Babacha Mala – Vineyard Trails & Scenic Lakeview','2026-09-25 08:40:07',NULL,2499.00,'uploads/events/visawa_cartwheel_bridge.jpg',1,'2026-08-31 03:10:07','2026-08-31 03:10:07',NULL),(28,'सांस्कृतिक व पारंपारिक लोककला कार्यक्रम','Cultural Programs','Cultural Programs','cultural-programs','बाबांचा मळा – हेरिटेज ॲम्फीथिएटर','Babacha Mala – Heritage Amphitheatre','2026-09-30 08:40:07','पारंपारिक लोकनृत्य, गोंधळ, भारुड, संगीत रजनी आणि महाराष्ट्राच्या समृद्ध लोकसंस्कृतीचे दर्शन.','Folk dances (Lavani, Gondhal), traditional music nights, seasonal harvest festivals, and Maharashtrian cultural celebrations.','महाराष्ट्राच्या लोककलेचा आणि संस्कृतीचा गौरव. लावणी, पोवाडा, लेझीम, ढोल-ताशा गजर आणि अस्सल गावरान सण-उत्सवांचा अविस्मरणीय अनुभव.','Immerse in the rich traditions of Maharashtra. Experience live folk performances, Powada ballads, rhythmic Lezim dances, Dhol-Tasha beats, traditional crafts exhibitions, and authentic festive treats.','uploads/events/visawa_folk_art_tractor.jpg','active',1,NULL,'Immerse in the rich traditions of Maharashtra. Experience live folk performances, Powada ballads, rhythmic Lezim dances, Dhol-Tasha beats, traditional crafts exhibitions, and authentic festive treats.','Babacha Mala – Heritage Amphitheatre','2026-09-30 08:40:07',NULL,499.00,'uploads/events/visawa_folk_art_tractor.jpg',1,'2026-08-31 03:10:07','2026-08-31 03:10:07',NULL),(29,'चाचणी इव्हेंट','Test Event',NULL,'test-event-Ge7Zq',NULL,NULL,'2026-09-08 06:03:13',NULL,NULL,NULL,NULL,NULL,'active',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'2026-09-01 00:33:13','2026-09-01 00:33:13','2026-09-01 00:33:13');
/*!40000 ALTER TABLE `events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `galleries`
--

DROP TABLE IF EXISTS `galleries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `galleries` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title_mr` varchar(255) DEFAULT NULL,
  `title_en` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `category_mr` varchar(255) DEFAULT NULL,
  `category_en` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `created_by` bigint(20) unsigned DEFAULT NULL,
  `updated_by` bigint(20) unsigned DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `caption` varchar(255) DEFAULT NULL,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `galleries_created_by_foreign` (`created_by`),
  KEY `galleries_updated_by_foreign` (`updated_by`),
  CONSTRAINT `galleries_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `galleries_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `galleries`
--

LOCK TABLES `galleries` WRITE;
/*!40000 ALTER TABLE `galleries` DISABLE KEYS */;
INSERT INTO `galleries` VALUES (50,'विसावा मुख्य प्रवेशद्वार व वारकरी शिल्प','Grand Entrance Gate & Heritage Sculptures','uploads/galleries/1788175952_fT23VOcuzK.jpeg','शेती व निसर्ग','Farm & Nature','active',1,NULL,'Grand Entrance Gate & Heritage Sculptures','Farm & Nature','uploads/galleries/1788175952_fT23VOcuzK.jpeg',NULL,1,1,'2026-08-31 03:10:07','2026-08-31 23:27:18',NULL),(51,'अशोक मामा अल्पोपहार व द्राक्ष बाग शेड','Ashok Mama Snack House & Vineyard Arbor','uploads/galleries/visawa_vineyard_patio_gallery.jpg','शेती व निसर्ग','Farm & Nature','active',1,NULL,'Ashok Mama Snack House & Vineyard Arbor','Farm & Nature',NULL,NULL,5,1,'2026-08-31 03:10:07','2026-09-01 01:17:26',NULL),(52,'सेंद्रिय फळबाग व शेती शिवार','Organic Farming & Fruit Plantation','uploads/galleries/1788172460_MA7PeDiXg2.jpeg','शेती व निसर्ग','Farm & Nature','active',1,NULL,'Organic Farming & Fruit Plantation','Farm & Nature','uploads/galleries/1788172460_MA7PeDiXg2.jpeg',NULL,3,1,'2026-08-31 03:10:07','2026-08-31 05:04:21',NULL),(53,'निसर्गरम्य दगडी पूल व पायवाट','Rustic Stone Bridge & Nature Trail','uploads/galleries/1788175129_o3QXFPDqjy.jpeg','शेती व निसर्ग','Farm & Nature','active',1,NULL,'Rustic Stone Bridge & Nature Trail','Farm & Nature','uploads/galleries/1788175129_o3QXFPDqjy.jpeg',NULL,4,1,'2026-08-31 03:10:07','2026-08-31 05:48:51',NULL),(54,'पारंपारिक बैलगाडी शिल्प व शेतकरी सन्मान','Farmer & White Bullocks Heritage Sculpture','uploads/galleries/visawa_farmer_bullocks_gallery.jpg','उपक्रम','Activities','active',1,NULL,'Farmer & White Bullocks Heritage Sculpture','Activities',NULL,NULL,2,1,'2026-08-31 03:10:07','2026-09-01 01:17:07',NULL),(55,'देशी गिर गाई व गोशाळा','Indigenous Gir Cows & Goshala','uploads/galleries/1788239005_GUugFYX1Vo.png','उपक्रम','Activities','active',1,NULL,'Indigenous Gir Cows & Goshala','Activities','uploads/galleries/1788239005_GUugFYX1Vo.png',NULL,6,1,'2026-08-31 03:10:07','2026-08-31 23:33:27',NULL),(56,'झाडांच्या सावलीत निवांत खाट व झोपाळे','Canopy Relaxation Cots & Swings','uploads/galleries/visawa_cots_swings_gallery.jpg','उपक्रम','Activities','active',1,NULL,'Canopy Relaxation Cots & Swings','Activities',NULL,NULL,7,1,'2026-08-31 03:10:07','2026-08-31 03:10:07',NULL),(57,'लहान मुलांची ट्रॅक्टर ट्रेन सफर','Kids Mini Tractor Train Ride','uploads/activities/visawa_kids_tractor_train.jpg','उपक्रम','Activities','active',1,NULL,'Kids Mini Tractor Train Ride','Activities',NULL,NULL,8,1,'2026-08-31 03:10:07','2026-08-31 05:01:33','2026-08-31 05:01:33'),(58,'बाबांचा मळा भव्य उत्सव लॉन','Grand Celebration Lawn & Event Ground','uploads/galleries/1788172195_YYoUCKOwZd.jpeg','सोहळे व कार्यक्रम','Events','active',1,NULL,'Grand Celebration Lawn & Event Ground','Events','uploads/galleries/1788172195_YYoUCKOwZd.jpeg',NULL,9,1,'2026-08-31 03:10:07','2026-08-31 04:59:57',NULL),(59,'गाडी चाकांचा लाकडी पूल – विसावा ॲग्रो','Cartwheel Wooden Bridge Photo Point','uploads/galleries/visawa_cartwheel_bridge_gallery.jpg','सोहळे व कार्यक्रम','Events','active',1,NULL,'Cartwheel Wooden Bridge Photo Point','Events',NULL,NULL,10,1,'2026-08-31 03:10:07','2026-08-31 03:10:07',NULL),(60,'लोककला प्रदर्शन – नाद, नृत्य आणि नमन','Rural Folk Art & Mini Tractor Installation','uploads/galleries/visawa_folk_art_gallery.jpg','सोहळे व कार्यक्रम','Events','active',1,NULL,'Rural Folk Art & Mini Tractor Installation','Events',NULL,NULL,11,1,'2026-08-31 03:10:07','2026-08-31 03:10:07',NULL),(61,'अस्सल कोकणी पद्धतीचे कौलारू लाल दगडी कॉटेज','Traditional Red Stone Konkan Eco-Cottage','uploads/galleries/visawa_cottage_gallery.jpg','पाहुण्यांचे क्षण','Guest Moments','active',1,NULL,'Traditional Red Stone Konkan Eco-Cottage','Guest Moments',NULL,NULL,12,1,'2026-08-31 03:10:07','2026-08-31 03:10:07',NULL),(62,'विंटेज अँबॅसेडर कार व सेल्फी पॉईंट','Vintage Ambassador Car & Selfie Point','uploads/galleries/visawa_vintage_car_gallery.jpg','पाहुण्यांचे क्षण','Guest Moments','active',1,NULL,'Vintage Ambassador Car & Selfie Point','Guest Moments',NULL,NULL,13,1,'2026-08-31 03:10:07','2026-08-31 03:10:07',NULL),(63,'पारंपरिक गावरान अन्नछत्र व मेजवानी हॉल','Traditional Village Dining Hall & Feast Area','uploads/galleries/visawa_heritage_pavilion_gallery.jpg','जेवण आणि मेजवानी','Food & Dining','active',1,NULL,'Traditional Village Dining Hall & Feast Area','Food & Dining',NULL,NULL,14,1,'2026-08-31 03:10:07','2026-09-01 03:35:21',NULL),(64,'छत्रपती शिवाजी महाराज प्रेरणा स्थळ','Chhatrapati Shivaji Maharaj Inspiration Point','uploads/galleries/1788168160_zavGHN1DWH.jpeg','ऐतिहासिक वारसा','Heritage & Culture','active',NULL,NULL,'Chhatrapati Shivaji Maharaj Inspiration Point','Heritage & Culture','uploads/galleries/1788168160_zavGHN1DWH.jpeg',NULL,0,1,'2026-08-31 03:52:40','2026-08-31 03:52:40',NULL),(65,'शिवमंदिर','Lord Shiva Temple','uploads/galleries/1788168552_9ax7QdGywY.jpeg','धार्मिक स्थळ','Spiritual Attraction','active',NULL,NULL,'Lord Shiva Temple','Spiritual Attraction','uploads/galleries/1788168552_9ax7QdGywY.jpeg',NULL,0,1,'2026-08-31 03:59:12','2026-08-31 03:59:12',NULL),(66,'पारंपारिक विहीर व ग्रामीण संस्कृती','Traditional Village Well & Rural Heritage','uploads/galleries/1788174924_fDredOdfrj.jpeg','शेती व निसर्ग','Farm & Nature','active',NULL,NULL,'Traditional Village Well & Rural Heritage','Farm & Nature','uploads/galleries/1788174924_fDredOdfrj.jpeg',NULL,17,1,'2026-08-31 05:45:27','2026-09-01 01:16:51',NULL),(67,'बळीराजा संदेश व अन्न महत्त्व फलक','Food Respect & Farmer Message Board','uploads/galleries/1788175679_53pEHESMnE.jpeg','शेती व निसर्ग','Farm & Nature','active',NULL,NULL,'Food Respect & Farmer Message Board','Farm & Nature','uploads/galleries/1788175679_53pEHESMnE.jpeg',NULL,0,1,'2026-08-31 05:58:02','2026-08-31 05:58:02',NULL),(68,'विंटेज एसटीडी पीसीओ फोटो बूथ','Vintage STD PCO Photo Booth / Selfie Point','uploads/galleries/1788179068_oVLm5xDkUo.jpeg','पाहुण्यांचे क्षण','Guest Moments','active',NULL,NULL,'Vintage STD PCO Photo Booth / Selfie Point','Guest Moments','uploads/galleries/1788179068_oVLm5xDkUo.jpeg',NULL,15,1,'2026-08-31 06:39:43','2026-09-01 03:28:22',NULL),(69,'पारंपरिक लोकसंस्कृती फोटो पॉईंट','Cultural Heritage Selfie Spot','uploads/galleries/1788237795_ERqBbknPA9.jpeg','पाहुण्यांचे क्षण','Guest Moments','active',NULL,NULL,'Cultural Heritage Selfie Spot','Guest Moments','uploads/galleries/1788237795_ERqBbknPA9.jpeg',NULL,16,1,'2026-08-31 23:13:19','2026-09-01 03:30:07',NULL),(70,'विंटेज लांब स्कूटर फोटो पॉईंट','Vintage Long Scooter Selfie Spot','uploads/galleries/1788245657_8YImIpC5Dy.jpeg','पाहुण्यांचे क्षण','Guest Moments','active',NULL,NULL,'Vintage Long Scooter Selfie Spot','Guest Moments','uploads/galleries/1788245657_8YImIpC5Dy.jpeg',NULL,18,1,'2026-09-01 01:24:18','2026-09-01 03:27:51',NULL),(71,'अनोखा \'बाबांचा मळा\' नाव आणि सेल्फी पॉईंट','Unique \'Babancha Mala\' Name & Selfie Spot','uploads/galleries/1788251314_03SpL1hqOn.jpeg','पाहुण्यांचे क्षण','Guest Moments','active',NULL,NULL,'Unique \'Babancha Mala\' Name & Selfie Spot','Guest Moments','uploads/galleries/1788251314_03SpL1hqOn.jpeg',NULL,19,1,'2026-09-01 02:58:36','2026-09-01 03:29:03',NULL),(72,'अस्सल गावरान जेवण व अमर्यादित थाळी','Authentic Gavran Thali & Maharashtrian Feasts','uploads/galleries/visawa_authentic_thali_gallery.png','खाद्यसंस्कृती','Food & Dining','active',NULL,NULL,NULL,NULL,NULL,NULL,8,1,'2026-09-01 03:23:41','2026-09-01 03:24:40','2026-09-01 03:24:40'),(73,'पारंपरिक गावरान नाश्ता - थालिपीठ व चहा','Traditional Village Breakfast - Thalipeeth & Tea','uploads/galleries/visawa_village_breakfast_gallery.jpg','खाद्यसंस्कृती','Food & Dining','active',NULL,NULL,NULL,NULL,NULL,NULL,9,1,'2026-09-01 03:23:41','2026-09-01 03:24:50','2026-09-01 03:24:50'),(74,'चुलीवरची झणझणीत मिसळ','Authentic Wood-Fired Misal Pav','uploads/galleries/visawa_wood_fired_misal_gallery.jpg','खाद्यसंस्कृती','Food & Dining','active',NULL,NULL,NULL,NULL,NULL,NULL,10,1,'2026-09-01 03:23:41','2026-09-01 03:24:58','2026-09-01 03:24:58'),(75,'बागेतील ताजी सेंद्रिय फळे','Seasonal Farm-Fresh Organic Fruits','uploads/galleries/visawa_farm_fresh_fruits_gallery.jpg','खाद्यसंस्कृती','Food & Dining','active',NULL,NULL,NULL,NULL,NULL,NULL,11,1,'2026-09-01 03:23:41','2026-09-01 03:25:16','2026-09-01 03:25:16'),(76,'अस्सल गावरान जेवण व अमर्यादित थाळी','Authentic Gavran Thali & Maharashtrian Feasts','uploads/galleries/visawa_authentic_thali_gallery.png','खाद्यसंस्कृती','Food & Dining','active',NULL,NULL,NULL,NULL,NULL,NULL,8,1,'2026-09-01 03:25:27','2026-09-01 03:27:15','2026-09-01 03:27:15'),(77,'पारंपरिक गावरान नाश्ता - चहा','Traditional Village Breakfast - Tea','uploads/galleries/1788253655_SjSrT93567.jpg','खाद्यसंस्कृती','Food & Dining','active',NULL,NULL,'Traditional Village Breakfast - Tea','Food & Dining','uploads/galleries/1788253655_SjSrT93567.jpg',NULL,9,1,'2026-09-01 03:25:27','2026-09-01 03:37:35',NULL),(78,'चुलीवरची झणझणीत मिसळ','Authentic Wood-Fired Misal Pav','uploads/galleries/1788253676_fFQZ8k0OOH.jpg','खाद्यसंस्कृती','Food & Dining','active',NULL,NULL,'Authentic Wood-Fired Misal Pav','Food & Dining','uploads/galleries/1788253676_fFQZ8k0OOH.jpg',NULL,10,1,'2026-09-01 03:25:27','2026-09-01 03:37:56',NULL),(79,'बागेतील ताजी सेंद्रिय फळे','Seasonal Farm-Fresh Organic Fruits','uploads/galleries/1788253699_cvT0Tqmztp.jpg','खाद्यसंस्कृती','Food & Dining','active',NULL,NULL,'Seasonal Farm-Fresh Organic Fruits','Food & Dining','uploads/galleries/1788253699_cvT0Tqmztp.jpg',NULL,11,1,'2026-09-01 03:26:09','2026-09-01 03:38:19',NULL),(80,'विंटेज ट्रॅक्टर आणि सेल्फी पॉईंट','Vintage Tractor & Selfie Point','uploads/galleries/1788253023_cWh4h0iZna.jpeg','पाहुण्यांचे क्षण','Guest Moments','active',NULL,NULL,'Vintage Tractor & Selfie Point','Guest Moments','uploads/galleries/1788253023_cWh4h0iZna.jpeg',NULL,20,1,'2026-09-01 03:27:06','2026-09-01 03:27:06',NULL),(81,'अस्सल गावरान जेवण व अमर्यादित थाळी','Authentic Gavran Thali & Maharashtrian Feasts','uploads/galleries/1788253623_3lfIRAUvw2.jpg','खाद्यसंस्कृती','Food & Dining','active',NULL,NULL,'Authentic Gavran Thali & Maharashtrian Feasts','Food & Dining','uploads/galleries/1788253623_3lfIRAUvw2.jpg',NULL,8,1,'2026-09-01 03:33:12','2026-09-01 03:37:04',NULL),(82,'सुंदर निसर्गरम्य वेलींचा टनेल मार्ग','Scenic Green Vine Tunnel Walkway','uploads/galleries/1788254464_JQEHsDlBfQ.jpeg','शेती आणि निसर्ग','Farm & Nature','active',NULL,NULL,'Scenic Green Vine Tunnel Walkway','Farm & Nature','uploads/galleries/1788254464_JQEHsDlBfQ.jpeg',NULL,20,1,'2026-09-01 03:51:07','2026-09-01 03:58:19',NULL);
/*!40000 ALTER TABLE `galleries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2026_08_25_052436_create_personal_access_tokens_table',1),(5,'2026_08_25_053113_add_is_admin_to_users_table',1),(6,'2026_08_25_053156_create_blogs_table',1),(7,'2026_08_25_053157_create_events_table',1),(8,'2026_08_25_053158_create_galleries_table',1),(9,'2026_08_25_053158_create_packages_table',1),(10,'2026_08_25_053159_create_testimonials_table',1),(11,'2026_08_25_053200_create_enquiries_table',1),(12,'2026_08_25_053201_create_settings_table',1),(13,'2026_08_25_060000_upgrade_tables_for_multilingual_support',1),(14,'2026_08_25_061000_make_legacy_columns_nullable',1),(15,'2026_08_25_100000_create_activities_table',1),(16,'2026_09_01_062500_create_dining_items_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `packages`
--

DROP TABLE IF EXISTS `packages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `packages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title_mr` varchar(255) DEFAULT NULL,
  `title_en` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `duration_mr` varchar(255) DEFAULT NULL,
  `duration_en` varchar(255) DEFAULT NULL,
  `summary` text DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `duration` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `short_description_mr` text DEFAULT NULL,
  `short_description_en` text DEFAULT NULL,
  `description_mr` longtext DEFAULT NULL,
  `description_en` longtext DEFAULT NULL,
  `discounted_price` decimal(10,2) DEFAULT NULL,
  `featured_image` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `created_by` bigint(20) unsigned DEFAULT NULL,
  `updated_by` bigint(20) unsigned DEFAULT NULL,
  `inclusions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`inclusions`)),
  `exclusions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`exclusions`)),
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `packages_slug_unique` (`slug`),
  KEY `packages_created_by_foreign` (`created_by`),
  KEY `packages_updated_by_foreign` (`updated_by`),
  CONSTRAINT `packages_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `packages_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `packages`
--

LOCK TABLES `packages` WRITE;
/*!40000 ALTER TABLE `packages` DISABLE KEYS */;
INSERT INTO `packages` VALUES (30,'डे पिकनिक पॅकेज','Day Picnic Package','Day Picnic Package','day-picnic-package','१ दिवस (सकाळी ९:०० ते संध्याकाळी ६:३०)','1 Day (9:00 AM – 6:30 PM)','Full-day agro picnic with breakfast, wood-fired Maharashtrian lunch, high tea, swimming pool, rain dance, and farm tour.','Experience a refreshing full-day outing with your loved ones. Enjoy farm-fresh authentic village food, access to swimming pool, pulsating rain dance, vineyard tour, bullock cart rides, and traditional rural sports.','1 Day (9:00 AM – 6:30 PM)',799.00,'सकाळचा नाश्ता, चुलीवरचे अस्सल गावरान जेवण, स्विमिंग पूल, रेन डान्स आणि शिवार फेरीसह संपूर्ण दिवसाची मौजमजा.','Full-day agro picnic with breakfast, wood-fired Maharashtrian lunch, high tea, swimming pool, rain dance, and farm tour.','निसर्गाच्या सान्निध्यात एक अविस्मरणीय दिवस घालवा. अस्सल चुलीवरची गावरान मिसळ, जेवण, स्विमिंग पूल, रेन डान्स, द्राक्ष बागांची सफर आणि बैलगाडी राईडचा मनमुराद आनंद घ्या.','Experience a refreshing full-day outing with your loved ones. Enjoy farm-fresh authentic village food, access to swimming pool, pulsating rain dance, vineyard tour, bullock cart rides, and traditional rural sports.',699.00,'uploads/packages/1788177436_AcFjHixVBB.png','active',1,1,'\"[\\\"Welcome Drink & Morning Breakfast \\\\\\/ Tea\\\",\\\"Unlimited Wood-Fired Authentic Maharashtrian Lunch & Misal\\\",\\\"Evening High Tea & Village Snacks\\\",\\\"Swimming Pool & Music Rain Dance Access\\\",\\\"Grape Vineyard & Organic Farm Guided Tour\\\",\\\"Bullock Cart Ride & Rural Games (Viti-Dandu, Lagori)\\\"]\"','\"[\\\"Overnight Cottage Stay\\\",\\\"Personal Shopping & Nursery Purchases\\\",\\\"Extra Bottled Beverages\\\"]\"',1,1,'2026-08-31 03:10:07','2026-08-31 06:27:17',NULL),(31,'कौटुंबिक फॅमिली पॅकेज','Family Package','Family Package','family-package','पूर्ण दिवस / १ रात्र मुक्काम पर्याय','Full Day / 1 Night Option','Special combo package for families (2 Adults + 2 Kids) with all meals, kids adventure zone, and bullock cart rides.','Specially crafted for families looking for peaceful quality time away from city stress. Includes safe children play areas, organic farm activities, poolside relaxation, and wholesome traditional food.','Full Day / 1 Night Option',2499.00,'कुटुंबासाठी (२ मोठे + २ लहान मुले) सर्व जेवण, मुलांचा ॲडव्हेंचर झोन आणि कौटुंबिक मनोरंजनासह खास कॉम्बो पॅकेज.','Special combo package for families (2 Adults + 2 Kids) with all meals, kids adventure zone, and bullock cart rides.','शहरी धकाधकीपासून दूर संपूर्ण कुटुंबासाठी आनंददायी क्षण. लहान मुलांसाठी सुरक्षित खेळ परिसर, स्विमिंग पूल, बैलगाडी सफर आणि शुद्ध सात्विक गावरान जेवणाची उत्तम सोय.','Specially crafted for families looking for peaceful quality time away from city stress. Includes safe children play areas, organic farm activities, poolside relaxation, and wholesome traditional food.',2199.00,'uploads/packages/1788177450_MaRGbaROFW.png','active',1,1,'\"[\\\"Entry for 2 Adults & 2 Children under 10\\\",\\\"All Meals: Breakfast, Lunch, High Tea & Snacks\\\",\\\"Dedicated Family Shaded Cottage \\\\\\/ Seating Area\\\",\\\"Kids Fun & Adventure Zone Access\\\",\\\"Private Bullock Cart Ride Experience\\\",\\\"Swimming Pool & Rain Dance with Floats\\\"]\"','\"[\\\"Overnight Room Stay (Available on Upgrade)\\\",\\\"Driver \\\\\\/ Extra Guest Charges\\\"]\"',1,1,'2026-08-31 03:10:07','2026-08-31 06:27:30',NULL),(32,'शालेय व महाविद्यालयीन सहल पॅकेज','School & College Trip Package','School & College Trip Package','school-college-trip-package','१ दिवस (सकाळी ८:३० ते संध्याकाळी ५:३०)','1 Day (8:30 AM – 5:30 PM)','Educational agro-tourism visit with hands-on farming demos, botanical guidance, student meals, and rural sports.','A fun-filled educational picnic tailored for students. Kids learn organic agriculture, water harvesting, botanical diversity, pottery making, and enjoy safe supervised games.','1 Day (8:30 AM – 5:30 PM)',499.00,'विद्यार्थ्यांसाठी सेंद्रिय शेती प्रात्यक्षिके, निसर्ग मार्गदर्शन, पौष्टिक जेवण आणि पारंपारिक मैदानी खेळांची सहल.','Educational agro-tourism visit with hands-on farming demos, botanical guidance, student meals, and rural sports.','विद्यार्थ्यांना शेती आणि निसर्गाचे महत्त्व शिकवणारी आनंददायी सहल. सेंद्रिय खत निर्मिती, जलसंवर्धन, बीजारोपण प्रात्यक्षिके आणि सुरक्षित मैदानी खेळांचे आयोजन.','A fun-filled educational picnic tailored for students. Kids learn organic agriculture, water harvesting, botanical diversity, pottery making, and enjoy safe supervised games.',449.00,'uploads/packages/1788177516_dO8JWYfwhr.png','active',1,1,'\"[\\\"Specially Curated Hygienic Student Breakfast & Lunch\\\",\\\"Guided Educational Farm & Botany Tour\\\",\\\"Hands-on Agricultural Activity & Potting Demonstration\\\",\\\"Traditional Outdoor Games & Sports Coordinator\\\",\\\"Swimming Pool Access under Lifeguard Supervision\\\",\\\"Complimentary Entry for Accompanying Teachers (1 per 20 students)\\\"]\"','\"[\\\"School Bus Transportation\\\",\\\"Personal Memorabilia\\\"]\"',1,1,'2026-08-31 03:10:07','2026-08-31 06:28:37',NULL),(33,'कॉर्पोरेट टीम आऊटिंग पॅकेज','Corporate Outing Package','Corporate Outing Package','corporate-outing-package','१ दिवस / बहु-दिवसीय टीम रिट्रीट','1 Day / Multi-Day Team Retreat','Team building retreat with open-air conference lawn, team games, DJ rain dance, buffet dining, and relaxation.','Boost team morale and relieve corporate burnout with curated team activities, spacious lush green lawns for group games, rain dance party, and grand buffet meals.','1 Day / Multi-Day Team Retreat',1299.00,'कंपनी कर्मचाऱ्यांसाठी टीम बिल्डिंग खेळ, ओपन-एअर लॉन, डीजे रेन डान्स, बुफे जेवण आणि रिलॅक्सेशन.','Team building retreat with open-air conference lawn, team games, DJ rain dance, buffet dining, and relaxation.','कंपनीच्या सहकाऱ्यांसाठी ताणतणावमुक्त आणि उत्साही दिवस. टीम बॉन्डिंग उपक्रम, प्रशस्त लॉन, डीजे रेन डान्स, स्वादिष्ट बुफे जेवण आणि उत्तम सोयीसुविधा.','Boost team morale and relieve corporate burnout with curated team activities, spacious lush green lawns for group games, rain dance party, and grand buffet meals.',1099.00,'uploads/packages/1788242608_aPTFqiQ6UI.png','active',1,1,'\"[\\\"Welcome Mocktails & Executive Breakfast\\\",\\\"Unlimited Royal Buffet Lunch & Evening High Tea\\\",\\\"Spacious Lawn for Corporate Team Building Activities\\\",\\\"Dedicated Event Anchor \\\\\\/ Coordinator for Team Games\\\",\\\"Rain Dance with DJ Sound System\\\",\\\"Projector \\\\\\/ PA System Setup on Request\\\"]\"','\"[\\\"Alcoholic Beverages\\\",\\\"Special Custom Stage Setup (Available on Add-on)\\\"]\"',0,1,'2026-08-31 03:10:07','2026-09-01 00:33:28',NULL),(34,'ग्रुप व ग्रुप गेट-टुगेदर पॅकेज','Group Package','Group Package','group-package','१ दिवस (किमान १५ व्यक्ती)','1 Day (Minimum 15 Guests)','Special discounted group rates for kitty parties, senior citizen groups, society gatherings, and friend reunions.','Perfect for large gatherings of 15+ members. Enjoy private seating gazebos, nostalgic rural games, farm tours, swimming pool fun, and hot traditional food together.','1 Day (Minimum 15 Guests)',749.00,'मित्र-मैत्रिणी, ज्येष्ठ नागरिक मंडळे आणि सोसायटी ग्रुप्ससाठी सवलतीच्या दरातील खास ग्रुप पॅकेज.','Special discounted group rates for kitty parties, senior citizen groups, society gatherings, and friend reunions.','१५ पेक्षा जास्त व्यक्तींच्या समूहासाठी खास सवलत. एकत्र गप्पा मारण्यासाठी खाजगी जागा, स्विमिंग पूल, बैलगाडी राईड आणि गरमागरम चुलीवरच्या जेवणाची मेजवानी.','Perfect for large gatherings of 15+ members. Enjoy private seating gazebos, nostalgic rural games, farm tours, swimming pool fun, and hot traditional food together.',649.00,'uploads/packages/1788246211_MuL5OIkQNX.jpg','active',1,1,'\"[\\\"Special Group Discounted Pricing\\\",\\\"Complete Meal Package: Breakfast, Lunch, Evening Snacks\\\",\\\"Reserved Group Dining & Relaxation Area\\\",\\\"Full Access to Pool, Rain Dance, and Farm Walks\\\",\\\"Group Photoshoot Spots & Props\\\",\\\"Musical Setup for Antakshari \\\\\\/ Group Singing\\\"]\"','\"[\\\"Individual Room Allocation\\\",\\\"Transportation\\\"]\"',0,1,'2026-08-31 03:10:07','2026-09-01 01:33:31',NULL),(35,'मुक्काम कॉटेज स्टे पॅकेज (२४ तास)','Overnight Stay Package','Overnight Stay Package','overnight-stay-package','२४ तास (चेक-इन दुपारी १२:०० – दुसऱ्या दिवशी १०:००)','24 Hours (Check-in 12:00 PM – Next Day 10:00 AM)','Luxury AC eco-cottage stay with all 4 meals (Lunch, High Tea, Dinner, Breakfast), night bonfire, and sunrise walk.','Rejuvenate with a serene night amidst nature. Stay in cozy AC wooden cottages with private verandas, relish evening bonfires under starry skies, 4 complete meals, and peaceful morning bird walks.','24 Hours (Check-in 12:00 PM – Next Day 10:00 AM)',3999.00,'वातानुकूलित लक्झरी कॉटेज मुक्काम, सर्व ४ वेळचे जेवण, रात्रीची शेकोटी आणि रम्य पहाट शिवार फेरी.','Luxury AC eco-cottage stay with all 4 meals (Lunch, High Tea, Dinner, Breakfast), night bonfire, and sunrise walk.','निसर्गाच्या कुशीत शांत रात्रीचा मुक्काम. वातानुकूलित लाकडी कॉटेज, संध्याकाळी शेकोटी, चारही वेळचे स्वादिष्ट जेवण आणि सकाळी पक्षांच्या किलबिलाटात प्रसन्न शिवार फेरी.','Rejuvenate with a serene night amidst nature. Stay in cozy AC wooden cottages with private verandas, relish evening bonfires under starry skies, 4 complete meals, and peaceful morning bird walks.',3499.00,'uploads/packages/1788178782_qyi4sXquWZ.png','active',1,1,'\"[\\\"AC Deluxe Nature-View Wooden Cottage Accommodation\\\",\\\"4 Complete Meals: Lunch, High Tea, Dinner & Next Day Breakfast\\\",\\\"Evening Cozy Bonfire & Music Gathering\\\",\\\"Early Morning Guided Sunrise Farm Walk\\\",\\\"Full 2-Day Access to Pool, Rain Dance & Activities\\\",\\\"Free Wi-Fi & 24x7 Power Backup\\\"]\"','\"[\\\"Late Check-out beyond 11:00 AM\\\",\\\"Special Midnight Room Service\\\"]\"',0,1,'2026-08-31 03:10:07','2026-08-31 06:49:44',NULL),(36,'स्पेशल गावरान हुर्डा पार्टी पॅकेज','Special Village Hurda Party Package','Special Village Hurda Party Package','special-village-hurda-party-package-kYDBG','१ दिवस (सकाळी ९ ते संध्याकाळी ६)','1 Day (9:00 AM to 6:00 PM)','Unlimited Fresh Roasted Hurda, Traditional Chutneys, Wood-Fired Meals, Pool Access & Agro Activities.','Experience the rich winter traditions with our special Hurda Party Package at Visawa Agro Tourism! Enjoy tender, farm-fresh roasted jowar (Hurda) served with authentic spicy chutneys, organic jaggery, and dry coconut. The package includes a welcome breakfast, unlimited wood-fired Maharashtrian lunch, swimming pool & rain dance, bullock cart rides, farm walk, and evening high-tea.','1 Day (9:00 AM to 6:00 PM)',999.00,'ताजा भाजलेला हुर्डा, विविध चटण्या, गुळ-खोबरे, अमर्याद जेवण, स्विमिंग पूल आणि ॲग्रो ॲक्टिव्हिटीज्.','Unlimited Fresh Roasted Hurda, Traditional Chutneys, Wood-Fired Meals, Pool Access & Agro Activities.','विसावा ॲग्रो टुरिझमचे खास हिवाळी हुर्डा पार्टी पॅकेज! यामध्ये पर्यटकांना शेतात थेट निखाऱ्यावर भाजलेला गरमागरम हुर्डा, शेंगदाणा-लसूण चटणी, गुळ आणि खोबऱ्याचा आस्वाद घेता येईल. यासोबत सकाळचा नाश्ता, चुलीवरचे अस्सल गावरान दुपारचे जेवण, स्विमिंग पूल, बैलगाडी सफर, शेतीची सफर आणि संध्याकाळचा चहा-नाश्ता समाविष्ट आहे.','Experience the rich winter traditions with our special Hurda Party Package at Visawa Agro Tourism! Enjoy tender, farm-fresh roasted jowar (Hurda) served with authentic spicy chutneys, organic jaggery, and dry coconut. The package includes a welcome breakfast, unlimited wood-fired Maharashtrian lunch, swimming pool & rain dance, bullock cart rides, farm walk, and evening high-tea.',799.00,'uploads/packages/1788177763_vf8c3CCDSB.png','active',1,NULL,NULL,NULL,0,1,'2026-08-31 06:32:44','2026-08-31 06:32:44',NULL),(37,'चाचणी पॅकेज','Test Package',NULL,'test-package-g84kn','१ दिवस','1 Day',NULL,NULL,NULL,0.00,NULL,NULL,NULL,NULL,NULL,NULL,'active',NULL,NULL,NULL,NULL,0,1,'2026-09-01 00:32:59','2026-09-01 00:32:59','2026-09-01 00:32:59');
/*!40000 ALTER TABLE `packages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` text NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`),
  KEY `personal_access_tokens_expires_at_index` (`expires_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `settings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) NOT NULL,
  `value` text DEFAULT NULL,
  `group` varchar(255) NOT NULL DEFAULT 'general',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `settings_key_unique` (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` VALUES (1,'site_name','Visava Amusement Park & Resort','general','2026-08-25 00:06:32','2026-08-25 00:06:32'),(2,'contact_email','info@visava.com','contact','2026-08-25 00:06:32','2026-08-25 00:06:32'),(3,'contact_phone','+91 91581 41414','contact','2026-08-25 00:06:32','2026-08-28 23:51:29'),(4,'address','Visava Resort, Maharashtra, India','contact','2026-08-25 00:06:32','2026-08-25 00:06:32'),(5,'facebook_url','https://facebook.com/visawa','social','2026-08-25 00:06:32','2026-08-25 05:21:42'),(6,'instagram_url','https://instagram.com/visawa','social','2026-08-25 00:06:32','2026-08-25 05:21:42'),(7,'site_name_mr','विसावा ॲग्रो टुरिझम – बाबांचा मळा','general','2026-08-25 00:50:13','2026-08-25 05:21:42'),(8,'site_name_en','Visawa Agro Tourism – Babacha Mala','general','2026-08-25 00:50:13','2026-08-25 05:21:42'),(9,'site_email','Visawaagrotourism@gmail.com','contact','2026-08-25 00:50:13','2026-09-01 06:14:27'),(10,'site_phone','+91 91581 41414','contact','2026-08-25 00:50:13','2026-08-28 23:51:29'),(11,'address_mr','विसावा ॲग्रो टुरिझम – बाबांचा मळा, निसर्गरम्य परिसर, महाराष्ट्र, भारत','contact','2026-08-25 00:50:13','2026-08-25 05:21:42'),(12,'address_en','Visawa Agro Tourism – Babacha Mala, Scenic Countryside, Maharashtra, India','contact','2026-08-25 00:50:13','2026-08-25 05:21:42'),(13,'logo','','general','2026-08-25 00:50:13','2026-08-25 00:50:13'),(14,'favicon','','general','2026-08-25 00:50:13','2026-08-25 00:50:13'),(15,'youtube_url','https://youtube.com/@visawa','social','2026-08-25 00:50:13','2026-08-25 05:21:42'),(16,'linkedin_url','https://linkedin.com/company/visawa','social','2026-08-25 00:50:13','2026-08-25 05:21:42'),(17,'meta_title_mr','विसावा ॲग्रो टुरिझम – बाबांचा मळा | सर्वोत्तम कौटुंबिक कृषी पर्यटन केंद्र','seo','2026-08-25 00:50:13','2026-08-25 05:21:42'),(18,'meta_title_en','Visawa Agro Tourism – Babacha Mala | Best Nature & Farm Getaway','seo','2026-08-25 00:50:13','2026-08-25 05:21:42'),(19,'meta_description_mr','द्राक्ष बागांची सफर, चुलीवरचे अस्सल गावरान भोजन, स्विमिंग पूल आणि कौटुंबिक मनोरंजनाचा आनंद घ्या.','seo','2026-08-25 00:50:13','2026-08-25 05:21:42'),(20,'meta_description_en','Experience nature, vineyard tours, wood-fired authentic food, pool, and family fun at Babacha Mala.','seo','2026-08-25 00:50:13','2026-08-25 05:21:42'),(21,'meta_keywords_mr','विसावा, ॲग्रो टुरिझम, बाबांचा मळा, कृषी पर्यटन, हुरडा पार्टी, गावरान जेवण','seo','2026-08-25 00:50:13','2026-08-25 05:21:42'),(22,'meta_keywords_en','visawa, agro tourism, babacha mala, farm tour, hurda party, village food','seo','2026-08-25 00:50:13','2026-08-25 05:21:42'),(23,'hero_title_mr','निसर्गाच्या सानिध्यात, ग्रामीण संस्कृतीचा अविस्मरणीय विसावा','hero','2026-08-25 00:50:13','2026-08-25 05:21:42'),(24,'hero_title_en','Experience Nature, Tradition & Unforgettable Hospitality','hero','2026-08-25 00:50:13','2026-08-25 05:21:42'),(25,'hero_subtitle_mr','विसावा ॲग्रो टुरिझम – बाबांचा मळा येथे कौटुंबिक आनंद, चुलीवरची चव, द्राक्ष बागांची सफर, ग्रामीण खेळ आणि शांत मुक्कामाचा आनंद घ्या.','hero','2026-08-25 00:50:13','2026-08-25 05:21:42'),(26,'hero_subtitle_en','Discover the rustic charm of rural Maharashtra with vineyard tours, wood-fired dining, pool, and peaceful cottage stays.','hero','2026-08-25 00:50:13','2026-08-25 05:21:42'),(27,'hero_image','uploads/settings/visawa_grand_entrance_hero.jpg','homepage','2026-08-25 00:50:13','2026-08-31 05:48:53'),(28,'about_title_mr','विसावा रिसॉर्ट बद्दल','about','2026-08-25 00:50:13','2026-08-25 01:09:55'),(29,'about_title_en','About Visava Resort','about','2026-08-25 00:50:13','2026-08-25 00:50:13'),(30,'about_description_mr','विसावा हे महाराष्ट्रातील अग्रगण्य ॲम्युझमेंट आणि वॉटर पार्क रिसॉर्ट आहे, जे निसर्गरम्य वातावरणात जागतिक दर्जाच्या सुविधा पुरवते.','about','2026-08-25 00:50:13','2026-08-25 01:09:55'),(31,'about_description_en','Visava is a premier amusement and water park resort offering world-class hospitality and adventure amidst lush greenery.','about','2026-08-25 00:50:13','2026-08-25 00:50:13'),(32,'about_image','uploads/settings/visawa_farmer_bullocks_about.jpg','about','2026-08-25 00:50:13','2026-08-31 03:00:57'),(33,'why_title_mr','विसावा रिसॉर्ट का निवडावे?','why_us','2026-08-25 00:50:13','2026-08-25 01:09:55'),(34,'why_title_en','Why Choose Visava Resort?','why_us','2026-08-25 00:50:13','2026-08-25 00:50:13'),(35,'why_description_mr','सुरक्षित राइड्स, शुद्ध व स्वादिष्ट अन्न, आलिशान खोल्या आणि उत्कृष्ट ग्राहक सेवा.','why_us','2026-08-25 00:50:13','2026-08-25 01:09:55'),(36,'why_description_en','Safe thrilling rides, hygienic delicious dining, luxury rooms, and 24/7 dedicated guest support.','why_us','2026-08-25 00:50:13','2026-08-25 00:50:13'),(37,'contact_title_mr','आमच्याशी संपर्क साधा','contact_section','2026-08-25 00:50:13','2026-08-25 01:09:55'),(38,'contact_title_en','Get in Touch With Us','contact_section','2026-08-25 00:50:13','2026-08-25 00:50:13'),(39,'contact_description_mr','बुकिंग आणि अधिक माहितीसाठी आजच आम्हाला संपर्क करा.','contact_section','2026-08-25 00:50:13','2026-08-25 01:09:55'),(40,'contact_description_en','Reach out to our team for custom packages and instant bookings.','contact_section','2026-08-25 00:50:13','2026-08-25 00:50:13'),(41,'whatsapp_owner_number','919158141414','contact','2026-08-28 23:51:29','2026-08-28 23:51:29');
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `testimonials`
--

DROP TABLE IF EXISTS `testimonials`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `testimonials` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `client_name` varchar(255) DEFAULT NULL,
  `client_designation_mr` varchar(255) DEFAULT NULL,
  `client_designation_en` varchar(255) DEFAULT NULL,
  `review_mr` text DEFAULT NULL,
  `review_en` text DEFAULT NULL,
  `client_image` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `rating` tinyint(3) unsigned NOT NULL DEFAULT 5,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `comment` text DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `is_approved` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `testimonials`
--

LOCK TABLES `testimonials` WRITE;
/*!40000 ALTER TABLE `testimonials` DISABLE KEYS */;
INSERT INTO `testimonials` VALUES (1,'सचिन कुलकर्णी (Sachin Kulkarni)','पुणे (कौटुंबिक पर्यटक)','Pune (Family Visitor)','बाबांचा मळा येथे आमच्या संपूर्ण कुटुंबाला प्रचंड आनंद मिळाला. चुलीवरची मिसळ आणि हुरडा पार्टी अप्रतिम होती. मुले शेती आणि स्विमिंग पूलमध्ये रमून गेली.','Our entire family had a fabulous experience at Babacha Mala! The wood-fired Misal and fresh Hurda party were outstanding. The kids loved the farm activities and pool.',NULL,'सचिन कुलकर्णी (Sachin Kulkarni)','Pune (Family Visitor)',5,'active','Our entire family had a fabulous experience at Babacha Mala! The wood-fired Misal and fresh Hurda party were outstanding. The kids loved the farm activities and pool.',NULL,1,'2026-08-25 05:32:17','2026-08-25 05:32:17',NULL),(2,'प्रिया सावंत (Priya Sawant)','मुंबई (कॉर्पोरेट ग्रुप लीडर)','Mumbai (Corporate Group)','शहरी गोंगाटापासून दूर अतिशय शांत आणि निसर्गरम्य जागा. कॉटेजेस स्वच्छ आहेत आणि आदरातिथ्य घरच्यासारखे आहे. आम्ही नक्की पुन्हा येऊ!','A serene and rejuvenating getaway from city life. The cottages are sparkling clean and the staff hospitality is heartwarming. Highly recommended for group outings!',NULL,'प्रिया सावंत (Priya Sawant)','Mumbai (Corporate Group)',5,'active','A serene and rejuvenating getaway from city life. The cottages are sparkling clean and the staff hospitality is heartwarming. Highly recommended for group outings!',NULL,1,'2026-08-25 05:32:17','2026-08-25 05:32:17',NULL),(3,'अमित पाटील (Amit Patil)','नाशिक (डे पिकनिक पाहुणे)','Nashik (Day Picnic Guest)','द्राक्ष बागांची सफर आणि बैलगाडी राईड खूपच छान होती. अस्सल गावरान जेवणाची चव जिभेवर रेंगाळत राहते. वाजवी दरात सर्वोत्तम पॅकेज!','The vineyard tour and bullock cart ride took us back to our childhood roots. The pure rustic Gavran food is unforgettable. Best value for money agro tour!',NULL,'अमित पाटील (Amit Patil)','Nashik (Day Picnic Guest)',5,'active','The vineyard tour and bullock cart ride took us back to our childhood roots. The pure rustic Gavran food is unforgettable. Best value for money agro tour!',NULL,1,'2026-08-25 05:32:17','2026-08-25 05:32:17',NULL);
/*!40000 ALTER TABLE `testimonials` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Visawa Admin','admin@visava.com',1,'2026-09-02 00:04:23','$2y$12$6BbGI7zWrSuQmBcHFMPNk.t/tpTiIpmREPRiTwlAWcinkVBkC0xqu','2ZJcD7Pj7ucwiTNYCaMPBSeRX4RmzYvbrtb31DVb1Fm6ucayxYerxn2HhPP6','2026-09-02 00:04:23','2026-09-02 00:04:23');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-09-02 11:48:41
