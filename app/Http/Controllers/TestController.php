<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TestController extends Controller
{
    /**
     * TestController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
        parent::__construct();
    }

    // todo: delete after logout is working
    public function test()
    {
        return $this->render('test_logout');
    }
}
