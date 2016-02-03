<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Attendee;
use App\Models\Exam\Exam;
use App\Models\Training;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class ExamAttendeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param int $trainingId
     * @return array
     */
    public function index($trainingId, $examId)
    {
        /** @var Training $training */
        $training = Training::findOrFail($trainingId);

        /** @var Exam $exam */
        $exam = $training->exams()->findOrFail($examId);

        $limit = (int) Input::get('limit', 25);
        $page = (int) Input::get('page', 1);

        $attendees = $exam->attendees()->paginate($limit, ['*'], 'page', $page);

        return $attendees;
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
     * @param int $trainingId
     * @return Attendee
     */
    public function store(Request $request, $trainingId, $examId)
    {
        $this->validate($request, [
            'attendee_id' => 'required|exists:attendee',
        ]);

        /** @var Training $training */
        $training = Training::findOrFail($trainingId);

        /** @var Exam $exam */
        $exam = $training->exams()->findOrFail($examId);

        /** @var Attendee $attendee */
        $attendee = $exam->attendees()->create($request->all());

        return $attendee;
    }

    /**
     * Display the specified resource.
     *
     * @param int $trainingId
     * @param int $examId
     * @param int $id
     * @return Attendee
     */
    public function show($trainingId, $examId, $id)
    {
        /** @var Training $training */
        $training = Training::findOrFail($trainingId);

        /** @var Exam $exam */
        $exam = $training->exams()->findOrFail($examId);

        /** @var Attendee $attendee */
        $attendee = $exam->attendees()->findOrFail($id);

        return $attendee;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $trainingId
     * @param int $examId
     * @param int $id
     * @return array
     */
    public function destroy($trainingId, $examId, $id)
    {
        /** @var Training $training */
        $training = Training::findOrFail($trainingId);

        /** @var Exam $exam */
        $exam = $training->exams()->findOrFail($examId);

        /** @var Attendee $attendee */
        $attendee = $exam->attendees()->findOrFail($id);

        return ['success' => $attendee->delete()];
    }
}
