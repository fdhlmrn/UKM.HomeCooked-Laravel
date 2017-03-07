<?php

namespace App\Http\Controllers;
use App\Order;

use Illuminate\Http\Request;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $orders = Order::with('user')->paginate(5);
        return view('order.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('order.create');
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
        $order = new Order;
        $order->nama_makanan = $request->nama_makanan;
        $order->saiz_hidangan = $request->saiz_hidangan;
        $order->harga = $request->harga;
        $order->user_id = Auth::user()->id;
        $order->save();

        return redirect()->action('OrdersController')->withMessage('Order has been added');
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
        $order = Order::findOrFail($id);
        return view('order.edit', compact('order'));
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

        $order = Order::findOrFail($id);
        $order->nama_makanan = $request->nama_makanan;
        $order->saiz_hidangan = $request->saiz_hidangan;
        $order->harga = $request->harga;
        $order->save();

        return redirect()->action('OrdersController@index')->withMessage('Your food has been updated');
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
        $order = Order::findOrFail($id);
        $order->delete();
        return back()->withError('Order has been deleted');
    }
}
