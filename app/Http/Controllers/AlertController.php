<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

use App\Test;
use Illuminate\Support\Facades\Validator;

class AlertController extends Controller
{
    public function index(Request $request)
    {
        switch ($request->alert) {
            case 'success':
                Alert::success('Title','Lorem Lorem Lorem')->persistent(true,true);
                break;
        
            case 'warning':
                Alert()->warning('Title','Lorem Lorem Lorem')->persistent(true,true);
                break;

            case 'info':
                Alert()->info('Title','Lorem Lorem Lorem');
                break;

            case 'error':
                Alert()->error('Title','Lorem Lorem Lorem')
                    ->showConfirmButton('Confirm', '#3085d6')
                    ->footer('<a href="#">Why do I have this issue?</a>')
                    // ->toToast()
                    ->focusConfirm(true)
                    ->timerProgressBar()
                    ->autoClose(4000);
                break;
            
            case 'question':
                alert()->question('Question Alert','Lorem ipsum dolor sit amet.');    
                break;

            case 'toast':
                Alert::toast('Ini isi dari toast', 'success')->autoClose(2000);
                break;

            case 'animate':
                alert()->error("Judul", "Ini ditambahkan animate css")
                    ->animation('rollIn faster','rollOut faster');
                break;
        }

        // Tampil tabel data
        $numberTest = numberPagination(5);

        switch ($request->type) {
            case 'delete':
                $data['tabel'] = Test::onlyTrashed()->paginate(5);
                break;
            
            case 'all-delete':
                $data['tabel'] = Test::withTrashed()->paginate(5);
                break;

            default:
                $data['tabel'] = Test::paginate(5);
                break;
        }


        // dd(Test::onlyTrashed()->get());

        return view("alert.index", compact('data', 'numberTest'));
    }

    public function indexAjax()
    {
        $data = Test::all();
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|max:50',
            'nim' => 'required|max:20',
            'kelas' => 'required|max:10',
            'alamat' => 'required|min:5'
        ]);

        if ($validator->fails()) {
            return back()
                ->with('error', $validator->messages()->all()[0])
                ->withInput();
        }

        $test = new Test;

        $test->nama = $request->get('nama');
        $test->nim = $request->get('nim');
        $test->kelas = $request->get('kelas');
        $test->alamat = $request->get('alamat');

        $test->save();

        return redirect()
            ->route('alert.index')
            ->with('success', 'Berhasil menyimpan data');
    }


    public function storeAjax(Request $request)
    {
        $validator = Validator::make($request->input(), array(
            'dataName'  => 'required',
            'dataNim'  => 'required',
            'dataClass'  => 'required',
            'dataAddress'  => 'required',
        ));

        if ($validator->fails()) {
            return response()->json([
                'error'  => true,
                'messages'=> $validator->errors(),
            ], 422);
        }

        $test = new Test;
        // $test = Test::create($request->all());

        $test->nama = $request->get('dataName');
        $test->nim = $request->get('dataNim');
        $test->kelas = $request->get('dataClass');
        $test->alamat = $request->get('dataAddress');

        $test->save();

        return response()->json([
            'error'   => false,
            'data'    => $test
        ], 200);
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function showAjax($id)
    {
        $data = Test::find($id);

        return response()->json([
            'error' => false,
            'data'  => $data,

        ], 200);
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
        $validator = Validator::make($request->input(), array(
            'dataName'  => 'required',
            'dataNim'  => 'required',
            'dataClass'  => 'required',
            'dataAddress'  => 'required',
        ));

        if ($validator->fails()) {
            return response()->json([
                'error'   => true,
                'messages'=> $validator->errors()
            ], 422);
        }

        $data = Test::findOrFail($id);

        $data->nama = $request->input('dataName');
        $data->nim = $request->input('dataNim');
        $data->kelas = $request->input('dataClass');
        $data->alamat = $request->input('dataAddress');

        $data->save();

        return response()->json([
            'error' => false,
            'data'  => $data
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $test = Test::findOrFail($id);

        $test->delete();

        return response()->json([
            'error' => false,
            'data'  => $test
        ], 200);
    }
}
