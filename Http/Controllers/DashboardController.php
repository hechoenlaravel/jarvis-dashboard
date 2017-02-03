<?php namespace Modules\Dashboard\Http\Controllers;

use Illuminate\Contracts\Auth\Access\Gate;
use Nwidart\Modules\Routing\Controller;

/**
 * Class DashboardController
 * @package Modules\Dashboard\Http\Controllers
 */
class DashboardController extends Controller {

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
	{
		return view('dashboard::index');
	}
	
}