<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home';
// $route['room-details/(:any)'] = 'home/room_details/$i';
$route['admin/editlocation/(:any)'] = 'admin/addlocation/$i';
$route['admin/edithotelcategory/(:any)'] = 'admin/addhotelcategory/$i';

$route['admin/editamenity/(:any)'] = 'admin/addamenity/$i';
$route['admin/editfacility/(:any)'] = 'admin/addfacility/$i';
$route['admin/editmealplan/(:any)'] = 'admin/addmealplan/$i';
$route['admin/editroomtype/(:any)'] = 'admin/addroomtype/$i';
$route['admin/edittravelpartner/(:any)'] = 'admin/addtravelpartner/$i';
$route['admin/editroom/(:any)'] = 'admin/addroom/$i';
$route['admin/edithotel/(:any)'] = 'admin/addhotel/$i';

$route['home/thank_you'] = 'register/thank_you';

$route['home/editpartner_business/(:any)'] = 'home/partner_with_us/$i';
$route['home/editpartner_business'] = 'home/partner_with_us';

$route['admin/edit_sub_admin/(:any)'] = 'admin/add_sub_admin/$i';
$route['admin/editgallery/(:any)'] = 'admin/addgallery/$i';
$route['admin/editbanner/(:any)'] = 'admin/addbanner/$i';


$route['terms-conditions'] = 'home/term_details';
$route['privacy-policy'] = 'home/privacy_details';
$route['cancellation-policy'] = 'home/cancellation_details';
$route['faq'] = 'home/faq_details';

$route['partner-with-us'] = 'home/partner_with_us';
$route['admin/edittestimonials/(:any)'] = 'admin/addtestimonials/$i';


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;