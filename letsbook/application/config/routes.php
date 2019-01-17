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


// +++++++++++++++++++++++++++  WEB   +++++++++++++++++++++++++++

//login
$route['login']='Web_login_controller/Login_web';

//Penyelenggara
$route['penyelenggara']='Web_Penyelenggara_controller/setpenyelenggaraView';
$route['penyelenggara/search']['POST']='Web_Penyelenggara_controller/setSearchPenyelenggaraView';
$route['penyelenggara/add']['POST']='Web_Penyelenggara_controller/insert_penyelenggara';
$route['penyelenggara/detail/(:num)']='Web_Penyelenggara_controller/getDetailPenyelenggara/$1';
$route['penyelenggara/update/(:num)']='Web_Penyelenggara_controller/update/$1';
$route['penyelenggara/update_penyelenggara']['POST']='Web_Penyelenggara_controller/update_penyelenggara';
$route['penyelenggara/update_identitas']['POST']='Web_Penyelenggara_controller/update_identitas';
$route['penyelenggara/update_legalitas']['POST']='Web_Penyelenggara_controller/update_legalitas';
$route['penyelenggara/getid']['GET']='Web_Penyelenggara_controller/GetIdPenyelenggara';

//pelanggan
$route['pelanggan']='Web_Pelanggan_controller/setPelangganView';
$route['pelanggan/search']['POST']='Web_Pelanggan_controller/setSearchPelangganView';
$route['pelanggan/resetPassword']['POST']='Web_Pelanggan_controller/update_Pelanggan';

//kategori
$route['kategori']='Web_Kategori_controller/setKategoriView';
$route['kategori/add']['POST']='Web_Kategori_controller/insert_kategori';
$route['kategori/update']['POST']='Web_Kategori_controller/update_kategori';


//Transaksi
$route['transaksi']='Web_Transaksi_Controller/setTransaksiView';
$route['transaksi/detail/(:num)']='Web_Transaksi_Controller/getDetailTransaksi/$1';
$route['transaksi/search']['POST']='Web_Transaksi_Controller/setSearchTransaksiView';

//Transaksi Refund
$route['transaksi/refund']='Web_Transaksi_Refund_Controller/setTransaksiRefundView';
$route['transaksi/refund/search']['POST']='Web_Transaksi_Refund_Controller/setSearchTransaksiRefundView';
$route['transaksi/refund/detail/(:num)']='Web_Transaksi_Refund_Controller/getDetailTransaksi/$1';


//Event
$route['event']='Web_Event_Controller/setEventView';
$route['event/detail/(:num)']='Web_Event_Controller/getDetailEvent/$1';
$route['event/Tambah']='Web_Event_Controller/Tambah';
$route['event/add']='Web_Event_Controller/insert_event';
$route['event/update/(:num)']='Web_Event_Controller/update/$1';
$route['event/update_event']['POST']='Web_Event_Controller/update_event';
$route['event/update_izin']['POST']='Web_Event_Controller/update_izin';
$route['event/getid']['GET']='Web_Event_Controller/GetIdEvent';
$route['event/search']['POST']='Web_Event_Controller/setSearchEventView';

//event Selesai
$route['eventselesai']='Web_EventSelesai_Controller/setEventView';
$route['eventselesai/detail/(:num)']='Web_EventSelesai_Controller/getDetailEvent/$1';
$route['eventselesai/search']['POST']='Web_EventSelesai_Controller/setSearchEventSelesaiView';
$route['eventselesai/getid']['GET']='Web_EventSelesai_Controller/GetIdEvent';
$route['eventselesai/update_transfer']['POST']='Web_EventSelesai_Controller/update_transfer';
































// +++++++++++++++++++++++++++  Mobile   +++++++++++++++++++++++++++

//---------------------------   login   -----------------------------
$route['pengguna/login']['POST']='Mobile_Login_Controller/Login_mobile';

//-------------------------    pelanggan     ---------------------------

$route['pelanggan/register']['POST']='Mobile_Pelanggan_Controller/RegisterPelanggan';

//-------------------------    event     ---------------------------
//
//pelanggan View

$route['event/listbytime']['GET']='Mobile_Event_Controller/GetListEventbyTime';// Home Pelangan
$route['event/listbykategori']['POST']='Mobile_Event_Controller/GetListEventbyKategori'; // Home Pelangan
$route['event/detail']['POST']='Mobile_Event_Controller/GetDetailEvent'; // Detail event

//penyelenggara View
//
$route['event/listallevent']['POST']='Mobile_Event_Controller/GetListAllEvent'; // Home Penyelenggara
$route['event/listaktifevent']['POST']='Mobile_Event_Controller/GetListAktifEvent';

//Transaksi
$route['transaksi/listaktiftransaksi']['POST']='Mobile_Transaksi_Controller/GetListAktifTransaksi'; //tampil Tiketku
$route['transaksi/listrefundtransaksi']['POST']='Mobile_Transaksi_Controller/GetListRefundTransaksi'; //tampil Refund
$route['transaksi/listalltransaksi']['POST']='Mobile_Transaksi_Controller/GetListAllTransaksi'; // Tampil transaksi

$route['transaksi/dotransaksi']['POST']='Mobile_Transaksi_Controller/InsertTransaksi'; // Tampil transaksi

$route['transaksi/refundmob']['POST']='Mobile_Transaksi_Controller/RefundTransaksi'; // Tampil transaksi

$route['transaksi/refundmoblist']['POST']='Mobile_Transaksi_Controller/GetListRefundTransaksi'; // Tampil transaksi
