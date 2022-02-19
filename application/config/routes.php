<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


$route['joinus']='home/joinus';
$route['savejoinus']='home/savejoinus';

$route['aboutus']='home/aboutus';
$route['contactus']='home/contactus';
$route['privacypolicy']='home/privacypolicy';
$route['syllabus']='home/syllabus';
$route['syllabus/(:any)']='home/syllabus';

$route['quiz/page']='quiz/index';
$route['quiz/page/(:num)']='quiz/index';
$route['subjects']='quiz/subjects';
$route['chapters']='quiz/chapters';
$route['chapters/(:any)']='quiz/chapters';
$route['startquiz']='quiz/startquiz';
$route['startquiz/(:any)']='quiz/startquiz';

$route['blogs/'] = 'blogs/index';
$route['blogs/(:any)'] = 'blogs/details';

$route['register']='account/register';
$route['verifyotp']='account/verifyotp';
$route['validatelogin']='account/validatelogin';
$route['logout']='account/logout';

$route['bookmarks']='profile/bookmarks';

$route['googleoauth']='account/googleoauth';

$route['admin/logout']='admin/login/logout';

$route['admin/users']='admin/home/users';
$route['admin/joinuslist']='admin/home/joinuslist';
$route['admin/masterkey/exams']='admin/masterkey/index';