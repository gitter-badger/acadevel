<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Attendee;
use App\Models\Training;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class AttendeeController extends Controller
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

        $attendees = $training->attendees()->paginate($limit, ['*'], 'page', $page);

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
    public function store(Request $request, $trainingId)
    {
        $this->validate($request, [
            'firstname' => 'required',
            'lastname' => 'required',
            'company' => '',
        ]);

        /** @var Training $training */
        $training = Training::findOrFail($trainingId);

        /** @var Attendee $attendee */
        $attendee = $training->attendees()->create($request->all());

        return $attendee;
    }

    /**
     * Display the specified resource.
     *
     * @param int $trainingId
     * @param int $id
     * @return Attendee
     */
    public function show($trainingId, $id)
    {
        /** @var Training $training */
        $training = Training::findOrFail($trainingId);

        /** @var Attendee $attendee */
        $attendee = $training->attendees()->findOrFail($id);

        return $attendee;
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
     * @param int $trainingId
     * @param int $id
     * @return Attendee
     */
    public function update(Request $request, $trainingId, $id)
    {
        /** @var Training $training */
        $training = Training::findOrFail($trainingId);

        /** @var Attendee $attendee */
        $attendee = $training->attendees()->findOrFail($id);

        $attendee->fill($request->all());
        $attendee->save();

        return $attendee;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $trainingId
     * @param int $id
     * @return array
     */
    public function destroy($trainingId, $id)
    {
        /** @var Training $training */
        $training = Training::findOrFail($trainingId);

        /** @var Attendee $attendee */
        $attendee = $training->attendees()->findOrFail($id);

        return ['success' => $attendee->delete()];
    }
}
