<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

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
                    ->animation('pulse faster','fadeInUp faster');
                break;
            
            
        }
        
        return view("alert.index");
    }


    public function questionAlert()
    {
        Alert()->question('Title','Lorem Lorem Lorem');
    }
}
