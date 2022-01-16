<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    //
    public function index(){

        $check = Session::get('admin');
    
        if(!$check){

            return redirect('admin');

        }
        // print_r($check);

        return view('Admin/dashboard');
    }

    
}