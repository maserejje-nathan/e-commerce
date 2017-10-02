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


use ConsoleTVs\Charts\Facades\Charts;
use Illuminate\Support\Facades\DB;

Route::get('/faqs','MavenController@index');
Route::get('/', 'FrontController@index')->name('home');
Route::get('/about','FrontController@about')->name('about');
Route::get('/shirts', 'FrontController@shirts')->name('shirts');
Route::get('/shirt/{id}', 'FrontController@shirt')->name('shirt');
Route::post('/newsletter','FrontController@newsletter')->name('newsletter');
Route::get('/questions','FrontController@faqpage')->name('questions');
Route::post('/search','FrontController@search')->name('search');
Route::get('/secure','FrontController@secure')->name('secure');
Route::get('/warranty','FrontController@warranty')->name('warranty');
Route::get('/deliver','FrontController@deliver')->name('deliver');
Route::get('/services','FrontController@services')->name('services');
Route::post('/filter_price','ProductsController@filter_price')->name('filter_price');
Route::post('/filter_brand','ProductsController@filter_brand')->name('filter_brand');
Route::post('/filter_category','ProductsController@filter_category')->name('filter_category');

Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');

//Route::get('/home', 'HomeController@index');
Route::resource('/cart', 'CartController');
Route::get('/cart/add-item/{id}', 'CartController@addItem')->name('cart.addItem');

Route::group(['prefix' => 'admin', 'middleware' => ['auth','admin']], function () {
    \Sukohi\Maven\Maven::route('en');
    Route::post('toggledeliver/{orderId}', 'OrderController@toggledeliver')->name('toggle.deliver');
    Route::get('/export','ProductsController@export')->name('export');
    Route::get('/services','ServicesController@index')->name('services');
    Route::get('/services/add','ServicesController@create')->name('services.add');
    Route::post('/services/save','ServicesController@save')->name('services.save');
    Route::post('/services/destroy/{id}','ServicesController@destroy')->name('services.destroy');
    Route::get('/services/edit/{id}','ServicesController@edit')->name('services.edit');
    Route::put('/service/update','ServicesController@update')->name('service.update');

    Route::get('/slide/index','SlideController@index')->name('slide.index');
    Route::get('/slide/create','SlideController@create')->name('slide.create');
    Route::post('/slide/save','SlideController@save')->name('slide.save');

    Route::get('/', function () {
        $chart = Charts::multiDatabase('line', 'morris')
            ->title('Summary Graph')
            ->dataset('Users', \App\User::all())
            ->dataset('Products', \App\Product::all())
            ->dataset('Categories',\App\Category::all())
            ->dataset('Orders',\App\Order::all())
            ->dataset('Services',\App\service::all())
            ->groupByMonth();

        $users = DB::table('users')->count();
        $products = DB::table('products')->where('availability','>',0)->sum('availability');
        $cat = DB::table('categories')->count();
        $pend = DB::table('orders')->where('delivered','=',0)->count();
        $del = DB::table('orders')->where('delivered','=',1)->count();
        $svr = DB::table('services')->count();


         $data = array('chart' => $chart,
                        'users'=> $users,
                        'products'=>$products,
                        'cat'=>$cat,
                        'pend'=>$pend,
                        'del'=>$del,
                        'svr'=>$svr);

        return view('admin.index',with($data));
    })->name('admin.index');

    Route::resource('product','ProductsController');
    Route::resource('category','CategoriesController');

    Route::get('orders/{type?}', 'OrderController@Orders');

    Route::post('/slide/del/{id}','SlideController@del')->name('slide.del');
    Route::get('/slide/edit/{id}','SlideController@edit')->name('slide.edit');
    Route::put('/slide/update','SlideController@update')->name('slide.update');

});
Route::resource('address','AddressController');

//Route::get('checkout','CheckoutController@step1');
Route::group(['middleware' => 'auth'], function () {
    Route::get('shipping-info','CheckoutController@shipping')->name('checkout.shipping');
    Route::post('address-store','AddressController@store')->name('address.store');
});


Route::get('payment','CheckoutController@payment')->name('checkout.payment');
Route::post('store-payment','CheckoutController@storePayment')->name('payment.store');


Route::get('login/{provider}', 'Auth\RegisterController@redirectToProvider');
Route::get('login/{provider}/callback', 'Auth\RegisterController@handleProviderCallback');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

