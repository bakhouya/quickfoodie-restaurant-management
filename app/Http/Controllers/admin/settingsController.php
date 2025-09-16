<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class settingsController extends Controller
{
    public function index(){
        return view('pages.admin.settings.index');
    }
    public function content(){
        return view('pages.admin.settings.web.index');
    }
    public function lang(){
        return view('pages.admin.settings.languages.index');
    }
    public function option(){
        return view('pages.admin.settings.orders.index');
    }
}
