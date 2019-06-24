<?php

Route::resource('products', 'ProductController');
Route::resource('orders', 'OrderController');
Route::redirect('/', 'products');
