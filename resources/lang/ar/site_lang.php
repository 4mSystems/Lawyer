<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used during authentication for various
    | messages that we need to display to the user. You are free to modify
    | these language lines according to your application's requirements.
    |
    */
    // public use
    'public_add_btn_text' => 'إضافة',
    'public_no_text' => 'قيد الانتظار',
    'public_yes_text' => 'تم التنفيذ',
    'public_edit_btn_text' => 'تعديل',
    'public_close_btn_text' => 'إلغاء',
    'public_accept_btn_text' => 'موافقة',
    'public_delete_text' => 'حذف',
    'public_warn_text' => '<strong>إنتبه ! يجب الضغط على <p class="btn btn-blue tooltips" style="margin-right: 8px;margin-left: 8px;"><i class="fa fa-eye-slash"></i></p> لاظهار الملاحظات لكل جلسة</strong>',
    'public_warn2_text' => 'يجب الضغط على',
    'public_warn3_text' => 'بكل جلسة',
    'public_success_text' => 'تمت العملية بنجاح',
    'public_delete_modal_text' => 'هل تريد الحذف',
    'public_continue_delete_modal_text' => 'جارى الحذف',

    // navbar
    'side_welcome' => 'مرحبا.. من جديد',
    'side_home' => 'الرئيسية',
    'side_users' => 'المستخدمين',
    'side_clients' => 'العملاء',
    'side_cases' => 'الدعاوى',
    'side_add_case' => 'إضافة دعوى',
    'side_search_case' => 'البحث عن الدعاوى',
    'side_mohdar' => 'المحضرين',
    'side_reports' => 'التقارير',
    'side_reports_daily' => 'التقارير اليومية',
    'side_reports_monthly' => 'التقارير الشهرية',
    'side_exit' => 'تسجيل الخروج',
    //users
    'users_all' => 'كل المستخدمين',
    'users_username' => 'إسم المستخدم',
    'users_email' => 'البريد الالكترونى',
    'users_type' => 'النوع',
    'users_add_new' => 'إضافة مستخدم جديد',
    'users_edit_user' => 'تعديل البيانات ',
    //home content
    'home_more_options' => 'المزيد',
    'home_add_user' => 'إضافة مستخدم',
    'home_see_more' => 'روية المزيد',
    'home_sessions_coming' => 'الجلسات القادمة',
    'home_session_date' => 'تاريخ الجلسة',
    'home_session_status' => 'الحالة',
    'home_session_month' => 'الشهر',
    'home_session_case_number' => 'رقم الدعوى',
    'home_session_missing' => 'الجلسات الفائته',
    //mohdar content
    'mohdar_add_mohdar' => 'إضافة محضر جديد',
    'mohdar_edit_mohdar' => 'تعديل بيانات محضر ',
    'mohdar_notes' => 'الملاحظات',
    'mohdar_court' => 'محضرين محكمة',
    'mohdar_paper_type' => 'نوع الورقة',
    'mohdar_paper_num' => 'رقم الورقة',
    'mohdar_paper_deliver' => 'تاريخ تسليم الورقة',
    //Auth
    'auth_password' => 'الرقم السرى',
    'auth_login_text' => 'تسجيل الدخول',
    'auth_cont_title' => 'يرجى تسجيل الدخول لحسابك',
    'auth_cont_body' => 'يرجى إدخال البريد والرقم السرى',
    'auth_errors' => 'لديك أخطاء, يرجى التاكد منهم',
    //clients
    'clients_add_new_client_text' => 'أضافة عميل جديد',
    'clients_add_new_khesm_text' => 'أضافة خصم جديد',
    'clients_edit_client_text' => 'تعديل بيانات العميل',
    'clients_client_name' => 'الاسم',
    'clients_client_unit' => 'الوحدة',
    'clients_client_address' => 'العنوان',
    'clients_client_notes' => 'الملاحظات',
    'clients_client_type' => 'النوع',
    'clients_client_type_client' => 'موكل',
    'clients_client_type_khesm' => 'خصم',
    'clients_client_type_client_hint' => 'إختر الموكيلن',
    'clients_client_type_khesm_hint' => 'إختر الخصوم',
    //add new case
    'add_case_title' => 'إضافة دعوى',
    'add_case_header' => 'إضافة دعوى جديدة',
    'add_case_to_whom' => 'موجهه الى ',
    'add_case_inventation_type' => 'نوع الدعوى',
    'add_case_first_session_date' => 'نوع الدعوى',
    'add_case_court' => 'المحكمة',
    'add_case_circle_num' => 'رقم الدائرة',
    //search case
    'search_case_title' => 'البحث عن دعوى',
    'search_case_search' => 'البحث',
    'search_case_quick_view' => 'نظرة عامة',
    'search_case_edit' => 'تعديل الدعوى',
    'search_case_sessions' => 'الجلسات',
    'search_case_print' => 'طباعة الدعوة',
    'search_case_attachments' => 'الملحقات',
    'search_case_clients' => 'الموكلين',
    'search_case_khesms' => 'الخصوم',
    'search_case_add_client' => 'إضافة موكل',
    'search_case_add_khesm' => 'إضافة خصم',
    'search_case_data' => 'بيانات الدعوى',
    'search_case_info_head' => 'معلومات عن القضية',
    'search_case_first_session_date' => 'تاريخ اول جلسة',
    'search_case_search_hint' => 'رقم القضية, اسم الموكل, اسم خصم',
    'search_case_case_private' => 'خاصة',
    'search_case_case_company' => 'شركات',
    'search_case_session_waiting' => 'قيد الانتظار',
    'search_case_session_done' => 'تم الانتهاء',
    'search_case_case_add_session' => 'إضافة جلسة',
    'search_case_case_add_note' => 'إضافة ملاحظة',
    'search_case_case_print_notes' => ' طباعه الملاحظات',
    'search_case_session_note' => 'الملاحظة',
    'search_case_session_modal_title' => 'إضافة ملاحظه جديده',
    'search_case_session_modal_title_edit' => 'تعديل البيانات',
    'search_case_session_id_warning_text' => 'يجب إختيار الجلسة اولا',
    'search_case_case_warning_text' => 'يجب إختيار الدعوى اولا',
    'search_case_delete_session_text' => 'يجب حذف الملاحظات اولا',
    'permission' => 'الصلاحيات',
    //reports
    'reports_print' => 'طباعه التقرير',
    'reports_all' => 'الكل',
    'reports_month' => 'الشهر',
    'reports_year' => 'العام',
    'reports_category' => 'التصنيف',
    'reports_print_month_1' => 'كشف قضايا شهر',
    'reports_print_month_2' => 'لعام',
    'reports_print_daily_1' => 'كشف قضايا يوم',
    //attachments
    'attachments_new_attach' => 'إضافة ملحق جديد',
    'attachments_edit_attach' => 'تعديل بيانات الملحق',
    'attachments_file_attach' => 'الملف',
    'attachments_desc_attach' => 'الوصف',
    //side_categories
    'side_categories' => 'التصنيفات',
    'category_name' => 'إسم التصنيف',
    'add_new_category_text' => 'إضافة تصنيف جديد',
    'edit_category_text' => 'تعديل التصنيف ',
];
