<?php

    Route::get('/', 'HomeController@index')->name('homepage');
    Route::get('search', 'HomeController@search')->name('homepage.search');
    Route::get('thanks', 'HomeController@thanks')->name('homepage.thanks');


    // ===================================================================================================================================
    // ======================================================================================================   MEMBERSHIP AUTH ROUTES
    // ===================================================================================================================================
    Route::name('member.')->group(function () {

        Route::middleware('custom.auth')->get('user', 'HomeController@user')->name('user');
        Route::post('signin', 'MembershipController@signin')->name('signin');
        Route::post('signup', 'MembershipController@signup')->name('signup');
        Route::get('signout', 'MembershipController@signout')->name('signout');
        // Route::get('login', 'MembershipController@login')->name('login');
        Route::get('register', 'MembershipController@register')->name('register');

    });


    // ===================================================================================================================================
    // ======================================================================================================   BLOG ROUTES
    // ===================================================================================================================================
    Route::name('blog.')->prefix('blog')->group(function () {
        
        Route::get('post', 'HomeController@post')->name('post');
        Route::get('category', 'HomeController@category')->name('category');
        Route::get('tags', 'HomeController@tags')->name('tags');

    });


    // ===================================================================================================================================
    // ======================================================================================================   PRODUCT ROUTES
    // ===================================================================================================================================
    Route::name('products.')->prefix('products')->group(function () {
        
        Route::get('/', 'HomeController@products')->name('index');
        Route::get('page/{page}', 'ProductController@getNextPageProducts')->name('next-page');
        Route::get('item/{id}', 'HomeController@product')->name('single-product');

    });


    Route::post('checkout', 'CartController@checkout')->name('carts.checkout');
