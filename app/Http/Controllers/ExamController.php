<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Exam\Attendee;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator as ValidatorFacades;
use Illuminate\View\View;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return RedirectResponse|View
     */
    public function index()
    {
        if (!Session::has('exam_attendee_login')) {
            return redirect()->route('examLogin');
        }

        return $this->render('exam/index');
    }

    /**
     * @return RedirectResponse|View
     */
    public function login()
    {
        if (Session::has('exam_attendee_login')) {
            return redirect()->route('exam');
        }

        return $this->render('exam/login');
    }

    /**
     * @return RedirectResponse
     */
    public function logout()
    {
        Session::remove('exam_attendee_login');

        return redirect()->route('examLogin');
    }

    /**
     * @param Request $request
     * @return $this|RedirectResponse
     */
    public function loginCheck(Request $request)
    {
        $login = $request->get('login', '');
        /** @var Validator $validator */
        $validator = ValidatorFacades::make($request->all(), ['login' => 'required|exists:exam_attendee,login']);

        if ($validator->fails()) {
            return redirect()->route('examLogin')->withErrors($validator);
        }

        /** @var Attendee $attendee */
        $attendee = Attendee::where('login', '=', $login)->first();
        Session::set('exam_attendee_login', $attendee->login);

        return back();
    }
}
