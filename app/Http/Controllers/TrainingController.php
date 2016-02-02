<?php

namespace App\Http\Controllers;

use App\Models\Training;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TrainingController extends Controller
{
    public function getList(Request $request)
    {
        $limit = $request->get('limit', 25);
        $page = $request->get('page', 1);

        return DB::collection('training')->paginate($limit, ['*'], 'page', $page);
    }

    public function getOne(Request $request, $id)
    {
        $training = Training::findOrFail($id);

        return $training->getAttributes();
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:training,name'
        ]);

        $training = Training::create($request->all());

        return $training;
    }
}
