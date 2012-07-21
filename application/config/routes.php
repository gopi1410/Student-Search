<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "search";
$route['404_override'] = 'err404';

$route['search/([Yy1]\d+)']='search/searchByRoll/$1';
$route['search/(([Yy1]\d+,)+[Yy1]\d+,*)']='search/searchByRoll/$1';
$route['search/(([Yy1]\d+.)+[Yy1]\d+.*)']='search/searchByRoll/$1';
$route['search/(([Yy1]\d+&)+[Yy1]\d+&*)']='search/searchByRoll/$1';
$route['search/(([Yy1]\d+%)+[Yy1]\d+%*)']='search/searchByRoll/$1';
$route['search/(([Yy1]\d+_)+[Yy1]\d+_*)']='search/searchByRoll/$1';
$route['search/([Yy1]\d+-[Yy1]\d+)']='search/searchByRoll/$1';

//do not use . for appending (causes 'http://localhost/student_search_server/index.php/search/searchByMail/gvivek' to be redirected too)
$route['search/([a-zA-Z]+)']='search/searchByMail/$1';
$route['search/(([a-zA-Z]+,)+[a-zA-Z]+,*)']='search/searchByMail/$1';
$route['search/(([a-zA-Z]+&)+[a-zA-Z]+&*)']='search/searchByMail/$1';
$route['search/(([a-zA-Z]+%)+[a-zA-Z]+%*)']='search/searchByMail/$1';
$route['search/(([a-zA-Z]+-)+[a-zA-Z]+-*)']='search/searchByMail/$1';
$route['search/(([a-zA-Z]+_)+[a-zA-Z]+_*)']='search/searchByMail/$1';
$route['search/([a-zA-Z]+(@iitk.ac.in)*)']='search/searchByMail/$1';
$route['search/multiSearch']='search/multiSearch';
$route['search/ajaxSearch']='search/ajaxSearch';


/* End of file routes.php */
/* Location: ./application/config/routes.php */