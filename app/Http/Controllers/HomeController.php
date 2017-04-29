<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Food;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $foods = Food::with('state', 'district')->orderBy('created_at', 'desc')->paginate(7);
        // dd($foods);
        return view('home', compact('foods'));


    }
}
