<?php

namespace App\Http\Controllers;

use App\Models\Training;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class TrainingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $limit = (int) Input::get('limit', 25);
        $page = (int) Input::get('page', 1);

        return Training::paginate($limit, ['*'], 'page', $page);
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
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3',
            'maxAttendees' => 'integer|min:1'
        ]);

        return Training::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $training = Training::with('attendees')->findOrFail($id);

        if ($request->wantsJson()) {
            return $training;
        }

        return $this->render('training/index', ['training' => $training]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        $training = Training::findOrFail($id);
        $errors = null;

        if ($request->method() === Request::METHOD_POST) {
            $validator = Validator::make($request->all(), [
                'name' => 'required|unique:trainings,name,'.$id.'|min:3',
                'maxAttendees' => 'min:1|integer'
            ]);

            $training->fill($request->all());

            if (!$validator->fails()) {
                $training->save();

                $request->session()->flash('saved', true);

                return redirect()->route('trainings.edit', [$training->id, $training->slug]);
            } else {
                $errors = $validator->errors();
            }
        }

        return $this->render('training/edit', ['training' => $training, 'errors' => $errors]);
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
        $training = Training::findOrFail($id);

        $this->validate($request, [
            'name' => 'required|unique:trainings,name,'.$id.'|min:3',
            'maxAttendees' => 'min:1|integer'
        ]);

        $training->fill($request->all());
        $training->save();

        return $training;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $training = Training::findOrFail($id);

        return ['success' => $training->delete()];
    }
}
