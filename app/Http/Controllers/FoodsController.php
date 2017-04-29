<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Food;
use Illuminate\Support\Facades\Auth;
use App\State;
use Charts;

class FoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function charts()
    {
        $chart = Charts::create('line', 'highcharts')
            // ->view('custom.line.chart.view') // Use this if you want to use your own template
            ->title('My nice chart')
            ->labels(['First', 'Second', 'Third'])
            ->values([5,10,20])
            ->dimensions(1000,500)
            ->responsive(true);
        return view('chart', ['chart' => $chart]);

    }

    public function index()
    {
        //
        $foods = Food::where('user_id', Auth::user()->id)->orderBy('created_at', 'asc')->paginate(7);
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
        $states = State::all();

        return view('jualan.create', compact('states'));

    }

    public function ajax()
    {
      $state_id = Input::get('state_id');
      $district = District::where('state_id', '=', $state_id)->get();

      return \Response::json($district);
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
        $food->state_id = $request->state;
        $food->district_id = $request->district;
        $food->user_id = Auth::user()->id;
        // dd($food);
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

        $states = State::all();
        $food = Food::findOrFail($id);
        return view('jualan.edit', compact('food'))->with('states', $states);
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
        $food->state_id = $request->state;
        $food->district_id = $request->district;
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
