<?php

use Illuminate\Support\Facades\Route;

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::post('direction/{direction}/move', 'DirectionCrudController@move');
    Route::post('direction/{direction}/publish', 'DirectionCrudController@publish');
    Route::crud('direction', 'DirectionCrudController');
    Route::crud('category', 'CategoryCrudController');
    Route::crud('document', 'DocumentCrudController');
    Route::get('listener/export', 'ListenerCrudController@export')->name('crud-listener.export');
    Route::get('listener/export_ino', 'ListenerCrudController@export_ino')->name('crud-listener.export_ino');
    Route::get('listener/export_ino_count', 'ListenerCrudController@export_ino_count')->name('crud-listener.export_ino_count');
    Route::get('listener/export_duplicate_error', 'ListenerCrudController@export_duplicate_error')->name('crud-listener.export_duplicate_error');

    Route::crud('listener', 'ListenerCrudController');
    Route::crud('news', 'NewsCrudController');
}); // this should be the absolute last line of this file
