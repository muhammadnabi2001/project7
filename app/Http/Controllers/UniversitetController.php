<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Universitet;
use Illuminate\Http\Request;

class UniversitetController extends Controller
{
    public function index()
    {
        $universitets=Universitet::all();
        return view('index',['universitets'=>$universitets]);
    }
}
