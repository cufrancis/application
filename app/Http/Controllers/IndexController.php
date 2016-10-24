<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\App;
use App\Model\Type;

use App\Http\Requests;

class IndexController extends Controller
{
    //
    public function index() {
        $types = Type::all();
        $apps = App::all();

        return view('index.index', compact('types', 'apps'));
    }
}
