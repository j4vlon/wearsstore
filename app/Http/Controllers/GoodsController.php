<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GoodsController extends Controller
{
    public function GoodsView(){
        return view('main.index');
    }
}
