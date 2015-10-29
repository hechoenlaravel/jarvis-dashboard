<?php

Route::group(['prefix' => 'dashboard', 'namespace' => 'Modules\Dashboard\Http\Controllers'], function()
{
	Route::get('/demo', ['as' => 'dashboard.demo', 'uses' => 'DashboardController@index']);
});