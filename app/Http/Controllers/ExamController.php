<?php

namespace App\Http\Controllers;

use App\Models\Exam\Attendee;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Session::has('exam_attendee_login')) {
            return redirect()->route('examLogin');
        }

        return $this->render('exam/index');
    }

    public function login()
    {
        if (Session::has('exam_attendee_login')) {
            return redirect()->route('exam');
        }

        return $this->render('exam/login');
    }

    public function logout()
    {
        Session::remove('exam_attendee_login');

        return redirect()->route('examLogin');
    }

    public function loginCheck(Request $request)
    {
        $login = $request->get('login', '');
        $validator = Validator::make($request->all(), ['login' => 'required|exists:exam_attendee,login']);

        if ($validator->fails()) {
            return redirect()->route('examLogin')->withErrors($validator);
        }

        $attendee = Attendee::where('login', '=', $login)->first();
        Session::set('exam_attendee_login', $attendee->login);

        return back();
    }
}
