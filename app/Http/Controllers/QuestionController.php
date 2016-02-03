<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Question\Question;
use App\Models\Training;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class QuestionController extends Controller
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

        $questions = $training->questions()->with('answers')->paginate($limit, ['*'], 'page', $page);

        return $questions;
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
     * @return Question
     */
    public function store(Request $request, $trainingId)
    {
        $this->validate($request, [
            'text' => 'required',
        ]);

        /** @var Training $training */
        $training = Training::findOrFail($trainingId);

        /** @var Question $question */
        $question = $training->questions()->create($request->all());

        return $question;
    }

    /**
     * Display the specified resource.
     *
     * @param int $trainingId
     * @param int $id
     * @return Question
     */
    public function show($trainingId, $id)
    {
        /** @var Training $training */
        $training = Training::findOrFail($trainingId);

        /** @var Question $question */
        $question = $training->questions()->with('answers')->findOrFail($id);

        return $question;
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
     * @return Question
     */
    public function update(Request $request, $trainingId, $id)
    {
        /** @var Training $training */
        $training = Training::findOrFail($trainingId);

        /** @var Question $question */
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
     * @param int $trainingId
     * @param int $id
     * @return array
     */
    public function destroy($trainingId, $id)
    {
        /** @var Training $training */
        $training = Training::findOrFail($trainingId);

        /** @var Question $question */
        $question = $training->questions()->findOrFail($id);

        return ['success' => $question->delete()];
    }
}
