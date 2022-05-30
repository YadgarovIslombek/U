<?php

/*
Mualliflik huquqi mavjud.
Dasturchilar: @r_jahongir & @BekDev
Iltimos,mehnatni qadriga yeting.
*/


ob_start();
define('API_KEY','914623654:AAFR1IZhCZanr_CWox0-LfDDg2As6_4r3OY');
$admin = "1082470593";


function bot($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}

date_default_timezone_set('Asia/Tashkent');
$time = date("H:i");
$day = date("d.m.Y");


$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$tx = $message->text;
$cid = $message->chat->id;
$mid = $message->message_id; 

$language = json_encode([
    'resize_keyboard'=>true,
    'keyboard'=>[
    [['text'=>"🇷🇺 Русский язык"],['text'=>"🇺🇿 O’zbek tili"]],
    ]
    ]);

$menu = json_encode([
    'resize_keyboard'=>true,
    'keyboard'=>[
    [['text'=>"🛸 Internet paketlar ✨"],['text'=>"✳️ USSD kodlar ✨"]],
    [['text'=>"📚 Tarif rejalari ✨"],['text'=>"🗃️ Xizmatlar ✨"]],
    [['text'=>"⏳ Daqiqa toʻplami ✨"],['text'=>"📩 SMSlar toʻplami ✨"]],
    [['text'=>"🔎 Raqam tanlash 🎰 xizmati ✨"]],
    [['text'=>"👨🏻‍💻Biz haqimizda ma’lumot✨"],['text'=>"📊 Statistika ✨"]],
    [['text'=>"⚠️ Ogoh boʻling 📝"]],
    ]
    ]);
$internet = json_encode([
    'resize_keyboard'=>true,
    'keyboard'=>[ 
    [['text'=>"🛸 Oylik internet paketlar"]],
    [['text'=>"💫 Internet non-stop"]],
    [['text'=>"📆 Kunlik paketlar"],['text'=>"🌚 Tungi internet"]],
    [['text'=>"⚡TAS-IX paketlar (.uz)"],['text'=>"💥 Constructor TR uchun!"]],
    [['text'=>"📈 Trafikni sarflash ➿ ketma-ketligi"]],
    [['text'=>"🔙Orqaga"]],
    ]
    ]);
$oylikpaket = json_encode([
    'resize_keyboard'=>true,
    'keyboard'=>[ 
    [['text'=>"Rasm holati"]],
    [['text'=>"✅ 500 MB"],['text'=>"✅ 1500 MB"],['text'=>"✅ 3000 MB"]],
    [['text'=>"✅ 5000 MB"],['text'=>"✅ 8000 MB"],['text'=>"✅ 12000 MB"]],
    [['text'=>"✅ 20000 MB"],['text'=>"✅ 30000 MB"]],
    [['text'=>"✅ 50000 MB"],['text'=>"✅ 75000 MB"]],
    [['text'=>"🔙 Orqaga"]],
    ]
    ]);
$nonstop = json_encode([
    'resize_keyboard'=>true,
    'keyboard'=>[ 
    [['text'=>"✳️ 3000 MB"],['text'=>"✳️ 5000 MB"]], 
    [['text'=>"✳️ 8000 MB"],['text'=>"✳️ 12000 MB"]], 
    [['text'=>"✳️ 20000 MB"],['text'=>"✳️ 30000 MB"]], 
    [['text'=>"✳️ 50000 MB"],['text'=>"🔙 Orqaga"]],
    ]
    ]);
$kunlikpaketlar = json_encode([
    'resize_keyboard'=>true,
    'keyboard'=>[ 
    [['text'=>"✅ 100 MB"]], 
    [['text'=>"✅ 300 MB"]], 
    [['text'=>"✅ 600 MB"]], 
    [['text'=>"🔙 Orqaga"]],
    ]
    ]);
$tungiinternet = json_encode([
    'resize_keyboard'=>true,
    'keyboard'=>[ 
    [['text'=>"🌙 1 tun"]], 
    [['text'=>"🌙 7 tun"],['text'=>"🌙 30 tun"]], 
    [['text'=>"🔙 Orqaga"]],
    ]
    ]);  
$tasix = json_encode([
    'resize_keyboard'=>true,
    'keyboard'=>[ 
    [['text'=>"✅ 2 GB"]], 
    [['text'=>"✅ 10 GB"],['text'=>"✅ 15 GB"]], 
    [['text'=>"🔙 Orqaga"]],
    ]
    ]); 
$constructor = json_encode([
    'resize_keyboard'=>true,
    'keyboard'=>[ 
    [['text'=>"🔵 100 MB"],['text'=>"🔵 500 MB"]], 
    [['text'=>"🔵 1000 MB"],['text'=>"🔵 2000 MB"]], 
    [['text'=>"🔵 4000 MB"],['text'=>"🔙 Orqaga"]], 
    ]
    ]);    
$ussdmenyu = json_encode([
    'resize_keyboard'=>true,
    'keyboard'=>[ 
    [['text'=>"⚙️ USSD yordamchi"]],
    [['text'=>"💎 Kerakli boʻlim"]],
    [['text'=>"➕ Qoʻshimcha boʻlim"]],
    [['text'=>"🔙Orqaga"]],
    ]
    ]);
$tariflar = json_encode([
    'resize_keyboard'=>true,
    'keyboard'=>[ 
     [['text'=>"📘 Oddiy 10"],['text'=>"📒 Street"],['text'=>"📗 Onlime🆕"]],
     [['text'=>"📕 Flash"],['text'=>"📓 Royal"],['text'=>"📙 Ishbilarmon"]],
     [['text'=>"📔 Street upgrade"],['text'=>"📖 Flash upgrade"]],
     [['text'=>"📚 Tarif kodlari ✨"],['text'=>"🔙Orqaga"]],
     ]
     ]);
$xizmatlar = json_encode([
    'resize_keyboard'=>true,
    'keyboard'=>[ 
     [['text'=>"🔰 Qoʻllab yubor (mb)"],['text'=>"♻️ Foydali alishuv"]],
     [['text'=>"📎 Restart"],['text'=>"🖇️ Limitsiz ovoz"],['text'=>"💲Tezkor oʻtkazma"]],
     [['text'=>"🗨️ Yashirin qoʻngʻiroq"],['text'=>"☑️ Xabardor boʻling"]],
     [['text'=>"👪 Oila uchun"],['text'=>"⚫ Tungi qoʻngʻiroq"],['text'=>"💳 GSM xizmatlari"]],
     [['text'=>"📞 Sevimli raqam"],['text'=>"🔙Orqaga"]],
     ]
     ]);
     
$daqiqatuplam = json_encode([
    'resize_keyboard'=>true,
    'keyboard'=>[      
    [['text'=>"📞 Uzb boʻylab daqiqalar toʻplami 🌏"]],
    [['text'=>"Constructor TR abonentlar uchun"]],
    [['text'=>"🔙 Orqaga"]],
    ]
    ]);     
     
$uzbdaqiqa = json_encode([
    'resize_keyboard'=>true,
    'keyboard'=>[      
    [['text'=>"⏳ 100 daqiqa"],['text'=>"⏳ 300 daqiqa"]],
    [['text'=>"⏳ 600 daqiqa"],['text'=>"⏳ 1200 daqiqa"]],
    [['text'=>"🔙  Orqaga"]],
    ]
    ]);  
$condaqiqa = json_encode([
    'resize_keyboard'=>true,
    'keyboard'=>[ 
    [['text'=>"🕝 50 daqiqa"],['text'=>"🕝 100 daqiqa"]], 
    [['text'=>"🕝 300 daqiqa"],['text'=>"🕝 500 daqiqa"]], 
    [['text'=>"🕝 900 daqiqa"],['text'=>"🕝 1500 daqiqa"]], 
    [['text'=>"🕝 2000 daqiqa"],['text'=>"🔙  Orqaga"]],
    ]
    ]);
$raqamtanlash = json_encode([
    'resize_keyboard'=>true,
    'keyboard'=>[  
     [['text'=>"💳 Raqamlarni koʻrish"]],
     [['text'=>"💳 Raqamni yetkazib berish 🚗 xizmati"]],
     [['text'=>"💳 Raqamlar narxlari 💵 bilan tanishish"]],
     [['text'=>"🔙Orqaga"]],
     ]
     ]);  
$smstuplam = json_encode([
    'resize_keyboard'=>true,
    'keyboard'=>[ 
    [['text'=>"📩 SMS portallarni oʻchirish"]], 
    [['text'=>"📨 Oylik SMS paketlar"],['text'=>"📩 Kunlik SMS paketlar"]], 
    [['text'=>"📦 Xalqaro SMS paketlar"],['text'=>"🔙Orqaga"]],
    ]
    ]);    
$smsuchirish = json_encode([
    'resize_keyboard'=>true,
    'keyboard'=>[      
    [['text'=>"4250"],['text'=>"1254"]],
    [['text'=>"6431 yoki 7979"],['text'=>"0789 yoki 8789"]],    
    [['text'=>"Kurs valyuta 💵"],['text'=>"Munajjimlar bashorati"]],
    [['text'=>"Ob-xavo 🏝️"],['text'=>"Statuslar"],['text'=>"Qiziqarli faktlar 🗯️"]],
    [['text'=>"Portal Zamin mobile"],['text'=>"🔙 Orqaga "]],    
    ]
    ]);
$oyliksms = json_encode([
    'resize_keyboard'=>true,
    'keyboard'=>[      
    [['text'=>"📨 10 SMS"],['text'=>"📨 50 SMS"]],
    [['text'=>"📨 200 SMS"],['text'=>"📨 500 SMS"]],    
    [['text'=>"🔙 Orqaga "]],    
    ]
    ]);
$kunliksms = json_encode([
    'resize_keyboard'=>true,
    'keyboard'=>[      
    [['text'=>"📩 50 SMS"],['text'=>"📩 100 SMS"]],
    [['text'=>"🔙 Orqaga "]],    
    ]
    ]);
$xalqarosms = json_encode([
    'resize_keyboard'=>true,
    'keyboard'=>[      
    [['text'=>"📦 10 SMS"],['text'=>"📦 20 SMS"]],
    [['text'=>"📦 30 SMS"],['text'=>"📦 40 SMS"]],    
    [['text'=>"📦 50 SMS"],['text'=>"🔙 Orqaga "]],    
    ]
    ]);
    
    
///////////  ///////////  ///////////  ///////////  ///////////
   
   
 $menuru = json_encode([
    'resize_keyboard'=>true,
    'keyboard'=>[
    [['text'=>"🪐 Интернет-пакеты✨"],['text'=>"✳️ USSD коды✨"]],
    [['text'=>"📚 Tarif rejalari ✨"],['text'=>"🗃️ Xizmatlar ✨"]],
    [['text'=>"⏳ Daqiqa toʻplami ✨"],['text'=>"📩 SMSlar toʻplami ✨"]],
    [['text'=>"🔎 Raqam tanlash 🎰 xizmati ✨"]],
    [['text'=>"👨🏻‍💻Biz haqimizda ma’lumot✨"],['text'=>"📊 Statistika ✨"]],
    [['text'=>"⚠️ Ogoh boʻling 📝"]],
    ]
    ]);
$internetru = json_encode([
    'resize_keyboard'=>true,
    'keyboard'=>[ 
    [['text'=>"🪐 Ежемесячные интернет-пакеты"]],
    [['text'=>"💫 Интернет нон-стоп"]],
    [['text'=>"📆 Ежедневные пакеты"],['text'=>"🌚 Ночной интернет"]],
    [['text'=>"⚡️ Пакеты TAS-IX (.uz)"],['text'=>"💥 Для Конструктор TR!"]],
    [['text'=>"📈 Расходы трафика ➿ Последовательность"]],
    [['text'=>"🔙Назад"]],
    ]
    ]);
$oylikpaketru = json_encode([
    'resize_keyboard'=>true,
    'keyboard'=>[ 
    [['text'=>"Rasm holati"]],
    [['text'=>"✅  500 MB "],['text'=>"✅  1500 MB "],['text'=>"✅  3000 MB "]],
    [['text'=>"✅  5000 MB "],['text'=>"✅  8000 MB "],['text'=>"✅  12000 MB "]],
    [['text'=>"✅  20000 MB "],['text'=>"✅  30000 MB "]],
    [['text'=>"✅  50000 MB "],['text'=>"✅  75000 MB "]],
    [['text'=>"🔙 Назад"]],
    ]
    ]);
$nonstopru = json_encode([
    'resize_keyboard'=>true,
    'keyboard'=>[ 
    [['text'=>"✳️  3000 MB "],['text'=>"✳️  5000 MB "]], 
    [['text'=>"✳️  8000 MB "],['text'=>"✳️  12000 MB "]], 
    [['text'=>"✳️  20000 MB "],['text'=>"✳️  30000 MB "]], 
    [['text'=>"✳️  50000 MB "],['text'=>"🔙 Назад"]],
    ]
    ]);
$kunlikpaketlarru = json_encode([
    'resize_keyboard'=>true,
    'keyboard'=>[ 
    [['text'=>"✅  100 MB "]], 
    [['text'=>"✅  300 MB "]], 
    [['text'=>"✅  600 MB "]], 
    [['text'=>"🔙 Назад"]],
    ]
    ]);
$tungiinternetru = json_encode([
    'resize_keyboard'=>true,
    'keyboard'=>[ 
    [['text'=>"🌙  1 Ночь"]], 
    [['text'=>"🌙  7 Ночь"],['text'=>"🌙  30 Ночь"]], 
    [['text'=>"🔙 Назад"]],
    ]
    ]);  
$tasixru = json_encode([
    'resize_keyboard'=>true,
    'keyboard'=>[ 
    [['text'=>"✅  2 GB "]], 
    [['text'=>"✅  10 GB "],['text'=>"✅  15 GB "]], 
    [['text'=>"🔙 Orqaga"]],
    ]
    ]); 
$constructorru = json_encode([
    'resize_keyboard'=>true,
    'keyboard'=>[ 
    [['text'=>"🔵  100 MB "],['text'=>"🔵  500 MB "]], 
    [['text'=>"🔵  1000 MB "],['text'=>"🔵  2000 MB "]], 
    [['text'=>"🔵  4000 MB "],['text'=>"🔙 Назад"]], 
    ]
    ]);    
$ussdmenyuru = json_encode([
    'resize_keyboard'=>true,
    'keyboard'=>[ 
    [['text'=>"⚙️ USSD помощник"]],
    [['text'=>"💎 Обязательный раздел"]],
    [['text'=>"➕Дополнительный раздел"]],
    [['text'=>"🔙Назад"]],
    ]
    ]);
$tariflarru = json_encode([
    'resize_keyboard'=>true,
    'keyboard'=>[ 
     [['text'=>"📘 Просто 10"],['text'=>"📔  Street"],['text'=>"📗  Onlime 🆕"]],
     [['text'=>"📕  Flash"],['text'=>"📓Роял"],['text'=>"📙 Деловой"]],
     [['text'=>"📒  Street upgrade"],['text'=>"📖  Flash upgrade"]],
     [['text'=>"📚 Тарифные коды✨"],['text'=>"🔙Назад"]],
     ]
     ]);
$xizmatlarru = json_encode([
    'resize_keyboard'=>true,
    'keyboard'=>[ 
     [['text'=>"🔰Выручай (mb)"],['text'=>"♻️ Выгодный обмен"]],
     [['text'=>"🔗 Рестарт"],['text'=>"♾Голос безлимит"],['text'=>"💲Быстрый перевод"]],
     [['text'=>"👁‍🗨 Скрытый звонок"],['text'=>"☑️ Пропущенный звонок"]],
     [['text'=>"👪 Для Семьи"],['text'=>"🌑 Ночной звонок"],['text'=>"💳 Услуги GSM"]],
     [['text'=>"📞 Любимые номера"],['text'=>"🔙Назад"]],
     ]
     ]);
     
$daqiqatuplamru = json_encode([
    'resize_keyboard'=>true,
    'keyboard'=>[      
    [['text'=>"📞 Набор минут по узбекистану 🌍"]],
    [['text'=>"Для абонентов Constructor TR"]],
    [['text'=>"🔙 Назад"]],
    ]
    ]);     
     
$uzbdaqiqaru = json_encode([
    'resize_keyboard'=>true,
    'keyboard'=>[      
    [['text'=>"⏳ 100 Минут"],['text'=>"⏳ 300 Минут"]],
    [['text'=>"⏳ 600 Минут"],['text'=>"⏳ 1200 Минут"]],
    [['text'=>"🔙  Назад"]],
    ]
    ]);  
$condaqiqaru = json_encode([
    'resize_keyboard'=>true,
    'keyboard'=>[ 
    [['text'=>"🕜 50 Минут"],['text'=>"🕜 100 Минут"]], 
    [['text'=>"🕜 300 Минут"],['text'=>"🕜 500 Минут"]], 
    [['text'=>"🕜 900 Минут"],['text'=>"🕜 1500 Минут"]], 
    [['text'=>"🕜 2000 Минут"],['text'=>"🔙  Назад"]],
    ]
    ]);
$raqamtanlashru = json_encode([
    'resize_keyboard'=>true,
    'keyboard'=>[  
     [['text'=>"💳 Просмотр номеров"]],
     [['text'=>"💳 Доставка номера 🚙"]],
     [['text'=>"💳 Познакомьтесь с ценой номеров 💵"]],
     [['text'=>"🔙Назад"]],
     ]
     ]);  
$smstuplamru = json_encode([
    'resize_keyboard'=>true,
    'keyboard'=>[ 
    [['text'=>"🗑Отключение 📩 SMS порталов"]], 
    [['text'=>"📨 Ежемесячные SMS-пакеты"],['text'=>"📩 Ежедневные SMS-пакеты"]], 
    [['text'=>"📦 Международные SMS-пакеты"],['text'=>"🔙Назад"]],
    ]
    ]);    
$smsuchirishru = json_encode([
    'resize_keyboard'=>true,
    'keyboard'=>[      
    [['text'=>"4250."],['text'=>"1254."]],
    [['text'=>"6431 и 7979"],['text'=>"0789 и 8789"]],    
    [['text'=>"Курс валюта 💵"],['text'=>"Астрологические предсказания"]],
    [['text'=>"Погода 🏞"],['text'=>"Статусы"],['text'=>"Интересные факты 💭"]],
    [['text'=>"Портал Zamin mobile"],['text'=>"🔙 Назад "]],    
    ]
    ]);
$oyliksmsru = json_encode([
    'resize_keyboard'=>true,
    'keyboard'=>[      
    [['text'=>"📨 10 Смс"],['text'=>"📨 50 Смс"]],
    [['text'=>"📨 200 Смс"],['text'=>"📨 500 Смс"]],    
    [['text'=>"🔙 Назад "]],    
    ]
    ]);
$kunliksmsru = json_encode([
    'resize_keyboard'=>true,
    'keyboard'=>[      
    [['text'=>"📩 50 Смс"],['text'=>"📩 100 Смс"]],
    [['text'=>"🔙 Назад "]],    
    ]
    ]);
$xalqarosmsru = json_encode([
    'resize_keyboard'=>true,
    'keyboard'=>[      
    [['text'=>"📦 10 Смс"],['text'=>"📦 20 Смс"]],
    [['text'=>"📦 30 Смс"],['text'=>"📦 40 Смс"]],    
    [['text'=>"📦 50 Смс"],['text'=>"🔙 Назад "]],    
    ]
    ]);
  
  
  ///////////  ///////////  ///////////  ///////////  ///////////
 
 
 if($tx=="/start"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"Tilni tanlang :
Выберите язык :",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$language,
     ]);
     }
 
 
if($tx=="🇺🇿 O’zbek tili" or $tx=="🔙Orqaga"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"Uzmobile 🦋 maftunkor hayot siz bilan",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$menu,
     ]);
     }
if($tx=="🛸 Internet paketlar ✨" or $tx=="🔙 Orqaga"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"Tanlang:",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$internet,
     ]);
     }
     
if($tx=="🛸 Oylik internet paketlar"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"Tanlang:",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$oylikpaket,
     ]);
     }   
    
if($tx=="Rasm holati"){
	bot('sendphoto',[
	'chat_id'=>$cid,
	'photo'=>"https://t.me/superapilar/",
	'caption'=>"startx",
	 'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$oylikpaket,
     ]);
     }       
if($tx=="✅ 500 MB"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"✨ 500 MB
💳 To'plam narxi: 10000 so'm
⏳  Amal qilish muddati: 30 kun
📲 Faollashtirish: *147*10072*22343#

Haridingiz uchun raxmat 😊
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$oylikpaket,
     ]);
     }       
if($tx=="✅ 1500 MB"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"✨ 1500 MB
💳 To'plam narxi: 15000 so'm
⏳ Amal qilish muddati: 30 kun
📲 Faollashtirish: *147*10073*22343#

Haridingiz uchun raxmat 😊
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$oylikpaket,
     ]);
     }       
if($tx=="✅ 3000 MB"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"✨ 3000 MB
💳 To'plam narxi: 24000 so'm
⏳ Amal qilish muddati: 30 kun
📲 Faollashtirish: *147*10074*22343#

Haridingiz uchun raxmat 😊
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$oylikpaket,
     ]);
     }
if($tx=="✅ 5000 MB"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"✨ 8000 MB
💳 To'plam narxi: 41000 so'm
⏳ Amal qilish muddati: 30 kun
📲 Faollashtirish: *147*10076*22343#

Haridingiz uchun raxmat 😊
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$oylikpaket,
     ]);
     }       
if($tx=="✅ 8000 MB"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"✨ 8000 MB
💳 To'plam narxi: 41000 so'm
⏳ Amal qilish muddati: 30 kun
📲 Faollashtirish: *147*10076*22343#

Haridingiz uchun raxmat 😊
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$oylikpaket,
     ]);
     }       
if($tx=="✅ 12000 MB"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"✨ 12000 MB
💳 To'plam narxi: 50000 so'm
⏳ Amal qilish muddati: 30 kun
📲 Faollashtirish: *147*10077*22343#

Haridingiz uchun raxmat 😊
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$oylikpaket,
     ]);
     }       
if($tx=="✅ 20000 MB"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"✨ 20000 MB
💳 To'plam narxi: 65000 so'm
⏳ Amal qilish muddati: 30 kun
📲 Faollashtirish: *147*10078*22343#

Haridingiz uchun raxmat 😊
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$oylikpaket,
     ]);
     }           
if($tx=="✅ 30000 MB"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"✨ 30000 MB
💳 To'plam narxi: 75000 so'm
⏳ Amal qilish muddati: 30 kun
📲 Faollashtirish: *147*10079*22343#

Haridingiz uchun raxmat 😊
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$oylikpaket,
     ]);
     }           
if($tx=="✅ 50000 MB"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"✨ 50000 MB
💳 To'plam narxi: 85000 so'm
⏳ Amal qilish muddati: 30 kun
📲 Faollashtirish: *147*10080*22343#

Haridingiz uchun raxmat 😊
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$oylikpaket,
     ]);
     }           
if($tx=="✅ 75000 MB"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"✨ 75000 MB
💳 To'plam narxi: 110000 so'm
⏳ Amal qilish muddati: 30 kun
📲 Faollashtirish: *147*10150*22343#

Haridingiz uchun raxmat 😊
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$oylikpaket,
     ]);
     }        
   
     
if($tx=="💫 Internet non-stop"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"Tanlang:",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$nonstop,
     ]);
     }   
    
if($tx=="✳️ 3000 MB"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"✨ 3000 MB non-stop
💳 To'plam narxi: 24000 so'm ikkinchi va keyingi oylardagi narxi 21600 so'm 
⏳ Amal qilish muddati: 30 kun
📲 Faollashtirish: *147*10055*22343#

Haridingiz uchun raxmat 😊
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$nonstop,
     ]);
     }       
if($tx=="✳️ 5000 MB"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"✨ 5000 MB non-stop
💳 To'plam narxi: 32000 so'm ikkinchi va keyingi oylardagi narxi 28800 so'm 
⏳ Amal qilish muddati: 30 kun
📲 Faollashtirish: *147*10056*22343#

Haridingiz uchun raxmat 😊
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$nonstop,
     ]);
     }       
if($tx=="✳️ 8000 MB"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"✨ 8000 MB non-stop
💳 To'plam narxi: 41000 so'm ikkinchi va keyingi oylardagi narxi 36900 so'm 
⏳ Amal qilish muddati: 30 kun
📲 Faollashtirish: *147*10057*22343#

Haridingiz uchun raxmat 😊
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$nonstop,
     ]);
     }       
if($tx=="✳️ 12000 MB"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"✨ 12000 MB non-stop
💳 To'plam narxi: 50000 so'm ikkinchi va keyingi oylardagi narxi 45000 so'm 
⏳ Amal qilish muddati: 30 kun
📲 Faollashtirish: *147*10151*22343#

Haridingiz uchun raxmat 😊
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$nonstop,
     ]);
     }       
if($tx=="✳️ 20000 MB"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"✨ 20000 MB non-stop
💳 To'plam narxi: 65000 so'm ikkinchi va keyingi oylardagi narxi 58500 so'm 
⏳ Amal qilish muddati: 30 kun
📲 Faollashtirish: *147*10152*22343#

Haridingiz uchun raxmat 😊
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$nonstop,
     ]);
     }           
if($tx=="✳️ 30000 MB"){
 	bot('sendmessage',['chat_id'=>$cid,
     'text'=>"<a href=google.com>dial/</a>",
     'urlencode'=>'true',
     'parse_mode'=>'HTML',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$nonstop,
     ]);
     }           
if($tx=="✳️ 50000 MB"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"✨ 5000 MB non-stop
💳 To'plam narxi: 32000 so'm ikkinchi va keyingi oylardagi narxi 28800 so'm 
⏳ Amal qilish muddati: 30 kun
📲 Faollashtirish: *147*10056*22343#

Haridingiz uchun raxmat 😊
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$nonstop,
     ]);
     }           
    
if($tx=="📆 Kunlik paketlar"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"Tanlang:",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$kunlikpaketlar,
     ]);
     } 

if($tx=="✅ 100 MB"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"✨ 100 MB
💳 To'plam narxi: 3000 so'm
⏳ Amal qilish muddati: 1 kun
📲 Faollashtirish: *147*10043*22343#

Haridingiz uchun raxmat 😊
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$kunlikpaketlar,
     ]);
     }       
if($tx=="✅ 300 MB"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"✨ 300 MB
💳 To'plam narxi: 6000 so'm
⏳ Amal qilish muddati: 1 kun
📲 Faollashtirish: *147*10050*22343#

Haridingiz uchun raxmat 😊
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$kunlikpaketlar,
     ]);
     }       
if($tx=="✅ 600 MB"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"✨ 600 MB
💳 To'plam narxi: 9000 so'm
⏳ Amal qilish muddati: 1 kun
📲 Faollashtirish: *147*10051*22343#

Haridingiz uchun raxmat 😊
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$kunlikpaketlar,
     ]);
     }       
  
if($tx=="🌚 Tungi internet"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"Tanlang:",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$tungiinternet,
     ]);
     }   
     
if($tx=="🌙 1 tun"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"✨ 1 TUN
💳 To'plam narxi: 6300 so'm
⏳ Amal qilish muddati: 1 tun (01:00 - 07:59)
📲 Faollashtirish: *111*2*18*1#

Haridingiz uchun raxmat 😊
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$tungiinternet,
     ]);
     }       
if($tx=="🌙 7 tun"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"✨ 7 TUN
💳 To'plam narxi: 31500 so'm
⏳ Amal qilish muddati: 7 tun (01:00 - 07:59)
📲 Faollashtirish: *111*2*18*3#

Haridingiz uchun raxmat 😊
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$tungiinternet,
     ]);
     }       
if($tx=="🌙 30 tun"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"✨ 30 TUN
💳 To'plam narxi: 99000 so'm
⏳ Amal qilish muddati: 30 tun (01:00 - 07:59)
📲 Faollashtirish: *111*2*18*2#

Haridingiz uchun raxmat 😊
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$tungiinternet,
     ]);
     }      
     
if($tx=="⚡TAS-IX paketlar (.uz)"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"Tanlang:",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$tasix,
     ]);
     }   
     
if($tx=="✅ 2 GB"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"✨ TAS-IX 2 GB
💳 To'plam narxi: 15000 so'm
⏳ Amal qilish muddati: 90 kun
📲 Faollashtirish: *147*10068*22343#

Haridingiz uchun raxmat 😊
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$tasix,
     ]);
     }       
     
if($tx=="✅ 10 GB"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"✨ TAS-IX 10 GB
💳 To'plam narxi: 40000 so'm
⏳ Amal qilish muddati: 90 kun
📲 Faollashtirish: *147*10069*22343#

Haridingiz uchun raxmat 😊
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$tasix,
     ]);
     }       
if($tx=="✅ 15 GB"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"✨ TAS-IX 15 GB
💳 To'plam narxi: 50000 so'm
⏳ Amal qilish muddati: 90 kun
📲 Faollashtirish: *147*10070*22343#

Haridingiz uchun raxmat 😊
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$tasix,
     ]);
     }      
     
if($tx=="💥 Constructor TR uchun!"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"Tanlang:",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$constructor,
     ]);
     }   
     
if($tx=="🔵 100 MB"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"🔵 100 MB
💳 To'plam narxi: 6310 so'm 
⏳ Amal qilish muddati: 30 kun
📲 Faollashtirish: *147*10129*22343#

Haridingiz uchun raxmat 😊
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$tasix,
     ]);
     }       
     
if($tx=="🔵 500 MB"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"🔵 500 MB
💳 To'plam narxi: 20050 so'm 
⏳ Amal qilish muddati: 30 kun
📲 Faollashtirish: *147*10133*22343#

Haridingiz uchun raxmat 😊
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$tasix,
     ]);
     }       
if($tx=="🔵 1000 MB"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"✨ 1000 MB
💳 To'plam narxi: 27360 so'm 
⏳ Amal qilish muddati: 30 kun
📲 Faollashtirish: *147*10132*22343#

Haridingiz uchun raxmat 😊
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$tasix,
     ]);
     }      
     if($tx=="🔵 2000 MB"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"🔹 2000 MB
💳 To'plam narxi: 46310 so'm 
⏱ Amal qilish muddati: 30 kun
📲 Faollashtirish: *147*10131*22343#

Haridingiz uchun raxmat 😊
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$tasix,
     ]);
     }      
     if($tx=="🔵 4000 MB"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"✨ 4000 MB
💳 To'plam narxi: 71570 so'm 
⏳ Amal qilish muddati: 30 kun
📲 Faollashtirish: *147*10130*22343#

Haridingiz uchun raxmat 😊
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$tasix,
     ]);
     }      
     
     
if($tx=="📈 Trafikni sarflash ➿ ketma-ketligi"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"🔹 Bonus trafigi (agar mavjud bo‘lsa);

🔹 Kunlik Internet-to’plamlar guruhi;

🔹 Tas-IX uchun Internet-paketlar guruhi;

🔹 Tarif reja doirasidagi bo'sh resurslar (limitlar); 

🔹 «Internet non-stop» xizmati doirasidagi internet paket trafigi;

🔹 Boshqa internet paketlar.",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$internetpaket,
     ]);
     }   
     
if($tx=="✳️ USSD kodlar ✨"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"Tanlang:",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$ussdmenyu,
     ]);
     } 
     
    
if($tx=="⚙️ USSD yordamchi"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"🔰 Limit qoldig’i, balans va tarifni tekshirish
*107#

🧮 Hisobni boshqarish
*100#

📰 Qolgan vaqt, Internet va SMS limiti haqida ma’lumot
*100*2#

🗂 Shahsiy kabinet parolini olish uchun
*100*3#

📞 O‘z telefon raqamini bilish
*100*4#

☎️ «Mening raqamlarim» – Abonent nomidagi raqamlar ro’yxati
*100*5#
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$ussdmenyu,
     ]);
     }    
if($tx=="💎 Kerakli boʻlim"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"♻️ Foydali alishuv
*545#
Xizmat pullik

🔂 Restart xizmati
*555#

🔋 Tezkor pul o’tkazma
*124*pul*991234567#
Pulni qisqacha yozing
(5000=5)

➿ Yaqinlaringizga Mb ulashing
*122*991234567*mb#
(100; 200; 500 mb)
Xizmat narxi 500 so’m
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$ussdmenyu,
     ]);
     }    
if($tx=="➕ Qoʻshimcha boʻlim"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"💹 LTE (4G) xizmatini yoqish
*111*2*7*1#

♾ Kutib turishni faollashtirish
*43#

🔄 Pereadresatsya
**21*+998.......#
o'chirish
##002#
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$ussdmenyu,
     ]);
     }      
    
    
if($tx=="📚 Tarif rejalari ✨"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"Tanlang:",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$tariflar,
     ]);
     }  
     
     
     if($tx=="📘 Oddiy 10"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"📘 Oddiy 10 
💳 Abonent to’lovi -10.000 so’m oyiga

📋 Kiritilgan limitlar
10 Mb 🌐
10 SMS 📨
10 Daqiqa 📞

Limitdan tashqari 
Barchasi 10 so’m 💰

Tarifga o’tish narxi 10.000 so’m
📞 *111*1*11*12#
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$tariflar,
     ]);
     }       
     
if($tx=="📒 Street"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"📗 Street
💳 Abonent to’lovi -39.900 so’m oyiga

📋 Kiritilgan limitlar
6500 Mb 🌐
750 SMS 📨
750 Daqiqa O’zb 📞
1500 Daqiqa Tarmoq 📞

Limitdan tashqari 
Mb 160 so’m 💰
Daqiqa 126 so’m 💰
Sms 84 so’m 💰

Tarifga o’tish
📞 *111*1*11*1#
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$tariflar,
     ]);
     }       
if($tx=="📗 Onlime🆕"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"📗 Onlime 🆕
💳 Abonent to’lovi -49.900 so’m oyiga

📋 Kiritilgan limitlar
10000 Mb 🌐
1000 SMS 📨
1000 Daqiqa O’zb 📞
2000 Daqiqa Tarmoq 📞

Limitdan tashqari 
Mb 280 so’m 💰
Daqiqa 84 so’m 💰
Sms 84 so’m 💰

Tarifga o’tish
📞 *111*1*11*6#
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$tariflar,
     ]);
     }      
     if($tx=="📕 Flash"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"📕 Flash
💳 Abonent to’lovi -69.900 so’m oyiga

📋 Kiritilgan limitlar
16000 Mb 🌐
1500 SMS 📨
1500 Daqiqa O’zb 📞
2000  Daqiqa Tarmoq 📞

Limitdan tashqari 
Mb 160 so’m 💰
Daqiqa 84 so’m 💰
Sms 84 so’m 💰

Tarifga o’tish
📞 *111*1*11*2#
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$tariflar,
     ]);
     }      
     if($tx=="📓 Royal"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"Royal
💳 Abonent to’lovi -149.900 so’m oyiga

📋 Kiritilgan limitlar
Cheksiz Mb 🌐
5000 SMS 📨
Cheksiz Daqiqa O’zb 📞
Cheksiz  Daqiqa Tarmoq 📞

Limitdan tashqari 
Cheksiz 🌐📞
80 so’m sms 📨

Tarifga o’tish
📞 *111*1*11*3#
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$tariflar,
     ]);
     }      
     if($tx=="📙 Ishbilarmon"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"📙 Ishbilarmon
💳 Abonent to’lovi -99.000 so’m oyiga

📋 Kiritilgan limitlar
25000 Mb 🌐
3000 SMS 📨
Cheksiz Daqiqa O’zb 📞
Cheksiz  Daqiqa Tarmoq 📞

Limitdan tashqari 
Cheksiz

Tarifga o’tish
📞 *111*1*11*10#
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$tariflar,
     ]);
     }       
     
if($tx=="📔 Street upgrade"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"📒 Street upgrade

💳 3 oylik abonent to’lovi -119.700 so’m 3 oyga

📋 3 oylik kiritilgan limitlar
26000 Mb 🌐
3000 SMS 📨
3000 Daqiqa O’zb 📞
6000  Daqiqa Tarmoq 📞


Limitdan tashqari 
160 so’m 🌐
84 som 📨
126 so’m daqiqa 📞

Tarifga o’tish
📞 *111*1*11*4#
O’tish narxi 4200 so’m
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$tariflar,
     ]);
     }       
if($tx=="📖 Flash upgrade"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"📖 Flash upgrade

💳 3 oylik abonent to’lovi -209.700 so’m 3 oyga

📋 3 oylik kiritilgan limitlar
64000 Mb 🌐
6000 SMS 📨
6000 Daqiqa O’zb 📞
8000  Daqiqa Tarmoq 📞


Limitdan tashqari 
160 so’m 🌐
84 som 📨
84 so’m daqiqa 📞

Tarifga o’tish
📞 *111*1*11*5#
O’tish narxi 4200 so’m
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$tariflar,
     ]);
     }      
     if($tx=="📚 Tarif kodlari ✨"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"📚Tarif kodlari ✨

Tarif rejasini o'zgartirish

🔸«Street» tarif rejasiga o‘tish
*111*1*11*1*1#

🔸«Street Upgrade» tarif rejasiga o‘tish
*111*1*11*4*1#
 
🔸«Flash» tarif rejasiga o‘tish
*111*1*11*2*1#

🔸«Flash Upgrade» tarif rejasiga o‘tish
*111*1*11*5*1#

🔸«Onlime» tarif rejasiga o‘tish
*111*1*11*6*1#

🔸«Royal» tarif rejasiga o‘tish
*111*1*11*3*1#

🔸«Ishbilarmon» tarif rejasiga o‘tish
*111*1*2*3*11*10#

🔸«Oddiy 10» tarif rejasiga o‘tish
*111*1*11*12#
  
⚡️Tarif rejasini almashtirish narxi  - 4 200 so‘m.
 🔶 «Ishbilarmon» tarif rejasidan «Street», «Flash» va «Royal» tarif rejalariga o'tish narxi - 10 000 so'm.
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$tariflar,
     ]);
     }      
     
if($tx=="🗃️ Xizmatlar ✨"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"Tanlang:",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$xizmatlar,
     ]);
     }   
    
     
     if($tx=="🔰 Qoʻllab yubor (mb)"){
 	bot('sendphoto',[
     'chat_id'=>$cid,
     'photo'=>"https://t.me/superapilar/12",
     'caption'=>"starttx",
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$xizmatlar,
     ]);
     }       
     
if($tx=="♻️ Foydali alishuv"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'photo'=>"https://t.me/superapilar/13",
     'caption'=>"starttx",
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$xizmatlar,
     ]);
     }       
if($tx=="📎 Restart"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'photo'=>"https://t.me/superapilar/14",
     'caption'=>"starttx",
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$xizmatlar,
     ]);
     }      
     if($tx=="🖇️ Limitsiz ovoz"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'photo'=>"https://t.me/superapilar/16",
     'caption'=>"starttx",
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$xizmatlar,
     ]);
     }      
     if($tx=="💲Tezkor oʻtkazma"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'photo'=>"https://t.me/superapilar/15",
     'caption'=>"starttx",
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$xizmatlar,
     ]);
     }      
     if($tx=="🗨️ Yashirin qoʻngʻiroq"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'photo'=>"https://t.me/superapilar/26",
     'caption'=>"starttx",
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$xizmatlar,
     ]);
     }       
     
if($tx=="☑️ Xabardor boʻling"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'photo'=>"https://t.me/superapilar/17",
     'caption'=>"starttx",
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$xizmatlar,
     ]);
     }       
if($tx=="👪 Oila uchun"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'photo'=>"https://t.me/superapilar/19",
     'caption'=>"starttx",
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$xizmatlar,
     ]);
     }      
     if($tx=="⚫ Tungi qoʻngʻiroq"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'photo'=>"https://t.me/superapilar/20",
     'caption'=>"starttx",
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$xizmatlar,
     ]);
     }      
if($tx=="💳 GSM xizmatlari"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'photo'=>"https://t.me/superapilar/21",
     'caption'=>"starttx",
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$xizmatlar,
     ]);
     }      
     
     if($tx=="📞 Sevimli raqam"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'photo'=>"https://t.me/superapilar/22",
     'caption'=>"starttx",
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$xizmatlar,
     ]);
     }          
     
if($tx=="⏳ Daqiqa toʻplami ✨"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"Tanlang:",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$daqiqatuplam,
     ]);
     }  
     
if($tx=="📞 Uzb boʻylab daqiqalar toʻplami 🌏"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"Tanlang:",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$uzbdaqiqa,
     ]);
     }  

if($tx=="⏳ 100 daqiqa"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"⏳ 100 daqiqa
💳 Narxi: 4000 so'm
⏱ Amal qilish muddati: 30 kun
📲 Faollashtirish: *111*2*3*1#

Haridingiz uchun raxmat 😊
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$uzbdaqiqa,
     ]);
     }    
if($tx=="⏳ 300 daqiqa"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"⏳ 300 daqiqa
💳 Narxi: 10000 so'm
⏱ Amal qilish muddati: 30 kun
📲 Faollashtirish: *111*2*3*2#

Haridingiz uchun raxmat 😊
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$uzbdaqiqa,
     ]);
     }    
if($tx=="⏳ 600 daqiqa"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"⏳ 600 daqiqa
💳 Narxi: 16000 so'm
⏱ Amal qilish muddati: 30 kun
📲 Faollashtirish: *111*2*3*3#

Haridingiz uchun raxmat 😊
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$uzbdaqiqa,
     ]);
     }    
if($tx=="⏳ 1200 daqiqa"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"⏳ 1200 daqiqa
💳 Narxi: 24000 so'm
⏱ Amal qilish muddati: 30 kun
📲 Faollashtirish: *111*2*3*4#

Haridingiz uchun raxmat 😊
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$uzbdaqiqa,
     ]);
     }        
if($tx=="Constructor TR abonentlar uchun"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"Tanlang:",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$condaqiqa,
     ]);
     }        

if($tx=="🕝 50 daqiqa"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"🕰 50 daqiqa
💳 Narxi: 3360 so'm
⏱ Amal qilish muddati: 30 kun
📲 Faollashtirish: *9999*1*3*1#

Haridingiz uchun raxmat 😊
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$condaqiqa,
     ]);
     }       
if($tx=="🕝 100 daqiqa"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"🕰 100 daqiqa
💳 Narxi: 5260 so'm
⏱ Amal qilish muddati: 30 kun
📲 Faollashtirish: *9999*1*3*2#

Haridingiz uchun raxmat 😊
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$condaqiqa,
     ]);
     }       
if($tx=="🕝 300 daqiqa"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"🕰 300 daqiqa
💳 Narxi: 16840 so'm
⏱ Amal qilish muddati: 30 kun
📲 Faollashtirish: *9999*1*3*3#

Haridingiz uchun raxmat 😊
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$condaqiqa,
     ]);
     }       
if($tx=="🕝 500 daqiqa"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"🕰 500 daqiqa
💳 Narxi: 23150 so'm
⏱ Amal qilish muddati: 30 kun
📲 Faollashtirish: *9999*1*3*4#

Haridingiz uchun raxmat 😊
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$condaqiqa,
     ]);
     }       
if($tx=="🕝 900 daqiqa"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"🕰 900 daqiqa
💳 Narxi: 37890 so'm
⏱ Amal qilish muddati: 30 kun
📲 Faollashtirish: *9999*1*3*5#

Haridingiz uchun raxmat 😊
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$condaqiqa,
     ]);
     }           
if($tx=="🕝 1500 daqiqa"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"🕰 1500 daqiqa
💳 Narxi: 58940 so'm
⏱ Amal qilish muddati: 30 kun
📲 Faollashtirish: *9999*1*3*6#

Haridingiz uchun raxmat 😊
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$condaqiqa,
     ]);
     }           
if($tx=="🕝 2000 daqiqa"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"🕰 2000 daqiqa
💳 Narxi: 67360 so'm
⏱ Amal qilish muddati: 30 kun
📲 Faollashtirish: *9999*1*3*7#

Haridingiz uchun raxmat 😊
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$condaqiqa,
     ]);
     }           
    

if($tx=="📩 SMSlar toʻplami ✨" or $tx=="🔙  Orqaga"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"Tanlang:",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$smstuplam,
     ]);
     }    
         
if($tx=="📩 SMS portallarni oʻchirish"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"Tanlang:",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$smsuchirish,
     ]);
     } 
     
if($tx=="4250"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"4250 raqamidan keladigan 
SMS ni o'chirish 🗑

4252 raqamiga 
STOP1 
So'zini sms tarzida jonating

Murojaat uchun : 📞 782002222 
Dushanbadan - Jumagacha
(09:00 – 18:00)
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$smsuchirish,
     ]);
     } 
if($tx=="1254"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"1254  raqamidan keladigan 
SMS ni o'chirish 🗑

1424  raqamiga 
1  
So'zini sms tarzida jonating

Murojaat uchun : 📞 781400501 
Dushanbadan - Jumagacha
(09:00 – 18:00)
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$smsuchirish,
     ]);
     }   
if($tx=="6431 yoki 7979"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"6431 yoki 7979 raqamidan keladigan 
SMS ni o'chirish 🗑

7878   raqamiga 
1  
So'zini sms tarzida jonating

Murojaat uchun : 📞 781500060  
Dushanbadan - Jumagacha
(09:00 – 18:00)
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$smsuchirish,
     ]);
     } 
if($tx=="0789 yoki 8789"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"0789 yoki 8789 raqamidan keladigan 
SMS ni o'chirish 🗑

0789 raqamiga 
STOP 
So'zini sms tarzida jonating

Murojaat uchun : 📞 981211228   
Dushanbadan - Jumagacha
(09:00 – 18:00)
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$smsuchirish,
     ]);
     }   
if($tx=="Munajjimlar bashorati"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"Munajjimlar bashorati 
7777  raqamidan keladigan 
SMS ni o'chirish 🗑

2 ta sms orqali o`chiriladi !
1) 7777  raqamiga 
p stop 
So'zini sms tarzida jonating
2)  7777  raqamiga 
p confirm    
So'zini sms tarzida jonating
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$smsuchirish,
     ]);
     } 
if($tx=="Ob-xavo 🏝️"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"Ob-xavo🏞
7777  raqamidan keladigan 
SMS ni o'chirish 🗑

2 ta sms orqali o`chiriladi !
1) 7777  raqamiga 
w stop 
So'zini sms tarzida jonating
2)  7777  raqamiga 
confirm   
So'zini sms tarzida jonating
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$smsuchirish,
     ]);
     }   
if($tx=="Statuslar"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"7777  raqamidan keladigan 
SMS ni o'chirish 🗑

2 ta sms orqali o`chiriladi !
1) 7777  raqamiga 
q stop 
So'zini sms tarzida jonating
2)  7777  raqamiga 
q confirm    
So'zini sms tarzida jonating
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$smsuchirish,
     ]);
     } 
if($tx=="Qiziqarli faktlar 🗯️"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"Qiziqarli Faktlar
7777  raqamidan keladigan 
SMS ni o'chirish 🗑

2 ta sms orqali o`chiriladi !
1) 7777  raqamiga 
f stop 
So'zini sms tarzida jonating
2)  7777  raqamiga 
f confirm    
So'zini sms tarzida jonating
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$smsuchirish,
     ]);
     }   
if($tx=="Portal Zamin mobile"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"Partal Zamin mobile 
O’chirish : 2222 qo'ng'iroq qilib 5..2 tugmasini bosasiz
Murojaat uchun : 📞 909152129    
Dushanbadan - Jumagacha
(09:00 – 18:00)
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$smsuchirish,
     ]);
     } 
if($tx=="Kurs valyuta 💵"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"Kurs valyuta 💵
7777  raqamidan keladigan 
SMS ni o'chirish 🗑

2 ta sms orqali o`chiriladi !
1) 7777  raqamiga 
e stop  
So'zini sms tarzida jonating
2)  7777  raqamiga 
confirm  
So'zini sms tarzida jonating
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$smsuchirish,
     ]);
     }        
  
if($tx=="📨 Oylik SMS paketlar"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"Tanlang:",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$oyliksms,
     ]);
     } 
     
if($tx=="📨 10 SMS"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"📨 10 SMS
💳 Narxi: 420 so'm
⌛️ Amal qiish muddati: 30 kun
📲 Faollashtirish: *111*2*1*1#


Haridingiz uchun raxmat 😊
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$oyliksms,
     ]);
     } 
if($tx=="📨 50 SMS"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"📨 50 SMS
💳 Narxi: 1680 so'm
⌛️ Amal qiish muddati: 30 kun
📲 Faollashtirish: *111*2*1*2#


Haridingiz uchun raxmat 😊
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$oyliksms,
     ]);
     } 
if($tx=="📨 200 SMS"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"📨 200 SMS
💳 Narxi: 5200 so'm
⌛️ Amal qiish muddati: 30 kun
📲 Faollashtirish: *111*2*1*3#


Haridingiz uchun raxmat 😊
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$oyliksms,
     ]);
     } 
if($tx=="📨 500 SMS"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"📨 500 SMS
💳 Narxi: 9500 so'm
⌛️ Amal qiish muddati: 30 kun
📲 Faollashtirish: *111*2*1*4#


Haridingiz uchun raxmat 😊
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$oyliksms,
     ]);
     }    
     
if($tx=="📩 Kunlik SMS paketlar"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"Tanlang:",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$kunliksms,
     ]);
     } 
     

if($tx=="📩 50 SMS"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"📩 50 SMS
💳 Kunlik abanent to'lovi: 420 so'm 
⌛️ Amal qiish muddati: 1 kun
📲 Faollashtirish: *111*2*19*1*2#
🗑 O'chirish: *111*1*19*1*2#


Haridingiz uchun raxmat 😊
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$kunliksms,
     ]);
     } 
if($tx=="📩 100 SMS"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"📩 100 SMS
💳 Kunlik abanent to'lovi: 840 so'm 
⌛️ Amal qiish muddati: 1 kun
📲 Faollashtirish: *111*2*19*2*2#
🗑 O'chirish: *111*1*19*1*2#


Haridingiz uchun raxmat 😊
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$kunliksms,
     ]);
     }      
    
if($tx=="📦 Xalqaro SMS paketlar"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"Tanlang:",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$xalqarosms,
     ]);
     }          
     

if($tx=="📦 10 SMS"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"📦 10 SMS
💳 Narxi: 5050 so'm
⏳ Amal qiish muddati: 30 kecha-kunduz
📲 Faollashtirish: *111*2*2*1#


Haridingiz uchun raxmat 😊
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$xalqarosms,
     ]);
     }          
if($tx=="📦 20 SMS"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"📦 20 SMS
💳 Narxi: 9260 so'm
⌛️ Amal qiish muddati: 30 kecha-kunduz
📲 Faollashtirish: *111*2*2*2#


Haridingiz uchun raxmat 😊
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$xalqarosms,
     ]);
     }          
if($tx=="📦 30 SMS"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"📦 30 SMS
💳 Narxi: 12630 so'm
⌛️ Amal qiish muddati: 30 kecha-kunduz
📲 Faollashtirish: *111*2*2*3#


Haridingiz uchun raxmat 😊
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$xalqarosms,
     ]);
     }          
if($tx=="📦 40 SMS"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"📦 40 SMS
💳 Narxi: 15150 so'm
⌛️ Amal qiish muddati: 30 kecha-kunduz
📲 Faollashtirish: *111*2*2*4#



Haridingiz uchun raxmat 😊
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$xalqarosms,
     ]);
     }          
if($tx=="📦 50 SMS"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"📦 50 SMS
💳 Narxi: 16840 so'm
⌛️ Amal qiish muddati: 30 kecha-kunduz
📲 Faollashtirish: *111*2*2*5#



Haridingiz uchun raxmat 😊
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$xalqarosms,
     ]);
     }          
                        
     
if($tx=="🔎 Raqam tanlash 🎰 xizmati ✨"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"Tez orada...",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$raqamtanlash,
     ]);
     } 
     
if($tx=="💳 Raqamlarni koʻrish"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"Tez orada...",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$raqamtanlash,
     ]);
     }   
if($tx=="💳 Raqamni yetkazib berish 🚗 xizmati"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"Tez orada...",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$raqamtanlash,
     ]);
     }   
if($tx=="💳 Raqamlar narxlari 💵 bilan tanishish"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"Tez orada...",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$raqamtanlash,
     ]);
     }      
     
if($tx=="👨🏻‍💻Biz haqimizda ma’lumot✨"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"Tez orada...",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$menu,
     ]);
     }   
if($tx=="⚠️ Ogoh boʻling 📝"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"O‘ZBEKISTON RESPUBLIKASINING QONUNI
MUALLIFLIK HUQUQI VA TURDOSH HUQUQLAR TO‘G‘RISIDA
Qonunchilik palatasi tomonidan
2006-yil 23-martda qabul qilingan

Senat tomonidan 2006-yil 9-iyunda ma’qullangan

5-bob. Mualliflik huquqi va turdosh huquqlarni himoya qilish

65-modda. Mualliflik huquqi va turdosh huquqlarni himoya qilish usullari

  Muallif, turdosh huquqlar egasi yoki mutlaq huquqlarning boshqa egasi huquqbuzardan quyidagilarni talab qilishga haqli:
huquqlarni tan olishini;
huquq buzilishidan oldingi holatni tiklashini va huquqni buzadigan yoki uning buzilishi xavfini yuzaga keltiradigan harakatlarni to‘xtatishini;
huquq egasining huquqi buzilmagan taqdirda, u fuqarolik muomalasining odatdagi sharoitlarida olishi mumkin bo‘lgan, lekin ololmay qolgan daromadi miqdoridagi zararlarning o‘rnini qoplashini. 
  Agar huquqbuzar mualliflik huquqi yoki turdosh huquqlarni buzish oqibatida daromadlar olgan bo‘lsa, huquq egalari boshqa zararlar bilan bir qatorda boy berilgan foydani bunday daromadlardan kam bo‘lmagan miqdorda qoplashini;
zararlar yetkazilishi faktidan qat’i nazar, huquqbuzarlikning xususiyati va huquqbuzarning aybi darajasidan kelib chiqib ish muomalasi odatlarini hisobga olgan holda zararning o‘rnini qoplash evaziga to‘lanishi lozim bo‘lgan tovonni to‘lashini;
ushbu Qonunda belgilangan huquqlarini himoya qilish bilan bog‘liq bo‘lgan, qonun hujjatlarida nazarda tutilgan boshqa choralar ko‘rishini.
  Muallif va ijrochi o‘z huquqlari buzilgan taqdirda, huquqbuzardan ma’naviy ziyon qoplanishini talab qilishga haqlidir.
Mulkiy huquqlarni jamoaviy asosda boshqaruvchi tashkilot mulkiy huquqlarini boshqarish shunday tashkilot tomonidan amalga oshirilayotgan shaxslarning buzilgan mualliflik huquqlari va turdosh huquqlarini himoya qilib qonunda belgilangan tartibda o‘z nomidan ariza bilan sudga murojaat etishga haqlidir.
  Mualliflik huquqi yoki turdosh huquqlar buzilishining oldini olish yoki uni to‘xtatish uchun zarur choralar ko‘rish natijasida uchinchi shaxslarga yetkazilgan zararlar, shuningdek bunday choralarni amalga oshirgan shaxs ko‘rgan zararlar huquqbuzar hisobidan undirib olinishi kerak.",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$menu,
     ]);
     bot('senddocument',[
     'chat_id'=>$cid,
     'document'=>"https://t.me/superapilar/23",
     'caption'=>"O'qib chiqing!",
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$menu,
     ]);
     }   

/////////////////////////////////////////////////////////////////////////////////

if($tx=="🇷🇺 Русский язык" or $tx=="🔙Назад"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"Uzmobile 🦋 очаровательная жизнь с вами",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$menuru,
     ]);
     }
if($tx=="🪐 Интернет-пакеты✨" or $tx=="🔙 Назад"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"Выберите:",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$internetru,
     ]);
     }
     
if($tx=="🪐 Ежемесячные интернет-пакеты"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"Выберите:",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$oylikpaketru,
     ]);
     }   
    
if($tx=="Rasm holati"){
	bot('sendphoto',[
	'chat_id'=>$cid,
	'photo'=>"https://t.me/superapilar/",
	'caption'=>"startx",
	 'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$oylikpaketru,
     ]);
     }       
if($tx=="✅  500 MB"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"✨ 500 MB
💳 Цена пакета: 10 000 сумов
⏳  Срок действия: 30 дней
📲 Активация: *147*10072*22343#

Спасибо за покупку 😊
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$oylikpaketru,
     ]);
     }       
if($tx=="✅  1500 MB"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"✨ 1500 MB
💳 Цена пакета: 15000 сумов
⏳  Срок действия: 30 дней
📲 Активация: *147*10073*22343#

Спасибо за покупку 😊
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$oylikpaketru,
     ]);
     }       
if($tx=="✅  3000 MB"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"✨ 3000 MB
💳 Цена пакета:  24000 сумов
⏳  Срок действия: 30 дней
📲 Активация:  *147*10074*22343#

Спасибо за покупку 😊 
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$oylikpaketru,
     ]);
     }       
if($tx=="✅  5000 MB"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"✨ 5000 MB
💳 Цена пакета: 32000 сумов
⏳  Срок действия: 30 дней
📲 Активация:  *147*10075*22343#

Спасибо за покупку 😊 
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$oylikpaketru,
     ]);
     }       
if($tx=="✅  8000 MB"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"✨ 8000 MB
💳 Цена пакета: 41000 сумов
⏳  Срок действия: 30 дней
📲 Активация: *147*10076*22343#

Спасибо за покупку 😊
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$oylikpaketru,
     ]);
     }       
if($tx=="✅  12000 MB"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"✨ 12000 MB
💳 Цена пакета: 50000 сумов
⏳  Срок действия: 30 дней
📲 Активация: *147*10077*22343#

Спасибо за покупку 😊
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$oylikpaketru,
     ]);
     }       
if($tx=="✅  20000 MB"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"✨ 5000 MB
💳 Цена пакета: 32000 сумов
⏳  Срок действия: 30 дней
📲 Активация:  *147*10075*22343#

Спасибо за покупку 😊 
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$oylikpaketru,
     ]);
     }           
if($tx=="✅  30000 MB"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"✨ 30000 MB
💳 Цена пакета: 75000 сумов
⏳  Срок действия: 30 дней
📲 Активация: *147*10079*22343#

Спасибо за покупку 😊
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$oylikpaketru,
     ]);
     }           
if($tx=="✅  50000 MB"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"✨ 50000 MB
💳 Цена пакета: 85000 so'm
⏳  Срок действия: 30 kun
📲 Активация: *147*10080*22343#

Спасибо за покупку 😊
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$oylikpaketru,
     ]);
     }           
if($tx=="✅  75000 MB"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"✨ 75000 MB
💳 Цена пакета: 110000 сумов
⏳  Срок действия: 30 дней
📲 Активация: *147*10150*22343#

Спасибо за покупку 😊
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$oylikpaketru,
     ]);
     }        
   
     
if($tx=="💫 Интернет нон-стоп"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"Выберите:",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$nonstopru,
     ]);
     }   
    
if($tx=="✳️  3000 MB"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"✨ 3000 MB non-stop
💳 Цена пакета: 24 000 сумов, цена за второй и последующие месяцы составляет 21 600 сумов.
⏳  Срок действия: 30 kun
📲 Активация: *147*10055*22343#

Спасибо за покупку 😊
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$nonstopru,
     ]);
     }       
if($tx=="✳️  5000 MB"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"✨ 5000 MB non-stop
💳 Цена пакета: 32 000 сумов, цена за второй и последующие месяцы составляет 28 880 сумов.
⏳  Срок действия: 30 kun
📲 Активация: *147*10056*22343#

Спасибо за покупку 😊
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$nonstopru,
     ]);
     }       
if($tx=="✳️  8000 MB"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"✨ 8000 MB non-stop
💳 Цена пакета: 41 000 сумов, цена за второй и последующие месяцы составляет 36 900 сумов.
⏳  Срок действия: 30 kun
📲 Активация: *147*10057*22343#

Спасибо за покупку 😊
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$nonstopru,
     ]);
     }       
if($tx=="✳️  12000 MB"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"✨ 12000 MB non-stop
💳 Цена пакета: 50 000 сумов, цена за второй и последующие месяцы составляет 45 000 сумов.
⏳  Срок действия: 30 kun
📲 Активация: *147*10056*22343#

Спасибо за покупку 😊
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$nonstopru,
     ]);
     }       
if($tx=="✳️  20000 MB"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"✨ 20000 MB non-stop
💳 Цена пакета: 65 000 сумов, цена за второй и последующие месяцы составляет 58 500 сумов.
⏳  Срок действия: 30 kun
📲 Активация: *147*10052*22343#

Спасибо за покупку 😊
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$nonstopru,
     ]);
     }           
if($tx=="✳️  30000 MB"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"✨ 30000 MB non-stop
💳 Цена пакета: 75 000 сумов, цена за второй и последующие месяцы составляет 67 500 сумов.
⏳  Срок действия: 30 kun
📲 Активация: *147*10053*22343#

Спасибо за покупку 😊
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$nonstopru,
     ]);
     }           
if($tx=="✳️  50000 MB"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"✨ 50000 MB non-stop
💳 Цена пакета: 85 000 сумов, цена за второй и последующие месяцы составляет 76 500 сумов.
⏳  Срок действия: 30 дней
📲 Активация: *147*10054*22343#

Спасибо за покупку 😊
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$nonstopru,
     ]);
     }           
    
if($tx=="📆 Ежедневные пакеты"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"Выберите:",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$kunlikpaketlarru,
     ]);
     } 

if($tx=="✅  100 MB"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"✨ 100 MB
💳 Цена пакета: 3000 сумов
⏳  Срок действия: 1 дней
📲 Активация: *147*10043*22343#

Спасибо за покупку 😊
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$kunlikpaketlarru,
     ]);
     }       
if($tx=="✅  300 MB"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"✨ 300 MB
💳 Цена пакета: 6000 сумов
⏳  Срок действия: 1 дней
📲 Активация: *147*10050*22343#

Спасибо за покупку 😊
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$kunlikpaketlarru,
     ]);
     }       
if($tx=="✅  600 MB"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"✨ 600 MB
💳 Цена пакета: 9000 сумов
⏳  Срок действия: 1 дней
📲 Активация: *147*10051*22343#

Спасибо за покупку 😊
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$kunlikpaketlarru,
     ]);
     }       
  
if($tx=="🌚 Ночной интернет"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"Выберите:",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$tungiinternetru,
     ]);
     }   
     
if($tx=="🌙  1 Ночь"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"✨ 1 Ночь
💳 Стоимость пакета: 6300 сумов
⏳  Срок действия: 1 ночь (01:00 - 07:59)
📲 Активация: *111*2*18*1#
Спасибо за покупку 😊
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$tungiinternetru,
     ]);
     }       
if($tx=="🌙  7 Ночь"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"✨ 7 Ночь
💳 Стоимость пакета: 31500 сумов
⏳  Срок действия: 7 ночь (01:00 - 07:59)
📲 Активация: *111*2*18*3#
Спасибо за покупку 😊
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$tungiinternetru,
     ]);
     }       
if($tx=="🌙  30 Ночь"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"✨ 30 Ночь
💳 Стоимость пакета: 99000 сумов
⏳  Срок действия: 30 ночь (01:00 - 07:59)
📲 Активация: *111*2*18*2#
Спасибо за покупку 😊
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$tungiinternetru,
     ]);
     }      
     
if($tx=="⚡️ Пакеты TAS-IX (.uz)"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"Выберите:",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$tasixru,
     ]);
     }   
     
if($tx=="✅  2 GB"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"✨ TAS-IX 2 GB
💳 Стоимость пакета: 15000 сумов
⏳ Срок действия: 90 дней
📲 Активация: *147*10068*22343#

Спасибо за покупку 😊
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$tasixru,
     ]);
     }       
     
if($tx=="✅  10 GB"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"✨ TAS-IX 10 GB
💳 Стоимость пакета: 40000 сумов
⏳ Срок действия: 90 дней
📲 Активация: *147*10069*22343#

Спасибо за покупку 😊
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$tasixru,
     ]);
     }       
if($tx=="✅  15 GB"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"✨ TAS-IX 15 GB
💳 Стоимость пакета: 50000 сумов
⏳ Срок действия: 90 дней
📲 Активация: *147*10070*22343#

Спасибо за покупку 😊
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$tasixru,
     ]);
     }      
     
if($tx=="💥 Для Конструктор TR!"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"Выберите:",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$constructorru,
     ]);
     }   
     
if($tx=="🔵  100 MB"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"🔵 100 MB
💳 Цена пакета: 6310 сумов
⏳ Срок действия: 30 дней
📲 Активация: * 147*10129*22343#

Спасибо за покупку 😊
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$constructorru,
     ]);
     }       
     
if($tx=="🔵  500 MB"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"🔵 500 MB
💳 Цена пакета: 20050 сумов
⏳ Срок действия: 30 дней
📲 Активация: *147*10133*22343 #

Спасибо за покупку 😊
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$constructorru,
     ]);
     }       
if($tx=="🔵  1000 MB"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"🔵 1000 MB
💳 Цена пакета: 27360 сумов
⏳ Срок действия: 30 дней
📲 Активация: *147*10132*22343 #

Спасибо за покупку 😊
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$constructorru,
     ]);
     }      
     if($tx=="🔵  2000 MB"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"🔹 2000 MB
💳 Цена пакета: 46310 сумов 
⏱ Срок действия 30 дней
📲 Активация: *147*10131*22343#

Спасибо за покупку 😊
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$constructorru,
     ]);
     }      
     if($tx=="🔵  4000 MB"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"✨ 4000 MB
💳 To'plam narxi: 71570 so'm 
⏳ Amal qilish muddati: 30 kun
📲 Faollashtirish: *147*10130*22343#

Haridingiz uchun raxmat 😊
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$constructorru,
     ]);
     }      
     
     
if($tx=="📈 Расходы трафика ➿ Последовательность"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"Бонус трафика (если есть);

🔹 ежедневная группа интернет-пакетов;

Group Группа интернет-пакетов для Tas-IX;

🔹 Бесплатные ресурсы (лимиты) в рамках тарифного плана;

Package Интернет-пакет трафика в рамках услуги «Интернет без остановок»;

🔹 Другие интернет-пакеты.",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$internetpaketru,
     ]);
     }   
     
if($tx=="✳️ USSD коды✨"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"Выберите:",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$ussdmenyuru,
     ]);
     } 
     
    
if($tx=="⚙️ USSD помощник"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"🔰Проверить баланс,  и трафика
*107#

🧮 Управление аккаунтом
*100#

📰 Информация об оставшемся времени, интернет и лимит SMS
*100*2#

🗂 Получить пароль личного кабинета
*100*3#

📞 Знай свой номер телефона
*100*4#

☎️ «Мои номера» - список номеров на имя абонента
*100*5#
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$ussdmenyuru,
     ]);
     }    
if($tx=="💎 Обязательный раздел"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"♻️ Полезный обмен
*545#
Услуга платная

🔂 перезапустить сервис
*555#

🔋 Быстрый перевод денег
*124*pul*991234567#
Напишите деньги вкратце
(5000 = 5)

Mb Поделитесь Мб с вашими близкими
*122*991234567*мб#
(100; 200; 500 мб)
Стоимость услуги составляет 500 сумов.
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$ussdmenyuru,
     ]);
     }    
if($tx=="➕Дополнительный раздел"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"💹 Активация услуги LTE (4G)
*111*2*7*1#

♾ активировать режим ожидания
*43#

Read Переадресаться
**21*+998 ....... #
выключить
##002#
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$ussdmenyuru,
     ]);
     }      
    
    
if($tx=="📚 Тарифные планы✨"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"Выберите:",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$tariflarru,
     ]);
     }  
     
     
     if($tx=="📘 Просто 10"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"📘 Просто 10 
💳 Абонентская плата - 10 000 сумов в месяц

📋 Включенный лимит
10 Мб 🌐
10 SMS 📨
10 минут 📞

Вне предела
Всего за 10 сумм 💰

Стоимость перехода на тариф составляет 10 000 сумов.
📞 *111*1*11*12#
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$tariflarru,
     ]);
     }       
     
if($tx=="📔  Street"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"📗 Street
💳 Абонентская плата - 39 900 сумов в месяц

📋 Включенный лимит
6500 Мб 🌐
750 SMS 📨
750 минут по всему Узбекистану 📞
1500 минут Сеть 📞

Вне предела
Мб 160 сумов 💰
126 сумов в минуту 💰
SMS 84 сумма 💰

Переключиться на тариф
📞 *111*1*11*1#
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$tariflarru,
     ]);
     }       
if($tx=="📗  Onlime 🆕"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"📗 Onlime 🆕
💳 Абонентская плата - 49.900 сумов в месяц

📋 Включенный лимит
10000 Мб 🌐
1000 SMS 📨
1000 минут по всему Узбекистану 📞
2000 минут Сеть 📞

Вне предела
Мб 280 сумов 💰
84 сумов в минуту 💰
SMS 84 сумма 💰

Переключиться на тариф
📞 *111*1*11*6#
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$tariflarru,
     ]);
     }      
     if($tx=="📕  Flash"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"💳 Абонентская плата - 69 900 сумов в месяц

📋 Включенный лимит
16000 МБ 🌐
1500 SMS 📨
1500 минут по всему Узбекистану 📞
2000 минут сети 📞

Вне предела
Мб 160 сумов 💰
84 сумов в минуту
SMS 84 сумма 💰

Переключиться на тариф
📞 *111*1*11*2#
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$tariflarru,
     ]);
     }      
     if($tx=="📓Роял"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"📓 Royal
💳Абонентская плата - 149 900 сумов в месяц.

📋 Включенный лимит
Неограниченно Мб 🌐
5000 SMS 📨
Неограниченные по всему Узбекистану 📞
Сеть безлимитных минут 📞

Вне предела
Неограниченный 🌐📞
80 сум смс 📨

Переключиться на тариф
📞 *111*1*11*3#
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$tariflarru,
     ]);
     }      
     if($tx=="📙 Деловой"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"📙 Деловой
💳 Абонентская плата - 99 000 сумов в месяц.

📋 Включенный лимит
25000 МБ 🌐
3000 SMS 📨
Неограниченные по всему Узбекистану 📞
Сеть безлимитных минут 📞

Вне предела
бесконечный

Переключиться на тариф
📞 *111*1*11*10#
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$tariflarru,
     ]);
     }       
     
if($tx=="📒  Street upgrade"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"📒 Street upgrade

💳 3-месячная абонентская плата - 119 700 сумов за 3 месяца

📋 3-месячные лимиты
26000 МБ 🌐
3000 SMS 📨
3000 минут по всему Узбекистану 📞
6000 минут сети 📞


Вне предела
160 сумов 🌐
84 сома 📨
126 сумов в минуту 📞

Переключиться на тариф
📞 *111*1*11*4#
Стоимость подключения составляет 4200 сумов
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$tariflarru,
     ]);
     }       
if($tx=="📖  Flash upgrade"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"📖 Flash upgrade

💳 3-х месячная абонентская плата -209,7 тыс.сум за 3 месяца

📋 3-месячные лимиты
64000 МБ 🌐
6000 SMS 📨
6000 минут по всему Узбекистану 📞
8000 минут сети 📞


Вне предела
160 сумов 🌐
84 сома 📨
84 сумов в минуту 📞

Переключиться на тариф
📞 *111*1*11*5#
Стоимость подключения составляет 4200 сумов
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$tariflarru,
     ]);
     }      
     if($tx=="📚 Тарифные коды✨"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"📚 Тарифные коды✨

Смена тарифного плана

🔸 Переход на тарифный план Улица
* 111*1*11*1*1#

🔸 Переход на тарифный план «Улица обновления»
* 111*1*11*4*1#
 
🔸 перейти на тарифный план Flash
* 111*1 *11* 2*1#

🔸 перейти на тарифный план Flash Upgrade
* 111*1*1*5*1#

🔸 Переход на тарифный план «Роял»
*111*1*11*3*1#

🔸 Переход на тарифный план Бизнес
*111*1*2*3*11*10#

🔸 Переход на тарифный план «Просто 10»
*111*1*11*12#
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$tariflarru,
     ]);
     }      
     
if($tx=="🗃 Услуги✨"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"Выберите:",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$xizmatlarru,
     ]);
     }   
    
     
     if($tx=="🔰Выручай (mb)"){
 	bot('sendphoto',[
     'chat_id'=>$cid,
     'photo'=>"https://t.me/superapilar/12",
     'caption'=>"starttx",
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$xizmatlarru,
     ]);
     }       
     
if($tx=="♻️ Выгодный обмен"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'photo'=>"https://t.me/superapilar/13",
     'caption'=>"starttx",
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$xizmatlarru,
     ]);
     }       
if($tx=="🔗 Рестарт"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'photo'=>"https://t.me/superapilar/14",
     'caption'=>"starttx",
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$xizmatlarru,
     ]);
     }      
     if($tx=="♾Голос безлимит"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'photo'=>"https://t.me/superapilar/16",
     'caption'=>"starttx",
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$xizmatlarru,
     ]);
     }      
     if($tx=="💲Быстрый перевод"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'photo'=>"https://t.me/superapilar/15",
     'caption'=>"starttx",
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$xizmatlarru,
     ]);
     }      
     if($tx=="👁‍🗨 Скрытый звонок"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'photo'=>"https://t.me/superapilar/26",
     'caption'=>"starttx",
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$xizmatlarru,
     ]);
     }       
     
if($tx=="☑️ Пропущенный звонок"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'photo'=>"https://t.me/superapilar/17",
     'caption'=>"starttx",
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$xizmatlarru,
     ]);
     }       
if($tx=="👪 Для Семьи"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'photo'=>"https://t.me/superapilar/19",
     'caption'=>"starttx",
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$xizmatlarru,
     ]);
     }      
     if($tx=="🌑 Ночной звонок"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'photo'=>"https://t.me/superapilar/20",
     'caption'=>"starttx",
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$xizmatlarru,
     ]);
     }      
if($tx=="💳 Услуги GSM"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'photo'=>"https://t.me/superapilar/21",
     'caption'=>"starttx",
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$xizmatlarru,
     ]);
     }      
     
     if($tx=="📞 Любимые номера"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'photo'=>"https://t.me/superapilar/22",
     'caption'=>"starttx",
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$xizmatlarru,
     ]);
     }          
     
if($tx=="⏳ Набор минут✨"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"Выберите:",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$daqiqatuplamru,
     ]);
     }  
     
if($tx=="📞 Набор минут по узбекистану 🌍"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"Выберите:",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$uzbdaqiqaru,
     ]);
     }  

if($tx=="⏳ 100 Минут"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"⏳ 100 минут
💳 Цена: 4000 сумов
Period Срок действия: 30 дней
📲 Активация: *111*2*3*1#

Спасибо за покупку 😊
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$uzbdaqiqaru,
     ]);
     }    
if($tx=="⏳ 300 Минут"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"⏳ 300 минут
💳 Цена: 10000 сумов
Period Срок действия: 30 дней
📲 Активация: *111*2*3*2#

Спасибо за покупку 😊
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$uzbdaqiqaru,
     ]);
     }    
if($tx=="⏳ 600 Минут"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"⏳ 600 минут
💳 Цена: 16 000 сумов
Period Срок действия: 30 дней
📲 Активация: *111*2*3*3#

Спасибо за покупку 😊
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$uzbdaqiqaru,
     ]);
     }    
if($tx=="⏳ 1200 Минут"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"⏳ 1200 минут
💳 Цена: 24 000 сумов
Period Срок действия: 30 дней
📲 Активация: *111*2*3*4#

Спасибо за покупку 😊
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$uzbdaqiqaru,
     ]);
     }        
if($tx=="Для абонентов Constructor TR"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"Выберите:",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$condaqiqaru,
     ]);
     }        

if($tx=="🕜 50 Минут"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"🕰 50 Минут
💳 Цена: 3360 сумов
⏱ Срок действия: 30 дней
📲 Активация: *9999*1*3*1#

Спасибо за покупку 😊
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$condaqiqaru,
     ]);
     }       
if($tx=="🕜 100 Минут"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"🕰 100 минут
💳 Цена: 5260 сумов
⏱ Срок действия: 30 дней
📲 Активация: *9999*1*3*2#

Cпасибо за покупку 😊
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$condaqiqaru,
     ]);
     }       
if($tx=="🕜 300 Минут"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"🕜 300 Минут
💳 Цена: 16840 сумов
⏱ Срок действия: 30 дней
📲 Активация: *9999*1*3*3#
Спасибо за покупку 😊
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$condaqiqaru,
     ]);
     }       
if($tx=="🕜 500 Минут"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"🕰 500 Минут
💳 Цена: 23150 сумов
⏱ Срок действия: 30 дней
📲 Активация: *9999*1*3*4#

Спасибо за покупку 😊
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$condaqiqaru,
     ]);
     }       
if($tx=="🕜 900 Минут"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"🕰 900 Минут
💳 Цена: 37890 сумов
⏱ Срок действия: 30 дней
📲 Активация: *9999*1*3*5#

Cпасибо за покупку 😊
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$condaqiqaru,
     ]);
     }           
if($tx=="🕜 1500 Минут"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"🕰 1500 Минут
💳 Цена: 58940 сумов
⏱ Срок действия: 30 дней
📲 Активация: *9999*1*3*6#

Cпасибо за покупку 😊
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$condaqiqaru,
     ]);
     }           
if($tx=="🕜 2000 Минут"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"🕰 2000 Минут
💳 Цена: 67360 сумов
⏱ Срок действия: 30 дней
📲 Активация: *9999*1*3*7#

Cпасибо за покупку 😊
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$condaqiqaru,
     ]);
     }           
    

if($tx=="📨 SMS-пакет✨" or $tx=="🔙  Назад"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"Выберите:",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$smstuplamru,
     ]);
     }    
         
if($tx=="🗑Отключение 📩 SMS порталов"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"Выберите:",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$smsuchirishru,
     ]);
     } 
     
if($tx=="4250."){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"Написано от 4250 номеров
Удалить SMS 🗑

На номер 4252
STOP1
Отправить слово в виде SMS

Контактное лицо: 📞 782002222
с понедельника по пятницу
(09:00 – 18:00)
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$smsuchirishru,
     ]);
     } 
if($tx=="1254."){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"От номера 1254
Удалить SMS 🗑

На номер 1424
1
Отправить слово в виде SMS

Контактное лицо: № 781400501
с понедельника по пятницу
(09:00 – 18:00)
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$smsuchirishru,
     ]);
     }   
if($tx=="6431 и 7979"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"От 6431 или 7979
Удалить SMS 🗑

На номер 7878
1
Отправить слово в виде SMS

Контактное лицо: 📞 781500060
с понедельника по пятницу
(09:00 – 18:00)
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$smsuchirishru,
     ]);
     } 
if($tx=="0789 и 8789 "){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"От 0789 или 8789
Удалить SMS 🗑

На номер 0789
СТОП
Отправить слово в виде SMS

Контакт: 📞 981211228
с понедельника по пятницу
(09:00 – 18:00)
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$smsuchirishru,
     ]);
     }   
if($tx=="Астрологические предсказания"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"Астрологические предсказания
От номера 7777
Удалить SMS 🗑

Удалено через 2 смс!
1) на номер 7777
р стоп
Отправить слово в виде SMS
2) на номер 7777
подтвердить
Отправить слово в виде SMS
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$smsuchirishru,
     ]);
     } 
if($tx=="Погода 🏞"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"От номера 7777
Удалить SMS 🗑

Удалено через 2 смс!
1) на номер 7777
остановись
Отправить слово в виде SMS
2) на номер 7777
д подтвердить
Отправить слово в виде SMS
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$smsuchirishru,
     ]);
     }   
if($tx=="Статусы"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"От номера 7777
Удалить SMS 🗑

Удалено через 2 смс!
1) на номер 7777
остановись
Отправить слово в виде SMS
2) на номер 7777
д подтвердить
Отправить слово в виде SMS
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$smsuchirishru,
     ]);
     } 
if($tx=="Интересные факты 💭"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"Интересные факты
От номера 7777
Удалить SMS 🗑

Удалено через 2 смс!
1) на номер 7777
остановка
Отправить слово в виде SMS
2) на номер 7777
подтвердить
Отправить слово в виде SMS
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$smsuchirishru,
     ]);
     }   
if($tx=="Портал Zamin mobile"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"Портал Zamin Mobile
Удалить: позвоните 2222 и нажмите 5..2
Контактное лицо: 📞 909152129
с понедельника по пятницу
(09:00 – 18:00)
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$smsuchirishru,
     ]);
     } 
if($tx=="Курс валюта 💵"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"Куср валюта 💵
От номера 7777
Удалить SMS 🗑

Удалено через 2 смс!
1) на номер 7777
и остановиться
Отправить слово в виде SMS
2) на номер 7777
подтверждения
Отправить слово в виде SMS
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$smsuchirishru,
     ]);
     }        
  
if($tx=="📨 Ежемесячные SMS-пакеты"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"Выберите:",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$oyliksmsru,
     ]);
     } 
     
if($tx=="📨 10 Смс"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"📨 10 Смс
💳 Цена: 420 сумов
⌛️ Срок действия: 30 дней
📲 Активация: *111*2*1*1#


Cпасибо за покупку 😊
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$oyliksmsru,
     ]);
     } 
if($tx=="📨 50 Смс"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"📨 50 Смс
💳 Цена: 1680 сумов
⌛️ Срок действия: 30 дней
📲 Активация: *111*2*1*2#


Cпасибо за покупку 😊
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$oyliksmsru,
     ]);
     } 
if($tx=="📨 200 Смс"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"📨 200 Смс
💳 Цена: 5200 сумов
⌛️ Срок действия: 30 дней
📲 Активация: *111*2*1*3#


Спасибо за покупку 😊
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$oyliksmsru,
     ]);
     } 
if($tx=="📨 500 Смс"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"📨 500 Смс
💳 Цена: 9500 сумов
⌛️ Срок действия: 30 дней
📲 Активация: *111*2*1*4#


Спасибо за покупку 😊
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$oyliksmsru,
     ]);
     }    
     
if($tx=="📩 Ежедневные SMS-пакеты"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"Выберите:",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$kunliksmsru,
     ]);
     } 
     

if($tx=="📩 50 Смс"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"📩 50 Смс
💳 Ежедневная абонентская плата: 420 сумов.
⌛️ Срок действия: 1 день
📲 Активация: *111*2*19*1*2#
🗑 Отключить: *111*1*19*1*2#


Спасибо за покупку 😊
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$kunliksmsru,
     ]);
     } 
if($tx=="📩 100 Смс"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"📩 100 Смс
💳 Ежедневная абонентская плата: 840 so'm 
⌛️ Срок действия: 1 kun
📲 Активация: *111*2*19*2*2#
🗑 Отключить: *111*1*19*1*2#


Спасибо за покупку 😊
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$kunliksmsru,
     ]);
     }      
    
if($tx=="📦 Международные SMS-пакеты"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"Tanlang:",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$xalqarosmsru,
     ]);
     }          
     

if($tx=="📦 10 Смс"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"📦 10 Смс
💳 Цена: 5050 Сумов
⏳ Срок действия:: 30 день и ночь
📲 Активация: *111*2*2*1#


Спасибо за покупку 😊
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$xalqarosmsru,
     ]);
     }          
if($tx=="📦 20 Смс"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"📦 20 Смс
💳 Цена: 9260 сумов
⌛️ Срок действия: 30 день и ночь
📲 Активация: *111*2*2*2#


Спасибо за покупку 😊
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$xalqarosmsru,
     ]);
     }          
if($tx=="📦 30 Смс"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"📦 30 Смс
💳 Цена: 12630 сумов
⌛️ Срок действия: 30 день и ночь
📲 Активация: *111*2*2*3#


Спасибо за покупку 😊
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$xalqarosmsru,
     ]);
     }          
if($tx=="📦 40 Смс"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"📦 40 Смс
💳 Цена: 15150 сумов
⌛️ Срок действия: 30 день и ночь
📲 Активация: *111*2*2*4#



Спасибо за покупку 😊
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$xalqarosmsru,
     ]);
     }          
if($tx=="📦 50 Смс"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"📦 50 Смс
💳 Цена: 16840 сумов
⌛️  Срок действия: 30 день и ночь
📲 Активация: *111*2*2*5#



Спасибо за покупку 😊
",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$xalqarosmsru,
     ]);
     }          
                        
     
if($tx=="🔍 Служба 🎰 выбор номера"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"Скоро...",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$raqamtanlashru,
     ]);
     } 
     
if($tx=="💳 Просмотр номеров"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"Скоро...",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$raqamtanlashru,
     ]);
     }   
if($tx=="💳 Доставка номера 🚙"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"Скоро...",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$raqamtanlashru,
     ]);
     }   
if($tx=="💳 Познакомьтесь с ценой номеров 💵"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"Скоро...",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$raqamtanlashru,
     ]);
     }      
     
if($tx=="👨🏻‍💻Информация о нас✨"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"Скоро...",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$menuru,
     ]);
     }   
if($tx=="⚠️ Быть осторожен 📝"){
 	bot('sendmessage',[
     'chat_id'=>$cid,
     'text'=>"ЗАКОН РЕСПУБЛИКИ УЗБЕКИСТАН
О АВТОРСКОМ ПРАВЕ И СМЕЖНЫХ ПРАВАХ
Законодательная палата
Принято 23 марта 2006 г.

Утверждено Сенатом 9 июня 2006 г.

Глава 5 Защита авторских и смежных прав

Статья 65 Методы защиты авторских и смежных прав

  Автор, владелец смежных прав или другой владелец исключительных прав имеет право требовать от нарушителя:
признание прав;
восстановить предварительно нарушенное состояние и прекратить действия, которые нарушают или угрожают нарушить закон;
что, если права правообладателя не нарушены, он возмещает ущерб в размере дохода, который он мог бы получить в ходе обычного гражданского судопроизводства, но который он не получил.
  Если нарушитель получил доход в результате нарушения авторских или смежных прав, правообладатели, среди прочего, возмещают упущенную выгоду в размере не менее такого дохода;
выплачивать компенсацию за ущерб, независимо от факта причинения ущерба, с учетом характера правонарушения и степени вины правонарушителя, с учетом обычаев правонарушителя;
принимать иные меры, предусмотренные законом в связи с защитой своих прав, предусмотренных настоящим Законом.
  Автор и исполнитель вправе требовать от нарушителя морального вреда в случае нарушения их прав.
Организация, которая управляет имущественными правами на коллективной основе, имеет право обратиться в суд от своего имени в порядке, установленном законом, для защиты нарушенных авторских и смежных прав лиц, имущественные права которых управляются такой организацией.
  Ущерб, причиненный третьим лицам в результате принятия необходимых мер для предотвращения или прекращения нарушения авторских или смежных прав, а также ущерб, понесенный лицом, принявшим такие меры, подлежит взысканию с нарушителя.",
     'parse_mode'=>'html',
     'reply_to_message_id'=>$mid,
     'reply_markup'=>$menuru,
     ]);
     }   

     

     

 
 
 
 
 ?>