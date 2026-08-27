import { Injectable, signal, computed } from '@angular/core';

export type LanguageCode = 'mr' | 'en';

export interface Translations {
  [key: string]: string;
}

const MARATHI_TRANSLATIONS: Translations = {
  // Brand
  'brand.name': 'विसावा ॲग्रो टुरिझम – बाबांचा मळा',
  'brand.shortName': 'विसावा ॲग्रो टुरिझम',
  'brand.tagline': 'निसर्गाचा अनुभव घ्या. परंपरा जपा. आठवणी साठवा.',
  'brand.fullTagline': 'विसावा ॲग्रो टुरिझम – बाबांचा मळा | निसर्ग, परंपरा आणि अविस्मरणीय आदरातिथ्य.',

  // Top Bar & Header
  'topbar.openDaily': 'दररोज खुले: सकाळी ९:०० ते संध्या. ७:००',
  'topbar.phone': '+९१ ९८७६५ ४३२१०',
  'topbar.email': 'info@visava.com',
  'topbar.whatsapp': 'व्हॉट्सॲप चॅट',

  // Navigation
  'nav.home': 'मुख्यपृष्ठ',
  'nav.about': 'आमच्याबद्दल',
  'nav.experiences': 'अनुभव व उपक्रम',
  'nav.packages': 'पॅकेजेस',
  'nav.events': 'इव्हेंट्स',
  'nav.gallery': 'गॅलरी',
  'nav.blogs': 'ब्लॉग्स',
  'nav.contact': 'संपर्क',
  'nav.bookNow': 'आताच बुक करा',
  'nav.phone': 'थेट कॉल करा',

  // Hero Section
  'hero.badge': '🌱 महाराष्ट्रातील अग्रगण्य अस्सल कृषी व निसर्ग पर्यटन केंद्र',
  'hero.title': 'निसर्गाच्या सानिध्यात, ग्रामीण संस्कृतीचा अविस्मरणीय विसावा',
  'hero.subtitle': 'विसावा ॲग्रो टुरिझम – बाबांचा मळा येथे कौटुंबिक आनंद, अस्सल चुलीवरची चव, द्राक्ष बागांची सफर, ग्रामीण खेळ, जलविहार आणि शांत निसर्गरम्य मुक्कामाचा आनंद घ्या.',
  'hero.exploreExperiences': 'उपक्रम एक्सप्लोर करा',
  'hero.bookEnquiry': 'आताच बुक करा',
  'hero.viewGallery': 'मळ्याची गॅलरी',
  'hero.statGuests': '५०,०००+ समाधानी पर्यटक व कुटुंबे',
  'hero.statAcres': '१५+ एकर विस्तीर्ण निसर्गरम्य मळा',
  'hero.statActivities': '२५+ अस्सल ग्रामीण व कृषी उपक्रम',
  'hero.statRating': '४.९/५ कौटुंबिक समाधान रेटिंग',
  'hero.scrollDown': 'खाली एक्सप्लोर करा',

  // Property Overview (6 Pillars)
  'overview.badge': 'मळ्यातील जीवन',
  'overview.title': 'विसावा ॲग्रो टुरिझमची ६ मुख्य वैशिष्ट्ये',
  'overview.subtitle': 'शहरी धावपळीपासून दूर, निसर्गाच्या कुशीत शांतता आणि पारंपारिक आनंदाची अनुभूती',
  'overview.card1Title': '१००% अस्सल निसर्ग परिसर',
  'overview.card1Desc': 'हिरवीगार शेती, फळबागा, नारळी-सुपारीच्या बागा आणि शुद्ध मोकळी हवा.',
  'overview.card2Title': 'पारंपारिक ग्रामीण संस्कृती',
  'overview.card2Desc': 'बैलगाडी सफर, ग्रामीण खेळ, विहीर स्नान आणि अस्सल लोककलांचा अनुभव.',
  'overview.card3Title': 'कौटुंबिक व मुलांचे मनोरंजन',
  'overview.card3Desc': 'लहान मुलांसाठी सुरक्षित खेळ, ॲडव्हेंचर झोन आणि कौटुंबिक स्नेहसंमेलन सोयी.',
  'overview.card4Title': 'चुलीवरचे अस्सल महाराष्ट्रीयन भोजन',
  'overview.card4Desc': 'झणझणीत चुलीवरची मिसळ, गरमागरम भाकरी, शेतातली ताजी भाजी आणि घरगुती जेवण.',
  'overview.card5Title': 'प्रत्यक्ष शेती व फळबागा सफर',
  'overview.card5Desc': 'द्राक्ष बागा, सेंद्रिय भाजीपाला शेती आणि हंगामी हुरडा पार्टीचा आनंद.',
  'overview.card6Title': 'आरामदायी ग्रामीण मुक्काम',
  'overview.card6Desc': 'पारंपारिक शैलीतील डिलक्स कॉटेजेस, प्रशस्त लॉन आणि शांत विश्रांती.',

  // About Section
  'about.badge': 'आमची गोष्ट व परंपरा',
  'about.title': 'बाबांचा मळा – मातीशी आणि माणसांशी जोडलेली एक सुखद कहाणी',
  'about.desc1': 'विसावा ॲग्रो टुरिझम (बाबांचा मळा) हे केवळ पर्यटन स्थळ नसून आपल्या पारंपारिक ग्रामीण संस्कृतीचे आणि शेतीच्या समृद्ध वारशाचे जिवंत रूप आहे. शहरात राहणाऱ्या नव्या पिढीला शेती, निसर्ग आणि आपले अस्सल खाद्यसंस्कृतीचे वैभव अनुभवता यावे या ध्येयाने हा मळा साकारला आहे.',
  'about.desc2': 'येथे येणाऱ्या प्रत्येक पाहुण्याला घरचे प्रेम, ताजे सेंद्रिय अन्न, स्वच्छ वातावरण आणि ग्रामीण खेळांचा मनमुराद आनंद मिळतो. आमच्या १५ एकर विस्तीर्ण मळ्यात प्रत्येक ऋतूत वेगळे निसर्गसौंदर्य बहरते.',
  'about.storyTitle': 'आमची गोष्ट (Our Story)',
  'about.storyDesc': 'मातीची सेवा आणि पर्यटकांना निर्मळ आनंद देण्याच्या ध्यासातून "बाबांचा मळा" चा प्रवास सुरू झाला. आज हजारो कुटुंबांसाठी हे हक्काचे विसाव्याचे ठिकाण बनले आहे.',
  'about.missionTitle': 'आमचे ध्येय (Mission)',
  'about.missionDesc': 'निसर्गपूरक आणि पारंपारिक कृषी पर्यटनाच्या माध्यमातून ग्रामीण संस्कृतीचे जतन करणे आणि शाश्वत शेतीला प्रोत्साहन देणे.',
  'about.visionTitle': 'आमची दृष्टी (Vision)',
  'about.visionDesc': 'महाराष्ट्रातील अव्वल, सुरक्षित आणि सर्वसमावेशक कौटुंबिक कृषी पर्यटन केंद्र म्हणून नावलौकिक मिळवणे.',
  'about.feature1': '१५+ एकर सेंद्रिय फळबागा व शेत शिवार',
  'about.feature2': 'स्वच्छ स्विमिंग पूल, रेन डान्स व विहीर स्नान',
  'about.feature3': '१००% शुद्ध, घरगुती चुलीवरचे चविष्ट अन्न',
  'about.feature4': 'कौटुंबिक सहल व ग्रुप पिकनिकसाठी सुरक्षित परिसर',

  // Experiences & Activities Section
  'exp.badge': 'मळ्यातील अनुभव व आकर्षणे',
  'exp.title': 'शेतातील विविध खेळ, मनोरंजन व कृषी उपक्रम',
  'exp.subtitle': 'लहानांपासून ज्येष्ठांपर्यंत सर्वांसाठी मनसोक्त आनंद देणारे अस्सल उपक्रम',
  'exp.viewAll': 'सर्व उपक्रम पहा',
  'exp.exploreBtn': 'अधिक माहिती पहा',
  'exp.loading': 'उपक्रम लोड होत आहेत...',
  'exp.empty': 'सध्या कोणतेही उपक्रम उपलब्ध नाहीत.',
  'exp.error': 'उपक्रम लोड करताना त्रुटी आली. कृपया पुन्हा प्रयत्न करा.',

  // Packages Section
  'packages.badge': 'कृषी व सहल पॅकेजेस',
  'packages.title': 'तुमच्या सुट्टीसाठी खास डिझाइन केलेले पॅकेजेस',
  'packages.subtitle': '१ दिवसाच्या डे-पिकनिक पासून ते वीकेंड मुक्कामापर्यंत वाजवी दरातील योजना',
  'packages.viewAll': 'सर्व पॅकेजेस पहा',
  'packages.priceFrom': 'दर प्रति व्यक्ती',
  'packages.inclusions': 'पॅकेजमध्ये समाविष्ट',
  'packages.bookWhatsApp': 'व्हॉट्सॲपवर बुकिंग करा',
  'packages.viewDetails': 'तपशील पहा',
  'packages.duration': 'कालावधी',
  'packages.loading': 'पॅकेजेस लोड होत आहेत...',
  'packages.empty': 'सध्या कोणतेही पॅकेजेस उपलब्ध नाहीत.',

  // Package Details
  'packageDetails.badge': 'पॅकेज तपशील',
  'packageDetails.overview': 'पॅकेजचा संक्षिप्त गोषवारा',
  'packageDetails.description': 'सविस्तर माहिती व कार्यक्रम पत्रिका',
  'packageDetails.price': 'पॅकेज किंमत',
  'packageDetails.duration': 'कालावधी',
  'packageDetails.bookNow': 'व्हॉट्सॲपवर त्वरित चौकशी करा',
  'packageDetails.callNow': 'थेट फोनवर बोला',
  'packageDetails.back': '← सर्व पॅकेजेसवर परत जा',
  'packageDetails.notFound': 'पॅकेज सापडले नाही',
  'packageDetails.inclusionsTitle': 'पॅकेजमध्ये काय समाविष्ट आहे?',
  'packageDetails.inclusion1': 'सकाळचा नाश्ता, दुपारचे अमर्यादित जेवण व संध्याकाळचा चहा',
  'packageDetails.inclusion2': 'सर्व कृषी उपक्रम, बागांची सफर व बैलगाडी राईड',
  'packageDetails.inclusion3': 'स्विमिंग पूल, रेन डान्स व विहीर स्नान प्रवेश',
  'packageDetails.inclusion4': 'लहान मुलांचे खेळ व ग्रामीण खेळांचे साहित्य',

  // Food & Dining Section
  'dining.badge': 'अस्सल गावरान स्वाद',
  'dining.title': 'अस्सल महाराष्ट्रीयन व चुलीवरचे जेवण',
  'dining.subtitle': 'शेतातल्या ताज्या सेंद्रिय भाज्या, चुलीवरचा सुगंध, पारंपरिक पाककृती आणि आपुलकीचे गावरान आदरातिथ्य.',
  'dining.cta': 'डायनिंग अनुभव बुक करा',
  'dining.item1Badge': 'स्वाक्षरी थाळी',
  'dining.item1Title': 'अस्सल महाराष्ट्रीयन गावरान थाळी',
  'dining.item1Desc': 'ज्वारी/बाजरीची गरमागरम भाकरी, पिठलं, ठेचा, वांग्याचं भरीत, ताजी भाजी आणि घरगुती चवीची परिपूर्ण गावरान थाळी.',
  'dining.item2Badge': 'सकाळचा नाश्ता',
  'dining.item2Title': 'पारंपारिक गावरान नाश्ता',
  'dining.item2Desc': 'सकाळची ताजी सुरुवात गरमागरम पोहे, उपमा, वाफाळलेला चहा आणि स्थानिक घटकांपासून बनवलेल्या अस्सल नाश्त्याने करा.',
  'dining.item3Badge': 'मळ्यातील प्रसिद्ध',
  'dining.item3Title': 'चुलीवरची झणझणीत मिसळ',
  'dining.item3Desc': 'पारंपारिक मातीच्या चुलीवर मंद आचेवर शिजवलेली आमची प्रसिद्ध झणझणीत मिसळ, कुरकुरीत फरसाण आणि ताज्या पावासह.',
  'dining.item4Badge': 'संध्याकाळचा चहा',
  'dining.item4Title': 'हाय टी व खमंग स्नॅक्स',
  'dining.item4Desc': 'शांत निसर्गरम्य वातावरणात गरमागरम चहा, कॉफी, घरगुती खमंग स्नॅक्स आणि संध्याकाळच्या निवांत क्षणांचा आनंद घ्या.',
  'dining.item5Badge': '१००% सेंद्रिय',
  'dining.item5Title': 'मळ्यातील ताजी सेंद्रिय फळे',
  'dining.item5Desc': 'थेट मळ्यातून ताजी तोडलेली सेंद्रिय द्राक्षे, पेरू, डाळिंब, नारळ आणि मोसमी फळांचा अस्सल नैसर्गिक आस्वाद.',
  'dining.item6Badge': 'ग्रुप मेजवानी',
  'dining.item6Title': 'विशेष ग्रुप व फॅमिली मेजवानी',
  'dining.item6Desc': 'शालेय सहली, कॉर्पोरेट आऊटिंग, वाढदिवस आणि कौटुंबिक स्नेहसंमेलनांसाठी खास कस्टमाईज्ड स्वादिष्ट गावरान भोजन पॅकेजेस.',

  // Gallery Section
  'gallery.badge': 'मळ्याची छायाचित्रे',
  'gallery.title': 'विसावा कृषी पर्यटनाचे सुंदर क्षण',
  'gallery.subtitle': 'निसर्गाची विविध रूपे, आनंदी पाहुणे आणि संस्मरणीय क्षणांची झलक',
  'gallery.all': 'सर्व फोटो',
  'gallery.farm': 'शेती व बागा',
  'gallery.activities': 'खेळ व उपक्रम',
  'gallery.food': 'खाद्यसंस्कृती',
  'gallery.stay': 'मुक्काम व कॉटेज',
  'gallery.viewAll': 'संपूर्ण गॅलरी पहा',
  'gallery.loading': 'फोटो लोड होत आहेत...',
  'gallery.empty': 'सध्या कोणतेही फोटो उपलब्ध नाहीत.',

  // Testimonials Section
  'testimonials.badge': 'पाहुण्यांचे अनुभव',
  'testimonials.title': 'आमच्या समाधानी पर्यटकांचे मनोगत',
  'testimonials.subtitle': 'विसावा ॲग्रो टुरिझम – बाबांचा मळा येथे आलेल्या पाहुण्यांच्या प्रतिक्रिया',
  'testimonials.loading': 'प्रतिक्रिया लोड होत आहेत...',
  'testimonials.empty': 'सध्या कोणत्याही प्रतिक्रिया उपलब्ध नाहीत.',

  // Events & Celebrations Section
  'events.badge': 'खास सोहळे व कार्यक्रम',
  'events.title': 'कौटुंबिक स्नेहसंमेलन, वाढदिवस व ग्रुप पिकनिक',
  'events.subtitle': 'निसर्गाच्या सानिध्यात साजरे करा तुमचे आनंदाचे क्षण',
  'events.type1Title': 'शालेय सहली (School Picnics)',
  'events.type1Desc': 'विद्यार्थ्यांना शेती, निसर्ग आणि ग्रामीण जीवनाची प्रत्यक्ष माहिती देणाऱ्या सुरक्षित सहली.',
  'events.type2Title': 'कौटुंबिक स्नेहसंमेलन (Family Get-Together)',
  'events.type2Desc': 'नातेवाईक आणि मित्रांसोबत मनमोकळा वेळ घालवण्यासाठी निसर्गरम्य परिसर व उत्तम जेवण.',
  'events.type3Title': 'कॉर्पोरेट टीम आऊटिंग (Corporate Outing)',
  'events.type3Desc': 'शहरी तणावातून मुक्ती, टीम बिल्डिंग ॲक्टिव्हिटी आणि शांत वातावरणातील चर्चासत्रे.',
  'events.type4Title': 'प्री-वेडिंग व वाढदिवस फोटोशूट',
  'events.type4Desc': 'हिरवेगार निसर्ग पार्श्वभूमी, बैलगाडी आणि विहिरीच्या काठावर संस्मरणीय फोटोशूट.',
  'events.viewAll': 'सर्व इव्हेंट्स पहा',

  // Nearby Attractions Section
  'nearby.badge': 'परिसरातील प्रेक्षणीय स्थळे',
  'nearby.title': 'विसावा मळ्याजवळ काय पाहावे?',
  'nearby.subtitle': 'तुमच्या सहलीसोबत परिसरातील प्रसिद्ध पर्यटन स्थळांनाही नक्की भेट द्या',
  'nearby.place1Title': 'प्राचीन श्री क्षेत्र मंदिर',
  'nearby.place1Desc': 'मळ्यापासून केवळ १० किमी अंतरावर असलेले ऐतिहासिक आणि शांत मंदिर परिसर.',
  'nearby.place2Title': 'निसर्गरम्य धरण व व्ह्यू पॉईंट',
  'nearby.place2Desc': 'पावसाळ्यात आणि हिवाळ्यात विहंगम दृश्ये दाखवणारा शांत जलाशय परिसर.',
  'nearby.place3Title': 'ऐतिहासिक किल्ला व ट्रेक',
  'nearby.place3Desc': 'साहसी पर्यटकांसाठी निसर्ग ट्रेक आणि ऐतिहासिक वारसा अनुभवण्याचे ठिकाण.',
  'nearby.place4Title': 'स्थानिक आठवडे बाजार',
  'nearby.place4Desc': 'अस्सल ग्रामीण खरेदी, ताजी फळे, रानभाज्या आणि पारंपारिक वस्तूंचा अनुभव.',

  // FAQ Section
  'faq.badge': 'वारंवार विचारले जाणारे प्रश्न',
  'faq.title': 'काही शंका आहेत का? येथे उत्तरे मिळतील',
  'faq.subtitle': 'विसावा ॲग्रो टुरिझम – बाबांचा मळा बद्दल पर्यटकांचे नेहमीचे प्रश्न',
  'faq.q1': 'विसावा ॲग्रो टुरिझमच्या वेळा काय आहेत?',
  'faq.a1': 'मळा दररोज सकाळी ९:०० ते संध्याकाळी ७:०० पर्यंत डे-पिकनिकसाठी खुला असतो. मुक्कामाच्या पाहुण्यांसाठी चेक-इन दुपारी १२:०० आणि चेक-आऊट सकाळी १०:०० वाजता असते.',
  'faq.q2': 'डे-पिकनिक पॅकेजमध्ये काय समाविष्ट असते?',
  'faq.a2': 'डे-पिकनिक पॅकेजमध्ये सकाळचा नाश्ता, दुपारचे अमर्यादित जेवण, संध्याकाळचा चहा-भजी, सर्व शेती उपक्रम, स्विमिंग पूल, रेन डान्स व खेळांचा समावेश असतो.',
  'faq.q3': 'पूर्वनोंदणी (Advance Booking) करणे आवश्यक आहे का?',
  'faq.a3': 'होय! जेवणाची उत्तम सोय आणि गर्दीचे नियोजन करता यावे यासाठी किमान १ दिवस आधी व्हॉट्सॲप किंवा फोनवर पूर्वनोंदणी करणे आवश्यक आहे.',
  'faq.q4': 'शाकाहारी व मांसाहारी दोन्ही जेवण मिळते का?',
  'faq.a4': 'होय, शुद्ध शाकाहारी जेवण उपलब्ध असते. मांसाहारी (गावरान चिकन/मटण) जेवण पूर्वनोंदणीनुसार खास चुलीवर तयार केले जाते.',
  'faq.q5': 'स्विमिंग पूलसाठी योग्य कपडे आवश्यक आहेत का?',
  'faq.a5': 'होय, स्विमिंग पूल आणि रेन डान्ससाठी नायलॉन/सिंथेटिक कपडे वापरणे अनिवार्य आहे.',
  'faq.q6': 'पार्किंग आणि सुरक्षिततेची काय सोय आहे?',
  'faq.a6': 'मळ्यात प्रशस्त मोफत कार व बस पार्किंग उपलब्ध आहे. संपूर्ण परिसर सीसीटीव्ही व सुरक्षा रक्षकांच्या निगराणीखाली आहे.',

  // Contact & Enquiry Section
  'contact.badge': 'संपर्क व आरक्षण',
  'contact.title': 'तुमच्या सहलीचे नियोजन करण्यासाठी आजच संपर्क साधा',
  'contact.subtitle': 'विसावा ॲग्रो टुरिझम – बाबांचा मळा येथे तुमचे सहर्ष स्वागत आहे!',
  'contact.addressTitle': 'आमचा पत्ता',
  'contact.addressVal': 'विसावा ॲग्रो टुरिझम – बाबांचा मळा, निसर्गरम्य परिसर, महाराष्ट्र, भारत',
  'contact.phoneTitle': 'फोन नंबर',
  'contact.emailTitle': 'ईमेल पत्ता',
  'contact.timingTitle': 'कार्यकारी वेळा',
  'contact.timingVal': 'सोमवार ते रविवार: सकाळी ९:०० ते संध्याकाळी ७:००',
  'contact.chatWhatsApp': 'व्हॉट्सॲपवर थेट संवाद साधा',
  'contact.callUs': 'आता थेट कॉल करा',
  'contact.getDirections': 'गुगल मॅप्सवर दिशा पहा',

  // Enquiry Form
  'form.title': 'ऑनलाइन चौकशी फॉर्म',
  'form.name': 'तुमचे पूर्ण नाव',
  'form.namePlaceholder': 'उदा. राहुल पाटील',
  'form.nameRequired': 'कृपया आपले नाव प्रविष्ट करा.',
  'form.email': 'ईमेल पत्ता',
  'form.emailPlaceholder': 'उदा. rahul@example.com',
  'form.emailRequired': 'कृपया वैध ईमेल पत्ता प्रविष्ट करा.',
  'form.phone': 'मोबाईल नंबर',
  'form.phonePlaceholder': 'उदा. ९८७६५ ४३२१०',
  'form.subject': 'चौकशीचा विषय',
  'form.subjectPlaceholder': 'उदा. कौटुंबिक डे-पिकनिक बुकिंग',
  'form.message': 'तुमचा संदेश किंवा विचारणा',
  'form.messagePlaceholder': 'तारीख, पाहुण्यांची संख्या व इतर गरजा नमूद करा...',
  'form.messageRequired': 'कृपया तुमचा संदेश प्रविष्ट करा.',
  'form.submit': 'चौकशी पाठवा',
  'form.submitting': 'पाठवत आहे...',
  'form.successTitle': 'चौकशी यशस्वीरित्या पाठवली!',
  'form.success': 'धन्यवाद! आमची टीम लवकरच तुमच्याशी संपर्क साधेल.',
  'form.error': 'चौकशी पाठवताना त्रुटी आली. कृपया पुन्हा प्रयत्न करा किंवा थेट व्हॉट्सॲपवर संपर्क करा.',
  'form.sendAnother': 'आणखी एक विचारणा पाठवा',

  // Footer
  'footer.about': 'विसावा ॲग्रो टुरिझम – बाबांचा मळा हे महाराष्ट्रातील अग्रगण्य कृषी व निसर्ग पर्यटन केंद्र आहे. शेती, संस्कृती आणि मनमुराद आनंदाचे हक्काचे ठिकाण.',
  'footer.quickLinks': 'महत्वाच्या लिंक्स',
  'footer.experiences': 'प्रमुख आकर्षणे',
  'footer.contact': 'संपर्क माहिती',
  'footer.rights': 'सर्व हक्क राखीव.',
  'footer.privacy': 'गोपनीयता धोरण',
  'footer.terms': 'नियम व अटी',
  'footer.tagline': 'Experience Nature. Embrace Tradition. Create Memories.',

  // Common Buttons & States
  'btn.readMore': 'अधिक वाचा',
  'btn.viewDetails': 'तपशील पहा',
  'btn.bookPackage': 'व्हॉट्सॲपवर बुक करा',
  'btn.exploreAll': 'सर्व पहा',
  'btn.sendEnquiry': 'चौकशी पाठवा',
  'btn.callUsNow': 'आता कॉल करा',
  'btn.chatWhatsapp': 'व्हॉट्सॲप चॅट',
  'btn.backToHome': 'मुख्यपृष्ठावर परत जा',
  'state.loading': 'माहिती लोड होत आहे...',
  'state.noPackages': 'सध्या कोणतेही पॅकेजेस उपलब्ध नाहीत.',
  'state.noEvents': 'सध्या कोणतेही इव्हेंट्स उपलब्ध नाहीत.',
  'state.noBlogs': 'सध्या कोणतेही लेख उपलब्ध नाहीत.',
  'state.noGallery': 'सध्या कोणतेही फोटो उपलब्ध नाहीत.',
  'state.noTestimonials': 'सध्या कोणत्याही प्रतिक्रिया उपलब्ध नाहीत.',
  'state.noActivities': 'सध्या कोणतेही उपक्रम उपलब्ध नाहीत.',

  // 404
  '404.title': 'पृष्ठ सापडले नाही',
  '404.desc': 'तुम्ही शोधत असलेले पृष्ठ उपलब्ध नाही किंवा स्थलांतरित करण्यात आले आहे.',
  '404.btn': 'मुख्यपृष्ठावर परत जा',
};

const ENGLISH_TRANSLATIONS: Translations = {
  // Brand
  'brand.name': 'Visawa Agro Tourism – Babacha Mala',
  'brand.shortName': 'Visawa Agro Tourism',
  'brand.tagline': 'Experience Nature. Embrace Tradition. Create Memories.',
  'brand.fullTagline': 'Visawa Agro Tourism – Babacha Mala | Experience Nature, Tradition & Unforgettable Hospitality.',

  // Top Bar & Header
  'topbar.openDaily': 'Open Daily: 9:00 AM – 7:00 PM',
  'topbar.phone': '+91 98765 43210',
  'topbar.email': 'info@visava.com',
  'topbar.whatsapp': 'WhatsApp Chat',

  // Navigation
  'nav.home': 'Home',
  'nav.about': 'About Us',
  'nav.experiences': 'Experiences & Activities',
  'nav.packages': 'Packages',
  'nav.events': 'Events',
  'nav.gallery': 'Gallery',
  'nav.blogs': 'Blogs',
  'nav.contact': 'Contact',
  'nav.bookNow': 'Book Now',
  'nav.phone': 'Call Directly',

  // Hero Section
  'hero.badge': '🌱 Maharashtra’s Premier Agro & Nature Tourism Destination',
  'hero.title': 'Experience Nature, Tradition & Unforgettable Hospitality',
  'hero.subtitle': 'Discover the rustic charm of rural Maharashtra at Visawa Agro Tourism – Babacha Mala. Enjoy vineyard tours, wood-fired authentic dining, swimming pool, bullock cart rides, and lush peaceful stays.',
  'hero.exploreExperiences': 'Explore Experiences',
  'hero.bookEnquiry': 'Book Now',
  'hero.viewGallery': 'View Farm Gallery',
  'hero.statGuests': '50,000+ Happy Guests & Families',
  'hero.statAcres': '15+ Acres Lush Green Farm',
  'hero.statActivities': '25+ Authentic Rural & Farm Activities',
  'hero.statRating': '4.9/5 Guest Satisfaction Rating',
  'hero.scrollDown': 'Scroll to Explore',

  // Property Overview (6 Pillars)
  'overview.badge': 'Farmstead Living',
  'overview.title': '6 Pillars of Visawa Agro Tourism',
  'overview.subtitle': 'Escape the hustle of city life and reconnect with nature in authentic rural serenity',
  'overview.card1Title': '100% Authentic Nature',
  'overview.card1Desc': 'Lush agricultural fields, fruit orchards, coconut groves, and clean crisp countryside air.',
  'overview.card2Title': 'Rural Heritage & Games',
  'overview.card2Desc': 'Bullock cart rides, traditional games, well-bathing experience, and folk culture.',
  'overview.card3Title': 'Family & Children Fun',
  'overview.card3Desc': 'Dedicated child-friendly play parks, safe obstacle courses, and family picnic lawns.',
  'overview.card4Title': 'Wood-Fired Maharashtrian Dining',
  'overview.card4Desc': 'Zanzanit Misal on chulha, hot bhakri, fresh farm veggies, and wholesome village food.',
  'overview.card5Title': 'Fruit Orchards & Farm Tours',
  'overview.card5Desc': 'Grape vineyard tours, organic vegetable harvesting, and seasonal winter Hurda parties.',
  'overview.card6Title': 'Rustic Cottage Stays',
  'overview.card6Desc': 'Deluxe traditional cottages, private verandahs, sprawling lawns, and peaceful starry nights.',

  // About Section
  'about.badge': 'Our Story & Heritage',
  'about.title': 'Babacha Mala – A Soulful Celebration of Soil, Farming & Hospitality',
  'about.desc1': 'Visawa Agro Tourism (Babacha Mala) is more than just a holiday getaway; it is a living celebration of Maharashtra’s rural roots and agricultural heritage. Built with a passion to reconnect urban families with nature, farming, and authentic village traditions.',
  'about.desc2': 'Every guest who steps into Babacha Mala is welcomed with warmth, fresh organic farm produce, hygienic surroundings, and boundless rural recreation. Our 15-acre property blooms with unique seasonal charm throughout the year.',
  'about.storyTitle': 'Our Story',
  'about.storyDesc': 'Born from a deep love for the soil and rural hospitality, Babacha Mala has grown into Maharashtra’s most cherished family retreat.',
  'about.missionTitle': 'Our Mission',
  'about.missionDesc': 'To preserve and celebrate authentic rural culture through sustainable, eco-friendly agro-tourism while supporting local farm communities.',
  'about.visionTitle': 'Our Vision',
  'about.visionDesc': 'To be Maharashtra’s premier, safest, and most enriching family agro-tourism destination.',
  'about.feature1': '15+ Acres Organic Orchards & Farming Fields',
  'about.feature2': 'Sparkling Swimming Pool, Rain Dance & Well Bathing',
  'about.feature3': '100% Authentic, Pure Wood-Fired Village Cuisine',
  'about.feature4': 'Safe, Secure Environment for Families & Large Groups',

  // Experiences & Activities Section
  'exp.badge': 'Farm Experiences & Activities',
  'exp.title': 'Curated Rural Games, Leisure & Agro Activities',
  'exp.subtitle': 'Exciting experiences for toddlers, youth, parents, and seniors alike',
  'exp.viewAll': 'View All Experiences',
  'exp.exploreBtn': 'Explore Experience',
  'exp.loading': 'Loading experiences from server...',
  'exp.empty': 'No experiences available at the moment.',
  'exp.error': 'Error loading activities. Please try again.',

  // Packages Section
  'packages.badge': 'Agro Tour Packages',
  'packages.title': 'Handcrafted Packages for Day Outings & Weekend Stays',
  'packages.subtitle': 'From 1-day family picnics to relaxing 2-3 day cottage stays with all meals included',
  'packages.viewAll': 'View All Packages',
  'packages.priceFrom': 'Price per person',
  'packages.inclusions': 'Package Inclusions',
  'packages.bookWhatsApp': 'Enquire on WhatsApp',
  'packages.viewDetails': 'View Details',
  'packages.duration': 'Duration',
  'packages.loading': 'Loading packages...',
  'packages.empty': 'No tour packages available currently.',

  // Package Details
  'packageDetails.badge': 'Package Overview',
  'packageDetails.overview': 'Package Summary',
  'packageDetails.description': 'Detailed Itinerary & Inclusions',
  'packageDetails.price': 'Package Rate',
  'packageDetails.duration': 'Duration',
  'packageDetails.bookNow': 'Send Enquiry on WhatsApp',
  'packageDetails.callNow': 'Call Resort Directly',
  'packageDetails.back': '← Back to All Packages',
  'packageDetails.notFound': 'Package Not Found',
  'packageDetails.inclusionsTitle': 'What is included in this package?',
  'packageDetails.inclusion1': 'Morning village breakfast, unlimited buffet lunch & evening tea',
  'packageDetails.inclusion2': 'Access to all farm experiences, vineyard tour & bullock cart ride',
  'packageDetails.inclusion3': 'Swimming pool, rain dance & agricultural well bathing access',
  'packageDetails.inclusion4': 'Access to children play area & traditional rural games',

  // Food & Dining Section
  'dining.badge': 'Authentic Village Flavors',
  'dining.title': 'Authentic Maharashtrian Cuisine',
  'dining.subtitle': 'Freshly harvested organic ingredients prepared with traditional recipes, wood-fired cooking, and authentic village hospitality.',
  'dining.cta': 'Book Dining Experience',
  'dining.item1Badge': 'Signature',
  'dining.item1Title': 'Authentic Maharashtrian Cuisine',
  'dining.item1Desc': 'Enjoy a traditional Gavran Thali with Jowar/Bajra Bhakri, Pithla, Thecha, Bharit, fresh vegetables, and homemade flavors.',
  'dining.item2Badge': 'Morning Special',
  'dining.item2Title': 'Traditional Village Breakfast',
  'dining.item2Desc': 'Start your day with freshly prepared Poha, Upma, homemade tea, and seasonal village delicacies made with local ingredients.',
  'dining.item3Badge': 'Resort Special',
  'dining.item3Title': 'Wood-Fired Misal',
  'dining.item3Desc': 'Our signature spicy Misal is cooked on a traditional wood-fired stove and served with crispy farsan and fresh Pav.',
  'dining.item4Badge': 'Evening Tea',
  'dining.item4Title': 'High Tea',
  'dining.item4Desc': 'Relax with hot tea, coffee, homemade snacks, and a peaceful countryside atmosphere during your evening break.',
  'dining.item5Badge': '100% Organic',
  'dining.item5Title': 'Seasonal Farm-Fresh Fruits',
  'dining.item5Desc': 'Taste freshly picked fruits directly from the farm for a refreshing natural experience.',
  'dining.item6Badge': 'Group Dining',
  'dining.item6Title': 'Special Group Menus',
  'dining.item6Desc': 'Customized meal packages for school trips, corporate outings, birthdays, and family gatherings with authentic village flavors.',

  // Gallery Section
  'gallery.badge': 'Farm Memories & Moments',
  'gallery.title': 'Captivating Glimpses of Visawa Agro Tourism',
  'gallery.subtitle': 'Scenic landscapes, vibrant guest celebrations, and tranquil nature moments',
  'gallery.all': 'All Photos',
  'gallery.farm': 'Farm & Orchards',
  'gallery.activities': 'Activities & Fun',
  'gallery.food': 'Food & Dining',
  'gallery.stay': 'Cottages & Stay',
  'gallery.viewAll': 'View Full Gallery',
  'gallery.loading': 'Loading photo gallery...',
  'gallery.empty': 'No gallery images available currently.',

  // Testimonials Section
  'testimonials.badge': 'Guest Stories',
  'testimonials.title': 'What Our Visitors Say About Us',
  'testimonials.subtitle': 'Heartwarming reviews from families, corporate groups, and tourists',
  'testimonials.loading': 'Loading reviews...',
  'testimonials.empty': 'No reviews available currently.',

  // Events & Celebrations Section
  'events.badge': 'Celebrations & Gatherings',
  'events.title': 'Host Unforgettable Picnics, Birthdays & Group Events',
  'events.subtitle': 'Create lasting memories in the lap of lush nature with complete hospitality',
  'events.type1Title': 'School Educational Picnics',
  'events.type1Desc': 'Safe and engaging educational tours teaching children about agriculture, cattle farming, and eco-systems.',
  'events.type2Title': 'Family Get-Togethers',
  'events.type2Desc': 'Reunite with relatives and friends in private shaded lawns with delicious unlimited home-cooked meals.',
  'events.type3Title': 'Corporate Team Outings',
  'events.type3Desc': 'De-stress from urban work routines with team building activities, rain dance, and outdoor brainstorming.',
  'events.type4Title': 'Pre-Wedding & Birthday Photoshoots',
  'events.type4Desc': 'Stunning rural backdrop, vineyard vistas, vintage bullock carts, and sunset photo points.',
  'events.viewAll': 'View All Events',

  // Nearby Attractions Section
  'nearby.badge': 'Local Sightseeing',
  'nearby.title': 'Attractions Around Visawa Agro Tourism',
  'nearby.subtitle': 'Explore historic temples, scenic viewpoints, and weekly village bazaars nearby',
  'nearby.place1Title': 'Ancient Historic Temple',
  'nearby.place1Desc': 'Serene historic temple located just 10 km away with beautiful stone architecture.',
  'nearby.place2Title': 'Scenic Lake & Dam Viewpoint',
  'nearby.place2Desc': 'Breathtaking reservoir offering panoramic sunset vistas and cool monsoon breezes.',
  'nearby.place3Title': 'Historic Hill Fort & Nature Trek',
  'nearby.place3Desc': 'An exciting nature trek for adventure enthusiasts overlooking green valleys.',
  'nearby.place4Title': 'Authentic Weekly Village Bazaar',
  'nearby.place4Desc': 'Experience traditional village shopping for fresh spices, pottery, and handicrafts.',

  // FAQ Section
  'faq.badge': 'Frequently Asked Questions',
  'faq.title': 'Got Questions? We Have Answers',
  'faq.subtitle': 'Everything you need to know about planning your visit to Visawa Agro Tourism – Babacha Mala',
  'faq.q1': 'What are the operating hours of Visawa Agro Tourism?',
  'faq.a1': 'The farm is open daily from 9:00 AM to 7:00 PM for day outings. For overnight guests, Check-in is at 12:00 PM and Check-out is at 10:00 AM.',
  'faq.q2': 'What is included in the 1-Day Picnic Package?',
  'faq.a2': 'The 1-Day Picnic package includes morning breakfast, unlimited buffet lunch, evening tea & snacks, all farm activities, swimming pool, rain dance, and bullock cart rides.',
  'faq.q3': 'Is advance booking required before visiting?',
  'faq.a3': 'Yes! To ensure fresh food preparation and personalized hospitality, advance booking via WhatsApp or phone at least 1 day prior is strongly recommended.',
  'faq.q4': 'Do you offer both Vegetarian and Non-Vegetarian food?',
  'faq.a4': 'Yes, pure vegetarian food is our standard offering. Authentic wood-fired Gavran chicken and mutton meals are prepared upon advance request.',
  'faq.q5': 'What should we wear for the swimming pool and rain dance?',
  'faq.a5': 'Nylon or synthetic swimwear is required for swimming pool and rain dance access for hygiene standards.',
  'faq.q6': 'Is parking available on site?',
  'faq.a6': 'Yes, we provide ample free parking space for both two-wheelers, private cars, and tourist buses within our secure gated property.',

  // Contact & Enquiry Section
  'contact.badge': 'Contact & Reservations',
  'contact.title': 'Plan Your Agro Getaway With Us Today',
  'contact.subtitle': 'Visawa Agro Tourism – Babacha Mala looks forward to welcoming you and your family!',
  'contact.addressTitle': 'Our Farm Address',
  'contact.addressVal': 'Visawa Agro Tourism – Babacha Mala, Scenic Countryside, Maharashtra, India',
  'contact.phoneTitle': 'Phone Support',
  'contact.emailTitle': 'Email Address',
  'contact.timingTitle': 'Visiting Hours',
  'contact.timingVal': 'Monday to Sunday: 9:00 AM – 7:00 PM',
  'contact.chatWhatsApp': 'Chat on WhatsApp',
  'contact.callUs': 'Call Directly Now',
  'contact.getDirections': 'View on Google Maps',

  // Enquiry Form
  'form.title': 'Online Inquiry Form',
  'form.name': 'Your Full Name',
  'form.namePlaceholder': 'e.g. Rahul Patil',
  'form.nameRequired': 'Please enter your full name.',
  'form.email': 'Email Address',
  'form.emailPlaceholder': 'e.g. rahul@example.com',
  'form.emailRequired': 'Please enter a valid email address.',
  'form.phone': 'Mobile / Phone Number',
  'form.phonePlaceholder': 'e.g. +91 98765 43210',
  'form.subject': 'Subject / Purpose of Visit',
  'form.subjectPlaceholder': 'e.g. Family Day Picnic Booking for 10 Persons',
  'form.message': 'Your Message / Inquiry Details',
  'form.messagePlaceholder': 'Specify preferred date, number of adults/kids, meal preferences...',
  'form.messageRequired': 'Please enter your message or query.',
  'form.submit': 'Send Booking Inquiry',
  'form.submitting': 'Sending Inquiry...',
  'form.successTitle': 'Inquiry Sent Successfully!',
  'form.success': 'Thank you! Our hospitality team will contact you shortly.',
  'form.error': 'Error submitting inquiry. Please try again or message us on WhatsApp.',
  'form.sendAnother': 'Send Another Inquiry',

  // Footer
  'footer.about': 'Visawa Agro Tourism – Babacha Mala is Maharashtra’s premier agro-tourism resort, connecting families with nature, farming heritage, and pure wood-fired village dining.',
  'footer.quickLinks': 'Quick Links',
  'footer.experiences': 'Top Experiences',
  'footer.contact': 'Contact Us',
  'footer.rights': 'All rights reserved.',
  'footer.privacy': 'Privacy Policy',
  'footer.terms': 'Terms & Conditions',
  'footer.tagline': 'Experience Nature. Embrace Tradition. Create Memories.',

  // Common Buttons & States
  'btn.readMore': 'Read More',
  'btn.viewDetails': 'View Details',
  'btn.bookPackage': 'Enquire on WhatsApp',
  'btn.exploreAll': 'Explore All',
  'btn.sendEnquiry': 'Send Inquiry',
  'btn.callUsNow': 'Call Us Now',
  'btn.chatWhatsapp': 'WhatsApp Chat',
  'btn.backToHome': 'Back to Home',
  'state.loading': 'Loading content...',
  'state.noPackages': 'No packages available currently.',
  'state.noEvents': 'No events scheduled currently.',
  'state.noBlogs': 'No blog posts published currently.',
  'state.noGallery': 'No photos in the gallery currently.',
  'state.noTestimonials': 'No guest reviews available currently.',
  'state.noActivities': 'No activities found currently.',

  // 404
  '404.title': 'Page Not Found',
  '404.desc': 'The page you are looking for does not exist or has been moved.',
  '404.btn': 'Back to Home Page',
};

@Injectable({
  providedIn: 'root',
})
export class LanguageService {
  private readonly storageKey = 'visawa_selected_lang';

  // Default to Marathi on first visit
  private langSignal = signal<LanguageCode>(this.getInitialLanguage());

  readonly currentLang = this.langSignal.asReadonly();
  readonly isMarathi = computed(() => this.langSignal() === 'mr');
  readonly isEnglish = computed(() => this.langSignal() === 'en');

  private getInitialLanguage(): LanguageCode {
    if (typeof window !== 'undefined' && window.localStorage) {
      const saved = localStorage.getItem(this.storageKey);
      if (saved === 'en' || saved === 'mr') {
        return saved;
      }
    }
    return 'mr'; // Default: Marathi
  }

  setLanguage(lang: LanguageCode): void {
    this.langSignal.set(lang);
    if (typeof window !== 'undefined' && window.localStorage) {
      localStorage.setItem(this.storageKey, lang);
    }
  }

  toggleLanguage(): void {
    const nextLang: LanguageCode = this.langSignal() === 'mr' ? 'en' : 'mr';
    this.setLanguage(nextLang);
  }

  t(key: string): string {
    const dict = this.langSignal() === 'mr' ? MARATHI_TRANSLATIONS : ENGLISH_TRANSLATIONS;
    if (dict[key]) {
      return dict[key];
    }
    // Symmetrical fallback
    const fallbackDict = this.langSignal() === 'mr' ? ENGLISH_TRANSLATIONS : MARATHI_TRANSLATIONS;
    return fallbackDict[key] || key;
  }
}