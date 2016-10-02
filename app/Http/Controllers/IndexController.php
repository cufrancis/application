<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\App;
use App\Http\Requests;

class IndexController extends Controller
{
    //
    public function index() {
        dd(App::all());
    }
}
