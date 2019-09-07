<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Mail\ContactParMail;
use Illuminate\Support\Facades\Mail ;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});
Route::post('/', function () {
    return view('welcome');
});
Route::resource('', 'frontofficeController');


Route::get('/home', 'HomeController@index')->name('home');
Route::resource('Admin', 'adminController');
Route::get('/loginadmin', array('as' => 'Admin.login', 'uses' => 'adminController@login'));
Route::post('/loginadmin', array('as' => 'Admin.login', 'uses' => 'adminController@login'));
Route::get('/logoutadmin', array('as' => 'Admin.logout', 'uses' => 'adminController@logout'));
Route::post('/logoutadmin', array('as' => 'Admin.logout', 'uses' => 'adminController@logout'));
Route::resource('category','categoryController');
Route::get('/searchcategory', array('as' => 'category.getSearch', 'uses' => 'categoryController@getSearch'));
Route::post('/searchcategory', array('as' => 'category.getSearch', 'uses' => 'categoryController@getSearch'));
Route::resource('employer','employerController');
Route::get('/searchemployer', array('as' => 'employer.getSearch', 'uses' => 'employerController@getSearch'));
Route::post('/searchemployer', array('as' => 'employer.getSearch', 'uses' => 'employerController@getSearch'));
Route::resource('produit','produitController');
Route::get('/searchproduit', array('as' => 'produit.getSearch', 'uses' => 'produitController@getSearch'));
Route::post('/searchproduit', array('as' => 'produit.getSearch', 'uses' => 'produitController@getSearch'));
Route::get('/profile', array('as' => 'Admin.profile', 'uses' => 'adminController@profile'));
Route::post('/profile', array('as' => 'Admin.profile', 'uses' => 'adminController@profile'));

Route::post('fileUpload',[
    'as'=> 'image.add',
    'uses' => 'adminController@fileUpload'
]);

Route::resource('slider','sliderController');
Route::get('/searchslider', array('as' => 'slider.getSearch', 'uses' => 'sliderController@getSearch'));
Route::post('/searchslider', array('as' => 'slider.getSearch', 'uses' => 'sliderController@getSearch'));
Route::resource('parametre','parametreController');


Route::get('/mailing','frontofficeController@sendMail');
Route::post('/mailing','frontofficeController@sendMail');
Route::get('/about', array('as' => 'home.about', 'uses' => 'frontofficeController@about'));
Route::post('/about', array('as' => 'home.about', 'uses' => 'frontofficeController@about'));
Route::get('/services', array('as' => 'home.service', 'uses' => 'frontofficeController@services'));
Route::post('/services', array('as' => 'home.service', 'uses' => 'frontofficeController@services'));
Route::get('/news', array('as' => 'home.news', 'uses' => 'frontofficeController@news'));
Route::post('/news', array('as' => 'home.news', 'uses' => 'frontofficeController@news'));
Route::get('/contact', array('as' => 'home.contact', 'uses' => 'frontofficeController@contact'));
Route::post('/contact', array('as' => 'home.contact', 'uses' => 'frontofficeController@contact'));
Route::resource('client','clientController');
Route::resource('inbox','inboxController');
Route::resource('offre','offreController');
Route::get('/touslesproduits', array('as' => 'home.touslesproduits', 'uses' => 'frontofficeController@touslesproduits'));
Route::post('/touslesproduits', array('as' => 'home.touslesproduits', 'uses' => 'frontofficeController@touslesproduits'));

Route::resource('goproduit', 'frontofficeController');
Route::resource('commande','commandeController');




