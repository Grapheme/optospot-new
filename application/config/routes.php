<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

$route['default_controller'] = "users_interface";
$route['404_override'] = '';

$route['redactor/upload'] = "users_interface/redactorUploadImage";
$route['redactor/get-uploaded-images'] = "users_interface/redactorUploadedImages";
$route['get-signup-accounts(\/:num)*?'] = "users_interface/getSignupAccount";
/************************************************** CLIENT INTRERFACE ***********************************************/
$route[':any/cabinet/balance'] = "clients_interface/balance";
$route[':any/cabinet/profile'] = "clients_interface/profile";
/*************************************************** ADMINS INTRERFACE ***********************************************/
$route['admin-panel/actions/users-list(\/:any)*?'] = "admin_interface/accountsList";
$route['admin-panel/actions/users/edit/id/:num'] = "admin_interface/accountEdit";
$route['admin-panel/actions/users/delete/id/:num'] = "admin_interface/accountDelete";
$route['admin-panel/actions/pages'] = "admin_interface/pagesLang";
$route['admin-panel/actions/pages/lang/:num/categories'] = "admin_interface/langCategories";
$route['admin-panel/actions/pages/lang/:num/properties'] = "admin_interface/langProperties";
$route['admin-panel/actions/pages/lang/:num/new-page'] = "admin_interface/insertNewPage";
$route['admin-panel/actions/pages/lang/:num/page/:num'] = "admin_interface/editPage";
$route['admin-panel/actions/pages/lang/:num/page/home'] = "admin_interface/homePage";
$route['admin-panel/actions/pages/lang/:num/page/trade'] = "admin_interface/menuPage";
$route['admin-panel/actions/pages/lang/:num/page/faq'] = "admin_interface/menuPage";
$route['admin-panel/actions/pages/lang/:num/page/deposit'] = "admin_interface/menuPage";
$route['admin-panel/actions/pages/lang/:num/page/contact-us']= "admin_interface/menuPage";
$route['admin-panel/actions/pages/delete-lang/:num'] = "admin_interface/langDetele";
$route['admin-panel/actions/pages/delete-category/:num'] = "admin_interface/deleteCategory";
$route['admin-panel/actions/pages/delete-page/:num'] = "admin_interface/deletePage";
$route['admin-panel/actions/settings'] = "admin_interface/settings";
$route['admin-panel/actions/profile'] = "admin_interface/actions_profile";
$route['redactor/upload'] = "admin_interface/redactorUploadImage";
$route['admin-panel/withdraw'] = "admin_interface/withdraw";
$route['admin-panel/registered(\/:any)*?'] = "admin_interface/registered";
$route['admin-panel/log(\/:any)*?'] = "admin_interface/logList";
/*************************************************** USERS INTRERFACE ***********************************************/
$route[':any/login'] = "ajax_interface/loginIn";
$route[':any/signup'] = "ajax_interface/signUp";
$route[':any/signup-account'] = "ajax_interface/signUp";
$route[':any/signup-real-account'] = "ajax_interface/createRealAccount";

$route['get-chart-link'] = "ajax_interface/getChartLink";
$route[':any/forgot-password'] = "ajax_interface/forgotPassword";
$route[':any/create-account'] = "users_interface/createAccount";
$route['(:any\/)*?logoff'] = "users_interface/logoff";

$route[':any/trade'] = "users_interface/trade";
$route[':any/award'] = "users_interface/award";
$route[':any/binarnaya-platforma/online-treiding'] = "users_interface/trade";

$route[':any/registering'] = "users_interface/registering";
$route[':any/change-site-language/:any'] = "users_interface/changeLanguage";
$route[':any/:any'] = "users_interface/pages";
$route['ru|ind|en'] = "users_interface/index";