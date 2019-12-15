<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Succulent;

class HomeController extends Controller
{
    public function index(){
        $data = Succulent::all();
        return view('welcome')->with('succulent', $data);
    }
}
