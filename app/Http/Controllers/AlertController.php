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
        $numberTest = numberPagination(6);

        $data['tabel'] = Test::paginate(6);

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
            // alert()->error('ini Error');

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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $test = Test::find($id);

        return response()->json($test);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // return response()->json(['success' => 'Data test berhasil disimpan']);
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
