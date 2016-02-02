<?php

namespace App\Http\Controllers;

use App\Models\Attendee;
use App\Models\Training;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class AttendeeController extends Controller
{
    public function getList(Request $request, $trainingId)
    {
        $training = Training::findOrFail($trainingId);

        $limit = $request->get('limit', 25);
        $page = $request->get('page', 1);

        $attendees = $training->attendees()->paginate($limit, ['*'], 'page', $page);

        return $attendees;
    }

    public function getOne(Request $request, $trainingId, $id)
    {
        $training = Training::findOrFail($trainingId);

        $attendee = $training->attendees()->find($id);

        if (!$attendee) {
            throw (new ModelNotFoundException)->setModel(Attendee::class);
        }

        return $attendee->getAttributes();
    }

    public function create(Request $request, $trainingId)
    {
        $this->validate($request, [
            'firstname' => 'required',
            'lastname' => 'required',
            'company' => '',
        ]);

        $training = Training::findOrFail($trainingId);

        $attendee = $training->attendees()->create($request->all());

        return $attendee->getAttributes();
    }
}
