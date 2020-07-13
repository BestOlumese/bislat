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

Route::get('/', [
    'uses' => 'FrontEndController@index',
    'as' => 'index'
]);

Route::get('/about', [
    'uses' => 'FrontEndController@about',
    'as' => 'about'
]);

Route::get('/contact', [
    'uses' => 'FrontEndController@contact',
    'as' => 'contact'
]);

Route::get('redirect', 'SocialAuthController@redirect');
Route::get('callback', 'SocialAuthController@callback');

Route::post('/users/logout', 'Auth\LoginController@userLogout');

Route::prefix('customer')->group(function () {
    Route::get('/dashboard', 'DashboardController@index')->name('customer.dashboard');
    Route::get('/myaccount', 'DashboardController@myaccount')->name('customer.myaccount');
    Route::post('/myaccount/update/{id}', 'DashboardController@myaccount_update')->name('customer.myaccount.update');
    Route::get('/changepassword', 'DashboardController@changepassword')->name('customer.changepassword');
    Route::post('/changepassword/update/{id}', 'DashboardController@changepassword_update')->name('customer.changepassword.update');
    Route::get('/register', 'CustomerAuthController@showregisterform')->name('customer.register');
    Route::post('/register/store', 'CustomerAuthController@register')->name('customer.register.store');
    Route::post('/logout', 'CustomerAuthController@logout')->name('customer.logout');

    Route::get('/login', 'CustomerAuthController@showloginform')->name('customer.login');
    Route::post('/login/store', 'CustomerAuthController@login')->name('customer.login.store');
});

Route::get('/results', function(){
    $products = \App\Product::where('title','like', '%' . request('query') . '%', 'or', 'keyword','like', '%' . request('query') . '%')->paginate(16);


    return view('results')->with('products', $products);
});

Route::get('/category/{slug}', [
    'uses' => 'FrontEndController@subcategory',
    'as' => 'frontcategory'
]);

Route::get('/product/{slug}', [
    'uses' => 'FrontEndController@product',
    'as' => 'productview'
]);

Route::post('/cart/add', [
    'uses' => 'ShoppingController@add_to_cart',
    'as' => 'cart.add'
]);

Route::get('/wishlist', [
    'uses' => 'WishListController@wishlist',
    'as' => 'wishlist'
]);

Route::post('/wishlist/add', [
    'uses' => 'WishListController@add_to_wishlist',
    'as' => 'wishlist.add'
]);

Route::get('/wishlist/delete/{productid}/{userid}', [
    'uses' => 'WishListController@wishlist_delete',
    'as' => 'wishlist.delete'
]);

Route::get('/wishlist/delete/{userid}', [
    'uses' => 'WishListController@wishlist_delete_all',
    'as' => 'wishlist.delete_all'
]);

Route::get('/cart', [
    'uses' => 'ShoppingController@cart',
    'as' => 'cart'
]);

Route::get('/cart/delete/{id}', [
    'uses' => 'ShoppingController@cart_delete',
    'as' => 'cart.delete'
]);

Route::get('cart/incr/{id}/{qty}', [
    'uses' => 'ShoppingController@incr',
    'as' => 'cart.incr'
]);

Route::get('cart/decr/{id}/{qty}', [
    'uses' => 'ShoppingController@decr',
    'as' => 'cart.decr'
]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

    Route::get('/category', [
        'uses' => 'CategoryController@index',
        'as' => 'category'
    ]);

    Route::post('/category/store', [
        'uses' => 'CategoryController@store',
        'as' => 'category.store'
    ]);

    Route::get('/category/edit/{id}', [
        'uses' => 'CategoryController@edit',
        'as' => 'category.edit'
    ]);

    Route::post('/category/update/{id}', [
        'uses' => 'CategoryController@update',
        'as' => 'category.update'
    ]);

    Route::get('/category/delete/{id}', [
        'uses' => 'CategoryController@destroy',
        'as' => 'category.destroy'
    ]);

    Route::get('/subcategory', [
        'uses' => 'SubcategoryController@index',
        'as' => 'subcategory'
    ]);

    Route::post('/subcategory/store', [
        'uses' => 'SubcategoryController@store',
        'as' => 'subcategory.store'
    ]);

    Route::get('/subcategory/edit/{id}', [
        'uses' => 'SubcategoryController@edit',
        'as' => 'subcategory.edit'
    ]);

    Route::post('/subcategory/update/{id}', [
        'uses' => 'SubcategoryController@update',
        'as' => 'subcategory.update'
    ]);

    Route::get('/subcategory/delete/{id}', [
        'uses' => 'SubcategoryController@destroy',
        'as' => 'subcategory.destroy'
    ]);

    Route::get('/product', [
        'uses' => 'ProductsController@index',
        'as' => 'product'
    ]);

    Route::get('/product/create', [
        'uses' => 'ProductsController@create',
        'as' => 'product.create'
    ]);

    Route::post('/product/store', [
        'uses' => 'ProductsController@store',
        'as' => 'product.store'
    ]);

    Route::get('/product/edit/{id}', [
        'uses' => 'ProductsController@edit',
        'as' => 'product.edit'
    ]);

    Route::post('/product/update/{id}', [
        'uses' => 'ProductsController@update',
        'as' => 'product.update'
    ]);

    Route::get('/product/delete/{id}', [
        'uses' => 'ProductsController@destroy',
        'as' => 'product.destroy'
    ]);

    Route::get('/product/publish/{id}', [
        'uses' => 'ProductsController@publish',
        'as' => 'product.publish'
    ]);

    Route::get('/product/unpublish/{id}', [
        'uses' => 'ProductsController@unpublish',
        'as' => 'product.unpublish'
    ]);

    Route::get('/profile', [
        'uses' => 'ProfilesController@profile',
        'as' => 'profile'
    ]);

    Route::post('/profile/update/{id}', [
        'uses' => 'ProfilesController@update',
        'as' => 'profile.update'
    ]);

});
