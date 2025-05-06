<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function showGeneral()  {
        return view('general.general');
    }

    public function aboutUs() {
        return view('general.aboutUs');
    }

    public function contactUs() {
        return view('general.contactUs') ;
    }
}
