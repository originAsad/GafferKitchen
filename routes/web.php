<?php

// use Illuminate\Http\Request;

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

Route::get('/','HomeController@index')->name('welcome');

Route::post('/reservation','ReservationController@reserve')->name('reservation.reserve');

Route::get('/checkout/{id}','HomeController@checkout')
->name('checkout');

Route::post('/payment/{id}','HomeController@payment')->name('payment');

//Route for Message

//In the form i have given the route contact.send thats
// why here but in controller its ContactController@sendMessage

Route::post('/contact','ContactController@sendMessage')->name('contact.send');

// Route::resource('/','HomeController');
//
Auth::routes();


Route::group(['prefix'=>'admin', //If i change this to gaffer then Only the content will be avalable
             'middleware'=>'auth',
             'namespace'=>'admin'],function(){
                

                //Here i have use DashboardController@index 
                //because there is no model for this thats why
                // i have included its name and Index function 
                //and its a simple controller and no Resource controller

                Route::get('dashboard',
                'DashboardController@index')
                ->name('admin.dashboard');

                // Route::get('dashboard','DashboardController@index')->name('admin.dashboard');

                //its Slider model is maked first or its Controller was made with Migrations thats
                //why is available thats  and no need to call for index function
                Route::resource('slider',
                'SliderController');
                
                //For the Category Route
                Route::resource('category',
                'CategoryController');


                //For Item Routes
                Route::resource('item',
                'ItemController');
            
                // For Reservation Controller
                
                Route::get('reservation','ReservationController@index')
                ->name('reservation.index');

                Route::post('/reservation/{id}','ReservationController@status')
                ->name('reservation.status');

                Route::delete('/reservation/{id}','ReservationController@destroy')
                ->name('reservation.destroy');
                
                //For Contact Controller
                Route::get('contact','ContactController@index')
                ->name('contact.index');

                //With Id
                Route::get('contact/{id}','ContactController@show')
                ->name('contact.show');
                //Destroy by Id
                Route::delete('contact/{id}','ContactController@destroy')
                ->name('contact.destroy');
             });