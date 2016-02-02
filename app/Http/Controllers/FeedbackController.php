<?php

namespace App\Http\Controllers;

class FeedbackController extends Controller
{
    public function index()
    {
        return $this->render('feedback/index');
    }
}
