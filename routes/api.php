<?php

// Route::post('signin', 'MembershipController@signin')->name('member.api.signin');
Route::get('subdistrict', 'MembershipController@apiSubdistrict')->name('member.api-subdistrict');

// CART ROUTES
Route::name('carts.')->prefix('carts')->group(function () {
    Route::post('store', 'CartController@store')->name('post');
    Route::post('update/{id}', 'CartController@update')->name('update');
    Route::get('items/{id}/{checked?}', 'CartController@getItems')->name('getItems');
    Route::post('item-delete/{id}', 'CartController@deleteItem')->name('deleteItem');
    Route::post('api/carts/get-cart-id', 'CartController@getCartId')->name('getCartId');
    Route::post('apply-promo', 'CartController@applyPromo')->name('apply-promo');
    Route::post('checkout', 'CartController@postCheckout')->name('checkout');
    Route::post('checkout-preorder', 'CartController@postCheckoutPreorder')->name('checkout-preorder');
    Route::get('courier-cost/{id}/{courier}/{weight}', 'CartController@getCourierCost')->name('courier-cost');
});