<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Training;
use Illuminate\Contracts\Validation\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class TrainingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return array
     */
    public function index()
    {
        $limit = (int) Input::get('limit', 25);
        $page = (int) Input::get('page', 1);

        return Training::paginate($limit, ['*'], 'page', $page);
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
     * @return Training
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:training|min:3',
        ]);

        return Training::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @param Request $request
     * @return View
     */
    public function show($id, Request $request)
    {
        /** @var Training $training */
        $training = Training::with('exams')->findOrFail($id);

        if ($request->wantsJson()) {
            return $training;
        }

        return $this->render('training/index', ['training' => $training]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @param Request $request
     * @return View
     */
    public function edit($id, Request $request)
    {
        /** @var Training $training */
        $training = Training::findOrFail($id);

        $training->fill($request->old());

        return $this->render('training/edit', ['training' => $training]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return $this|Training
     * @throws ValidationException
     */
    public function update(Request $request, $id)
    {
        /** @var Training $training */
        $training = Training::findOrFail($id);

        /** @var \Illuminate\Validation\Validator $validator */
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:training,name,'.$id.'|min:3'
        ]);

        $training->fill($request->all());
        $errors = [];

        if (!$validator->fails()) {
            $training->save();
            $request->session()->flash('saved', true);
        }

        if ($request->wantsJson()) {
            if ($validator->fails()) {
                throw new ValidationException($validator);
            }

            return $training;
        }

        return redirect()->route('trainings.edit', [$training->id])->withInput()->withErrors($errors);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return array
     */
    public function destroy($id)
    {
        /** @var Training $training */
        $training = Training::findOrFail($id);

        return ['success' => $training->delete()];
    }
}
