<?php

namespace App\Http\Controllers;

use App\Models\Training;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class QuestionController extends Controller
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

        $questions = $training->questions()->with('answers')->paginate($limit, ['*'], 'page', $page);

        return $questions;
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
            'text' => 'required',
        ]);

        $training = Training::findOrFail($trainingId);

        $question = $training->questions()->create($request->all());

        return $question;
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
        $question = $training->questions()->with('answers')->findOrFail($id);

        return $question;
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
    public function update(Request $request, $trainingId, $id)
    {
        $training = Training::findOrFail($trainingId);
        $question = $training->questions()->findOrFail($id);

        $this->validate($request, [
            'text' => 'required',
        ]);

        $question->fill($request->all());
        $question->save();

        return $question;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($trainingId, $id)
    {
        $training = Training::findOrFail($trainingId);
        $question = $training->questions()->findOrFail($id);

        return ['success' => $question->delete()];
    }
}
