<?php 
return [
  'backend' => [
    'access' => [
      'users' => 
      [
        'delete_user_confirm' => 'क्या आप वाकई इस उपयोगकर्ता को स्थायी रूप से हटाना चाहते हैं? इस उपयोगकर्ता के आईडी का संदर्भ देने वाले अनुप्रयोग में कहीं भी त्रुटि की संभावना होगी। अपने स्वयं के जोखिम पर आगे बढ़ें। यह संयुक्त राष्ट्र द्वारा नहीं किया जा सकता है।',
        'if_confirmed_off' => '(यदि पुष्टि बंद है)',
        'restore_user_confirm' => 'इस उपयोगकर्ता को उसकी मूल स्थिति में पुनर्स्थापित करें?',
      ],
    ],
    'dashboard' => [
      'title' => 'SuperAdmin प्रशासनिक डैशबोर्ड',
      'welcome' => 'स्वागत हे',
    ],
    'general' => [
      'all_rights_reserved' => 'सभी अधिकार सुरक्षित।',
      'are_you_sure' => 'क्या आप वास्तव में इसे करना चाहते हैं?',
      'boilerplate_link' => 'गुलाब की बिलिंग',
      'continue' => 'जारी रखें',
      'member_since' => 'से सदस्ये',
      'minutes' => 'मिनट',
      'search_placeholder' => 'खोज...',
      'timeout' => 'आपके पास सुरक्षा कारणों से स्वचालित रूप से लॉग आउट हो गया था क्योंकि आपके पास कोई गतिविधि नहीं थी',
      'see_all' => 
      [
        'messages' => 'सभी संदेश देखें',
        'notifications' => 'सभी देखें',
        'tasks' => 'सभी कार्य देखें',
      ],
      'status' => 
      [
        'online' => 'ऑनलाइन',
        'offline' => 'ऑफलाइन',
      ],
      'you_have' => 
      [
        'messages' => '{0} आप के पास संदेश नहीं हैं। {1} आपके पास 1 संदेश है। [2, Inf] आपके पास: नंबर संदेश हैं',
        'notifications' => '{0} आप "टी नोटिफ़िकेशन नहीं करते हैं। {1} आपके पास 1 सूचना है। [2, इन्फ] आपके पास: नंबर सूचनाएं हैं',
        'tasks' => '{0} आप कार्य नहीं करते हैं। {1} आपके पास 1 कार्य है। [2, Inf] आपके पास: संख्या कार्य हैं',
      ],
    ],
    'search' => [
      'empty' => 'कृपया खोज शब्द एंटर करें।',
      'incomplete' => 'आपको इस सिस्टम के लिए अपना खुद का लॉजिक लिखना होगा।',
      'title' => 'खोज परिणाम',
      'results' => 'के लिए खोज परिणाम: क्वेरी',
    ],
    'welcome' => 'स्वागत हे',
  ],
  'emails' => [
    'auth' => [
      'error' => 'ओह!',
      'greeting' => 'नमस्कार!',
      'regards' => 'सादर,',
      'trouble_clicking_button' => 'यदि आपको ": action_text" बटन पर क्लिक करने में समस्या हो रही है, तो नीचे दिए गए URL को अपने वेब ब्राउज़र में कॉपी और पेस्ट करें:',
      'thank_you_for_using_app' => 'हमारे आवेदन का उपयोग करने के लिए धन्यवाद!',
      'password_reset_subject' => 'पासवर्ड रीसेट',
      'password_cause_of_email' => 'आप यह ईमेल प्राप्त कर रहे हैं क्योंकि हमें आपके खाते के लिए पासवर्ड रीसेट अनुरोध प्राप्त हुआ है।',
      'password_if_not_requested' => 'यदि आपने पासवर्ड रीसेट का अनुरोध नहीं किया है, तो आगे की कार्रवाई की आवश्यकता नहीं है।',
      'reset_password' => 'अपना पासवर्ड रीसेच करने के लिए यहां क्लिक करें',
      'click_to_confirm' => 'अपने खाते की पुष्टि के लिए यहां क्लिक करें:',
    ],
  ],
  'frontend' => [
    'test' => 'परीक्षा',
    'tests' => [
      'based_on' => 
      [
        'permission' => 'अनुमति के आधार पर -',
        'role' => 'भूमिका आधारित -',
      ],
      'js_injected_from_controller' => 'एक नियंत्रक से जावास्क्रिप्ट इंजेक्शन',
      'using_blade_extensions' => 'ब्लेड एक्सटेंशन का उपयोग करना',
      'using_access_helper' => 
      [
        'array_permissions' => 'एक्सेस हेल्पर विद एरे ऑफ परमिशन नेम्स या आईडी का उपयोग करना जहां उपयोगकर्ता के पास सभी को रखने के लिए है।',
        'array_permissions_not' => 'एक्सेस हेल्पर विद अर्रे ऑफ परमिशन नेम्स या आईडी का उपयोग करना जहां उपयोगकर्ता के पास सभी को रखने की आवश्यकता नहीं है।',
        'array_roles' => 'भूमिका नाम या आईडी के एरे के साथ एक्सेस हेल्पर का उपयोग करना जहां उपयोगकर्ता को सभी के पास होना चाहिए।',
        'array_roles_not' => 'भूमिका नाम या आईडी के एरे के साथ एक्सेस हेल्पर का उपयोग करना जहां उपयोगकर्ता के पास सभी को रखने की आवश्यकता नहीं है।',
        'permission_id' => 'अनुमति आईडी के साथ एक्सेस हेल्पर का उपयोग करना',
        'permission_name' => 'अनुमति नाम के साथ एक्सेस हेल्पर का उपयोग करना',
        'role_id' => 'रोल आईडी के साथ एक्सेस हेल्पर का उपयोग करना',
        'role_name' => 'रोल नाम के साथ एक्सेस हेल्पर का उपयोग करना',
      ],
      'view_console_it_works' => 'कंसोल देखें, आपको "यह काम करता है!" जो FrontendController @ इंडेक्स से आ रहा है',
      'you_can_see_because' => 'आप इसे देख सकते हैं क्योंकि आपके पास ": भूमिका" की भूमिका है!',
      'you_can_see_because_permission' => 'आप इसे देख सकते हैं क्योंकि आपके पास ": अनुमति" की अनुमति है!',
    ],
    'user' => [
      'change_email_notice' => 'यदि आप अपना ई-मेल बदलते हैं तो आप तब तक लॉग आउट होंगे जब तक आप अपने नए ई-मेल पते की पुष्टि नहीं करते।',
      'email_changed_notice' => 'दोबारा लॉग इन करने से पहले आपको अपने नए ई-मेल पते की पुष्टि करनी चाहिए।',
      'profile_updated' => 'प्रोफ़ाइल सफलतापूर्वक अपडेट की गई।',
      'password_updated' => 'पासवर्ड सफलतापूर्वक अपडेट किया गया।',
    ],
    'welcome_to' => 'आपका स्वागत है: जगह',
  ],
];