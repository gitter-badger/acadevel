<?php

namespace App\Http\Controllers;

use App\Models\Attendee;
use App\Models\Training;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class AttendeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($trainingId)
    {
        $training = Training::findOrFail($trainingId);

        $limit = (int) Input::get('limit', 25);
        $page = (int) Input::get('page', 1);

        $attendees = $training->attendees;

        return $attendees;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $trainingId)
    {
        $this->validate($request, [
            'firstname' => 'required',
            'lastname' => 'required',
            'company' => '',
        ]);

        $training = Training::findOrFail($trainingId);

        $attendee = $training->attendees()->create($request->all());

        return $attendee;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($trainingId, $id)
    {
        $training = Training::findOrFail($trainingId);
        print "<pre>";
        var_dump($training->attendees);
        print "</pre>";
        exit();
        
        $attendee = $training->attendees()->find($id);

        if (!$attendee) {
            throw (new ModelNotFoundException)->setModel(Attendee::class);
        }

        return $attendee;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
