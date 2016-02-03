<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Exam\Exam;
use App\Models\Training;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param int $trainingId
     * @return array
     */
    public function index($trainingId)
    {
        /** @var Training $training */
        $training = Training::findOrFail($trainingId);

        $limit = (int) Input::get('limit', 25);
        $page = (int) Input::get('page', 1);

        return $training->exams()->paginate($limit, ['*'], 'page', $page);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $trainingId
     * @param int $id
     * @return Exam
     */
    public function show($trainingId, $id)
    {
        /** @var Training $training */
        $training = Training::findOrFail($trainingId);

        /** @var Exam $exam */
        $exam = $training->exams()->with('attendees')->findOrFail($id);

        return $exam;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     */
    public function destroy($id)
    {
        //
    }
}
