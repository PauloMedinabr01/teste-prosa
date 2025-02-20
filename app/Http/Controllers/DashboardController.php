<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Class DashboardController
 * @package App\Http\Controllers
 */
class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function index(Request $request)
    {
        return view('dashboard');
    }
}
