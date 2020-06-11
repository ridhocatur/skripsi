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
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['admin/dashboard'] = "Dashboard/admin";
$route['manager/dashboard'] = "Dashboard/manager";
$route['user/dashboard'] = "Dashboard/user";

$route['bahanmasuk'] = "Bahanbantu/bahanmasuk";
$route['bahanmasuk/tambahMasuk'] = "Bahanbantu/tambahMasuk";
$route['bahanmasuk/ubahMasuk'] = "Bahanbantu/ubahMasuk";
$route['bahanmasuk/geteditMasuk'] = "Bahanbantu/geteditMasuk";
$route['bahanmasuk/hapusMasuk/(:any)'] = "Bahanbantu/hapusMasuk/$1";
$route['bahanmasuk/cariMasuk'] = "Bahanbantu/cariMasuk";

$route['kayumasuk'] = "KayuLog/kayumasuk";
$route['kayumasuk/tambahMasuk'] = "KayuLog/tambahMasuk";
$route['kayumasuk/ubahMasuk'] = "KayuLog/ubahMasuk";
$route['kayumasuk/geteditMasuk'] = "KayuLog/geteditMasuk";
$route['kayumasuk/hapusMasuk/(:any)'] = "KayuLog/hapusMasuk/$1";
$route['kayumasuk/detailMasuk/(:any)'] = "KayuLog/detailMasuk/$1";

$route['vinirmasuk'] = "Vinir/vinirmasuk";
$route['vinirmasuk/tambahMasuk'] = "Vinir/tambahMasuk";
$route['vinirmasuk/ubahMasuk'] = "Vinir/ubahMasuk";
$route['vinirmasuk/geteditMasuk'] = "Vinir/geteditMasuk";
$route['vinirmasuk/hapusMasuk/(:any)'] = "Vinir/hapusMasuk/$1";
$route['vinirmasuk/cariUkuran'] = "Vinir/cariUkuran";
$route['vinirmasuk/cariJenis'] = "Vinir/cariJenis";
$route['vinirmasuk/geteditBaku'] = "Vinir/geteditBaku";
$route['vinirmasuk/ubahBaku'] = "Vinir/ubahBaku";
$route['vinirmasuk/detailMasuk/(:any)'] = "Vinir/detailMasuk/$1";

$route['gluemix'] = "Bahanbantu/gluemix";
$route['gluemix/tambahGlue'] = "Bahanbantu/tambahGlue";
$route['gluemix/ubahGlue'] = "Bahanbantu/ubahGlue";
$route['gluemix/geteditGlue'] = "Bahanbantu/geteditGlue";
$route['gluemix/hapusGlue/(:any)'] = "Bahanbantu/hapusGlue/$1";
$route['gluemix/detailGlue/(:any)'] = "Bahanbantu/detailGlue/$1";

$route['laporan/bahanbantu/cetak_stok'] = "Laporan/stokbahan";
$route['laporan/laporanbahanbantu'] = "Laporan/laporanbahanbantu";
$route['laporan/bahanmasuk'] = "Laporan/bahanmasuk";
$route['laporan/laporanbahanmasuk'] = "Laporan/laporanbahanmasuk";
$route['laporan/bahanbantu'] = "Laporan/bahanbantu";
$route['laporan/bahanbantu'] = "Laporan/bahanbantu";