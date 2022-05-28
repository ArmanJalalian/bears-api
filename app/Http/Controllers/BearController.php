<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Bear;

class BearController extends Controller
{
    //
    public function index() {
        return Bear::all();
    };

}
