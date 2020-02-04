<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Ajax_test;

class AjaxTestController extends Controller
{
    public function index()
    {
        $data = Ajax_test::orderBy('id', 'asc')->paginate(5);

        return view('ajax_test.index', compact('data'));
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->input(), array(
            'task'        => 'required',
            'description' => 'required',
        ));

        if ($validator->fails()) {
            return response()->json([
                'error'     => true,
                'messages'  => $validator->errors(),
            ], 422);
        }

        $data = Ajax_test::create($request->all());

        return response()->json([
            'error' => false,
            'data'  => $data
        ], 200);
    } 

    public function show($id)
    {
        $data = Ajax_test::find($id);

        return response()->json([
            'error' => false,
            'data'  => $data,

        ], 200);
    }


    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->input(), array(
            'task'        => 'required',
            'description' => 'required',
        ));

        if ($validator->fails()) {
            return response()->json([
                'error'    => true,
                'messages' => $validator->errors(),
            ], 422);
        }

        $task = Ajax_test::find($id);

        $task->task        =  $request->input('task');
        $task->description = $request->input('description');

        $task->save();

        return response()->json([
            'error' => false,
            'task'  => $task,
        ], 200);
    }

    public function destroy($id)
    {
        $data = Ajax_test::destroy($id);

        return response()->json([
            'error' => false,
            'data'  => $data
        ], 200);
    }
}
