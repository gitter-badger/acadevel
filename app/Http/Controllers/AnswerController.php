<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Question\Answer;
use App\Models\Question\Question;
use App\Models\Training;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param int $trainingId
     * @param int $questionId
     * @return array
     */
    public function index($trainingId, $questionId)
    {
        /** @var Training $training */
        $training = Training::findOrFail($trainingId);

        /** @var Question $question */
        $question = $training->questions()->findOrFail($questionId);

        $limit = (int) Input::get('limit', 25);
        $page = (int) Input::get('page', 1);

        $answers = $question->answers()->paginate($limit, ['*'], 'page', $page);

        return $answers;
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
     * @param int $questionId
     * @return Answer
     */
    public function store(Request $request, $trainingId, $questionId)
    {
        $this->validate($request, [
            'text' => 'required',
            'isCorrect' => 'required|bool',
        ]);

        /** @var Training $training */
        $training = Training::findOrFail($trainingId);

        /** @var Question $question */
        $question = $training->questions()->findOrFail($questionId);

        /** @var Answer $answer */
        $answer = $question->answers()->create($request->all());

        return $answer;
    }

    /**
     * Display the specified resource.
     *
     * @param int $trainingId
     * @param int $questionId
     * @param int $id
     * @return Answer
     */
    public function show($trainingId, $questionId, $id)
    {
        /** @var Training $training */
        $training = Training::findOrFail($trainingId);

        /** @var Question $question */
        $question = $training->questions()->findOrFail($questionId);

        /** @var Answer $answer */
        $answer = $question->answers()->findOrFail($id);

        return $answer;
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
     * @param int $questionId
     * @param int $id
     * @return Answer
     */
    public function update(Request $request, $trainingId, $questionId, $id)
    {
        /** @var Training $training */
        $training = Training::findOrFail($trainingId);

        /** @var Question $question */
        $question = $training->questions()->findOrFail($questionId);

        /** @var Answer $answer */
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
     * @param int $trainingId
     * @param int $questionId
     * @param int $id
     * @return array
     */
    public function destroy($trainingId, $questionId, $id)
    {
        /** @var Training $training */
        $training = Training::findOrFail($trainingId);

        /** @var Question $question */
        $question = $training->questions()->findOrFail($questionId);

        /** @var Answer $answer */
        $answer = $question->answers()->findOrFail($id);

        return ['success' => $answer->delete()];
    }
}
