<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Food;
use Illuminate\Support\Facades\Auth;


class FoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $foods = Food::with('user')->paginate(5);
        $foods = Food::where('user_id', Auth::user()->id)->get();
        // dd($foods);
        return view('jualan.index', compact('foods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('jualan.create');

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


        $food = new Food;
        $food->nama_makanan = $request->nama_makanan;
        $food->saiz_hidangan = $request->saiz_hidangan;
        $food->harga = $request->harga;
        $food->user_id = Auth::user()->id;
        $food->save();

        return redirect()->action('FoodsController@store')->withMessage('Food has been added');

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
        $food = Food::findOrFail($id);
        return view('jualan.edit', compact('food'));
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
        $this->validate($request, [
          'nama_makanan' => 'required',
          'saiz_hidangan' => 'required',
          'harga' => 'required',
        ]);

        $food = Food::findOrFail($id);
        $food->nama_makanan = $request->nama_makanan;
        $food->saiz_hidangan = $request->saiz_hidangan;
        $food->harga = $request->harga;
        $food->save();

        return redirect()->action('FoodsController@index')->withMessage('Your food has been updated');
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
        $food = Food::findOrFail($id);
        $food->delete();
        return back()->withError('Post has been deleted');

    }
}
