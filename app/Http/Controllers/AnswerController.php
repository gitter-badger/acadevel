<?php

namespace App\Http\Controllers;

use App\Models\Training;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($trainingId, $questionId)
    {
        $training = Training::findOrFail($trainingId);
        $question = $training->questions()->findOrFail($questionId);

        $limit = (int) Input::get('limit', 25);
        $page = (int) Input::get('page', 1);

        $answers = $question->answers()->paginate($limit, ['*'], 'page', $page);

        return $answers;
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
    public function store(Request $request, $trainingId, $questionId)
    {
        $this->validate($request, [
            'text' => 'required',
            'isCorrect' => 'required|bool',
        ]);

        $training = Training::findOrFail($trainingId);
        $question = $training->questions()->findOrFail($questionId);

        $answer = $question->answers()->create($request->all());

        return $answer;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($trainingId, $questionId, $id)
    {
        $training = Training::findOrFail($trainingId);
        $question = $training->questions()->findOrFail($questionId);

        $answer = $question->answers()->findOrFail($id);

        return $answer;
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
    public function update(Request $request, $trainingId, $questionId, $id)
    {
        $training = Training::findOrFail($trainingId);
        $question = $training->questions()->findOrFail($questionId);

        $answer = $question->answers()->findOrFail($id);

        $this->validate($request, [
            'text' => 'required',
            'isCorrect' => 'required|bool',
        ]);

        $answer->fill($request->all());
        $answer->save();

        return $answer;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($trainingId, $questionId, $id)
    {
        $training = Training::findOrFail($trainingId);
        $question = $training->questions()->findOrFail($questionId);

        $answer = $question->answers()->findOrFail($id);

        return ['success' => $answer->delete()];
    }
}
