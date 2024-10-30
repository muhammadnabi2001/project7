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
    public function create(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255'
        ]);
        $universitet=new Universitet();
        $universitet->name=$request->name;
        $universitet->save();
        $universitets=Universitet::all();
        return view('index',['universitets'=>$universitets]);
    }
}
