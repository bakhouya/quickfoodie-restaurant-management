<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class roleController extends Controller
{
    public function index(){
        return view('pages.admin.settings.roles.index');
    }
}
