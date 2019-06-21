<?php

    Route::get('/', 'HomeController@index')->middleware('sidebar')->name('homepage');
    Route::post('search', 'HomeController@search')->name('homepage.search');
    Route::get('thanks', 'HomeController@thanks')->name('homepage.thanks');
    Route::get('reset', 'HomeController@reset')->name('homepage.reset');
    Route::post('reset', 'HomeController@postReset')->name('homepage.post-reset');
    Route::get('reset-password/{token}', 'HomeController@resetForm')->name('homepage.reset-form');
    Route::post('reset-password', 'HomeController@postResetForm')->name('homepage.post-reset-form');
    Route::get('about-us', 'HomeController@about')->name('homepage.about-page');
    Route::get('contact-us', 'HomeController@infoPage')->name('homepage.contact-page');
    Route::get('faq', 'HomeController@infoPage')->name('homepage.faq-page');
    Route::get('tnc', 'HomeController@infoPage')->name('homepage.tnc-page');


    // ===================================================================================================================================
    // ======================================================================================================   MEMBERSHIP AUTH ROUTES
    // ===================================================================================================================================
    Route::name('member.')->group(function () {

        Route::middleware('custom.auth')->get('user', 'MembershipController@user')->name('user');
        Route::post('signin', 'MembershipController@signin')->name('signin');
        Route::post('signup', 'MembershipController@signup')->name('signup');
        Route::get('signout', 'MembershipController@signout')->name('signout');
        Route::get('register', 'MembershipController@register')->name('register');
        Route::post('update', 'MembershipController@update')->name('update');

    });


    // ===================================================================================================================================
    // ======================================================================================================   BLOG ROUTES
    // ===================================================================================================================================
    Route::name('blog.')->prefix('blog')->group(function () {
        Route::middleware(['sidebar'])->group(function () {
            Route::get('post/{id}', 'BlogController@post')->name('post');
            Route::get('category/{name}', 'BlogController@category')->name('category');
            Route::get('post-on-page/{category}/{page}', 'BlogController@getNextPagePosts')->name('post-next-page');
            Route::get('tags/{name}', 'BlogController@tags')->name('tags');
            Route::get('formasi', 'BlogController@post')->name('formasi');
            Route::get('statistik', 'BlogController@post')->name('statistik');
            Route::get('taktik', 'BlogController@post')->name('taktik');
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
    Route::post('checkout-preorder', 'CartController@checkoutPreOrder')->name('carts.checkout-pre-order');
