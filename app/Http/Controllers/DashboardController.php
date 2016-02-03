<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * @return View
     */
    public function index()
    {
        return $this->render('dashboard');
    }
}
