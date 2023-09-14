<?php 
return [
  'backend' => [
    'access' => [
      'title' => 'ادارة الوصول',
      'export' => 'تصدير',
      'copy' => 'نسخ',
      'print' => 'طباعة',
      'roles' => 
      [
        'all' => 'جميع الأدوار',
        'create' => 'إنشاء دور',
        'edit' => 'تحرير الدور',
        'management' => 'إدارة الأدوار',
        'main' => 'الأدوار',
      ],
      'permissions' => 
      [
        'all' => 'جميع الأذونات',
        'create' => 'إنشاء إذن',
        'edit' => 'تحرير الإذن',
        'management' => 'إدارة الإذن',
        'main' => 'أذونات',
      ],
      'users' => 
      [
        'all' => 'جميع المستخدمين',
        'change-password' => 'تغيير كلمة السر',
        'create' => 'إنشاء مستخدم',
        'deactivated' => 'المستخدمون المعطلون',
        'deleted' => 'المستخدمون المحذوفون',
        'edit' => 'تحرير العضو',
        'main' => 'المستخدمون',
        'view' => 'عرض المستخدم',
        'action' => 'عمل',
        'list' => 'قائمة',
        'add-new' => 'اضف جديد',
        'deactivated-users' => 'المستخدمون المعطلون',
        'deleted-users' => 'المستخدمون المحذوفون',
      ],
    ],
    'log-viewer' => [
      'main' => 'سجل المشاهد',
      'dashboard' => 'لوحة القيادة',
      'logs' => 'السجلات',
    ],
    'sidebar' => [
      'dashboard' => 'لوحة القيادة',
      'general' => 'جنرال لواء',
      'system' => 'النظام',
    ],
    'pages' => [
      'all' => 'كل الصفحات',
      'create' => 'إنشاء صفحة',
      'edit' => 'تعديل الصفحة',
      'management' => 'إدارة الصفحة',
      'main' => 'الصفحات',
    ],
    'blogs' => [
      'all' => 'كل المدونة',
      'create' => 'انشاء مدونة',
      'edit' => 'تحرير مدونة',
      'management' => 'إدارة المدونة',
      'main' => 'المدونات',
    ],
    'blogcategories' => [
      'all' => 'جميع فئات المدونة',
      'create' => 'إنشاء فئة مدونة',
      'edit' => 'تحرير فئة المدونة',
      'management' => 'إدارة فئة المدونة',
      'main' => 'صفحات CMS',
    ],
    'blogtags' => [
      'all' => 'كل علامة المدونة',
      'create' => 'إنشاء علامة مدونة',
      'edit' => 'تحرير علامة المدونة',
      'management' => 'إدارة علامات المدونة',
      'main' => 'علامات المدونة',
    ],
    'blog' => [
      'all' => 'كل صفحة المدونة',
      'create' => 'إنشاء صفحة مدونة',
      'edit' => 'تحرير صفحة المدونة',
      'management' => 'إدارة المدونة',
      'main' => 'صفحات المدونة',
    ],
    'faqs' => [
      'all' => 'كل صفحة الأسئلة',
      'create' => 'إنشاء صفحة الأسئلة',
      'edit' => 'تحرير صفحة الأسئلة',
      'management' => 'إدارة الأسئلة المتداولة',
      'main' => 'صفحات التعليمات',
    ],
    'settings' => [
      'all' => 'جميع الإعدادات',
      'create' => 'إنشاء الإعدادات',
      'edit' => 'تحرير الإعدادات',
      'management' => 'إدارة الإعدادات',
      'main' => 'الإعدادات',
    ],
    'menus' => [
      'all' => 'كل القائمة',
      'create' => 'إنشاء قائمة',
      'edit' => 'عدل القائمة',
      'management' => 'إدارة القائمة',
      'main' => 'القوائم',
    ],
    'modules' => [
      'all' => 'صفحة جميع الوحدات',
      'create' => 'إنشاء صفحة الوحدة',
      'management' => 'إدارة الوحدة',
      'main' => 'صفحات الوحدة',
    ],
    'plans' => [
      'all' => 'جميع الخطط',
      'create' => 'إنشاء خطة',
      'edit' => 'تعديل الخطة',
      'management' => 'إدارة الخطة',
      'main' => 'الخطط',
    ],
    'geos' => [
      'all' => 'جميع الجيوس',
      'create' => 'إنشاء جيو',
      'edit' => 'تحرير Geo',
      'management' => 'الإدارة الجغرافية',
      'main' => 'Geos',
    ],
    'customers' => [
      'all' => 'جميع العملاء',
      'create' => 'إنشاء عميل',
      'edit' => 'تحرير العميل',
      'management' => 'ادارة الزبائن',
      'main' => 'الزبائن',
    ],
    'customergroups' => [
      'all' => 'جميع مجموعات العملاء',
      'create' => 'إنشاء مجموعة العملاء',
      'edit' => 'تحرير مجموعة العملاء',
      'management' => 'إدارة مجموعة العملاء',
      'main' => 'مجموعات العملاء',
    ],
    'warehouses' => [
      'all' => 'جميع المستودعات',
      'create' => 'إنشاء مستودع',
      'edit' => 'تحرير المستودع',
      'management' => 'إدارة المستودعات',
      'main' => 'المستودعات',
    ],
    'productcategories' => [
      'all' => 'جميع فئات المنتجات',
      'create' => 'إنشاء فئة المنتج',
      'edit' => 'تحرير فئة المنتج',
      'management' => 'إدارة فئة المنتج',
      'main' => 'فئات المنتجات',
    ],
    'products' => [
      'all' => 'جميع المنتجات',
      'create' => 'إنشاء منتج',
      'edit' => 'تحرير المنتج',
      'management' => 'ادارة المنتج',
      'main' => 'منتجات',
    ],
    'invoices' => [
      'all' => 'جميع الفواتير',
      'create' => 'إنشاء فاتورة',
      'edit' => 'تحرير الفاتورة',
      'management' => 'إدارة الفاتورة',
      'main' => 'فواتير',
    ],
    'additionals' => [
      'all' => 'جميع الضرائب والخصم',
      'create' => 'إنشاء ضريبة وخصم',
      'edit' => 'تحرير الضريبة والخصم',
      'management' => 'إدارة الضرائب والخصم',
      'main' => 'الضريبة والخصم',
    ],
    'currencies' => [
      'all' => 'جميع العملات',
      'create' => 'إنشاء عملة',
      'edit' => 'تحرير العملة',
      'management' => 'إدارة العملات',
      'main' => 'العملات',
    ],
    'terms' => [
      'all' => 'جميع الشروط',
      'create' => 'إنشاء مصطلح',
      'edit' => 'تحرير المصطلح',
      'management' => 'إدارة المصطلح',
      'main' => 'شروط',
    ],
    'customfields' => [
      'all' => 'جميع الحقول المخصصة',
      'create' => 'إنشاء حقل مخصص',
      'edit' => 'تحرير الحقل المخصص',
      'management' => 'إدارة الحقول المخصصة',
      'main' => 'الحقول المخصصة',
    ],
    'prefixes' => [
      'all' => 'جميع البادئات',
      'create' => 'إنشاء بادئة',
      'edit' => 'تحرير البادئة',
      'management' => 'إدارة البادئة',
      'main' => 'البادئات',
    ],
    'accounts' => [
      'all' => 'جميع الحسابات',
      'create' => 'إنشاء حساب',
      'edit' => 'تحرير الحساب',
      'management' => 'ادارة الحساب',
      'main' => 'حسابات',
    ],
    'transactions' => [
      'all' => 'كل الحركات المالية',
      'create' => 'إنشاء معاملة',
      'edit' => 'تحرير المعاملة',
      'management' => 'ادارة العمليات التجارية',
      'main' => 'المعاملات',
    ],
    'templates' => [
      'all' => 'جميع القوالب',
      'create' => 'إنشاء قالب',
      'edit' => 'تحرير القالب',
      'management' => 'إدارة القالب',
      'main' => 'قوالب',
    ],
    'transactioncategories' => [
      'all' => 'جميع فئات المعاملات',
      'create' => 'إنشاء فئة المعاملات',
      'edit' => 'تحرير فئة المعاملة',
      'management' => 'إدارة فئة المعاملات',
      'main' => 'فئات المعاملات',
    ],
    'productvariables' => [
      'all' => 'جميع متغيرات المنتج',
      'create' => 'إنشاء متغير المنتج',
      'edit' => 'تحرير متغير المنتج',
      'management' => 'إدارة المنتج المتغير',
      'main' => 'متغيرات المنتج',
    ],
    'hrms' => [
      'all' => 'كل نظام إدارة الموارد البشرية',
      'create' => 'إنشاء Hrm',
      'edit' => 'تحرير Hrm',
      'management' => 'إدارة الموارد البشرية',
      'main' => 'نظام إدارة الموارد البشرية',
    ],
    'banks' => [
      'all' => 'جميع البنوك',
      'create' => 'إنشاء بنك',
      'edit' => 'تحرير البنك',
      'management' => 'إدارة البنك',
      'main' => 'البنوك',
    ],
    'usergatewayentries' => [
      'all' => 'جميع بوابات الدفع',
      'create' => 'إنشاء بوابة الدفع',
      'edit' => 'تحرير بوابة الدفع',
      'management' => 'إدارة بوابة الدفع',
      'main' => 'بوابات الدفع',
    ],
    'departments' => [
      'all' => 'جميع الإدارات',
      'create' => 'إنشاء قسم',
      'edit' => 'تحرير القسم',
      'management' => 'إدارة القسم',
      'main' => 'الأقسام',
    ],
    'quotes' => [
      'all' => 'جميع الاقتباسات',
      'create' => 'إنشاء عرض أسعار',
      'edit' => 'تحرير الاقتباس',
      'management' => 'إدارة عرض الأسعار',
      'main' => 'يقتبس',
    ],
    'purchaseorders' => [
      'all' => 'جميع أوامر الشراء',
      'create' => 'إنشاء أمر شراء',
      'edit' => 'تحرير أمر الشراء',
      'management' => 'إدارة أوامر الشراء',
      'main' => 'طلبات الشراء',
    ],
    'orders' => [
      'all' => 'جميع الطلبات',
      'create' => 'إنشاء النظام',
      'edit' => 'تحرير الطلب',
      'management' => 'إدارة الطلبات',
      'main' => 'الطلب #٪ s',
    ],
    'suppliers' => [
      'all' => 'جميع الموردين',
      'create' => 'إنشاء مورد',
      'edit' => 'تحرير المورد',
      'management' => 'إدارة الموردين',
      'main' => 'الموردون',
    ],
    'tasks' => [
      'all' => 'كل المهام',
      'create' => 'إنشاء مهمة',
      'edit' => 'تحرير المهمة',
      'management' => 'ادارة المهام',
      'main' => 'مهام',
    ],
    'tags' => [
      'all' => 'جميع العلامات',
      'create' => 'إنشاء علامة',
      'edit' => 'تحرير العلامة',
      'management' => 'إدارة العلامات',
      'main' => 'العلامات',
    ],
    'miscs' => [
      'all' => 'جميع متفرقات',
      'create' => 'إنشاء متفرقات',
      'edit' => 'تحرير متفرقات',
      'management' => 'إدارة متفرقات',
      'main' => 'متنوع',
    ],
    'projects' => [
      'all' => 'جميع المشاريع',
      'create' => 'إنشاء مشروع',
      'edit' => 'تحرير المشروع',
      'management' => 'ادارة مشروع',
      'main' => 'المشاريع',
    ],
    'notes' => [
      'all' => 'جميع الملاحظات',
      'create' => 'إنشاء ملاحظة',
      'edit' => 'تحرير مذكرة',
      'management' => 'إدارة الملاحظات',
      'main' => 'ملاحظات',
    ],
    'events' => [
      'all' => 'كل الأحداث',
      'create' => 'انشاء حدث',
      'edit' => 'تحرير الحدث',
      'management' => 'أدارة الحدث',
      'main' => 'الأحداث',
    ],
  ],
];