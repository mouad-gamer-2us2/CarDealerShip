<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class buyerController extends Controller
{
    public function welcomeBuyer()
    {
        return view('buyers.welcomeBuyer');
    }
}
