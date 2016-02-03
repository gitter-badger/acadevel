<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class FeedbackController extends Controller
{
    /**
     * @return View
     */
    public function index()
    {
        return $this->render('feedback/index');
    }
}
