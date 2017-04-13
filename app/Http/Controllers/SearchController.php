<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Food;
use App\State;
use App\District;
use App\SubDistrict;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $states = State::all();

        return view('search.index')->with('states', $states);
    }

    public function ajax()
    {
      $state_id = Input::get('state_id');
      $district = District::where('state_id', '=', $state_id)->get();

      return \Response::json($district);
    }

    public function find()
    {
        $keyword=Input::get('keyword');
        $state=Input::get('state');
        $district=Input::get('district');

        if($district == 'null') {
        $foods = Food::where('nama_makanan', 'LIKE', "%$keyword%")->where('state_id', $state)->orderBy('id')->paginate(3);
        }

        else {
        $foods = Food::where('nama_makanan', 'LIKE', "%$keyword%")->where('state_id', $state)->where('district_id', $district)->orderBy('id')->paginate(3);
        }

        // dd($foods);
        return view('search.result', compact('foods'));
    }

    public function details()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }           

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
