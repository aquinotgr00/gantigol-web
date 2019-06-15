<?php

    Route::get('/', 'HomeController@index')->middleware('sidebar')->name('homepage');
    Route::post('search', 'HomeController@search')->name('homepage.search');
    Route::get('thanks', 'HomeController@thanks')->name('homepage.thanks');
    Route::get('reset', 'HomeController@reset')->name('homepage.reset');
    Route::post('reset', 'HomeController@postReset')->name('homepage.post-reset');
    Route::get('reset-password/{token}', 'HomeController@resetForm')->name('homepage.reset-form');
    Route::post('reset-password', 'HomeController@postResetForm')->name('homepage.post-reset-form');


    // ===================================================================================================================================
    // ======================================================================================================   MEMBERSHIP AUTH ROUTES
    // ===================================================================================================================================
    Route::name('member.')->group(function () {

        Route::middleware('custom.auth')->get('user', 'MembershipController@user')->name('user');
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
        Route::middleware(['sidebar'])->group(function () {
            Route::get('post/{id}', 'BlogController@post')->name('post');
            Route::get('category/{name}', 'BlogController@category')->name('category');
            Route::get('post-on-page/{category}/{page}', 'BlogController@getNextPagePosts')->name('post-next-page');
            Route::get('tags', 'BlogController@tags')->name('tags');
        });
    });


    // ===================================================================================================================================
    // ======================================================================================================   PRODUCT ROUTES
    // ===================================================================================================================================
    Route::name('products.')->prefix('products')->group(function () {
        
        Route::get('/', 'ProductController@products')->name('index');
        Route::get('page/{page}', 'ProductController@getNextPageProducts')->name('next-page');
        Route::get('item/{id}', 'ProductController@product')->name('single-product');

    });


    Route::get('checkout', 'CartController@checkout')->name('carts.checkout');
