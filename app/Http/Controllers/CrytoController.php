<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use WisdomDiala\Cryptocap\Facades\Cryptocap;

class CrytoController extends Controller
{
    public function show(){

        return view('welcome');
    }
}
