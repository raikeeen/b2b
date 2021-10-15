<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\Status;
use App\Models\Coupons;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $id = Auth::user()->id;
        $orders = Order::where('user_id',$id)->orderBy('created_at','DESC')->get();
        $carts = [];
        $cart = Order::find(1);

        //dd($orders);

        /*var_dump($cart);
        foreach ($orders as $order) {
            array_push($carts,Cart::restore($order->id));
            var_dump(Cart::restore($order->id));
        }
        var_dump($carts);*/

        return view('auth.user.orders', [
            'orders' => $orders,
            'carts'  => $carts
        ]);
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
     * @return string
     */
    public function store(Request $request)
    {
        $order = Order::createOrder(Auth::user()->id, $request);

        //return route('orders.show', $order->reference);
        return view('auth.user.order-detail', [
            'order' => $order
        ])->with('success_message', 'Aciu kad pirkate!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($reference)
    {
        $id = Auth::user()->id;
        $order = Order::where('reference', $reference)->first();
        //dd($order);
        if($order->user->id !== $id){
            return abort(404);
        }
        return view('auth.user.order-detail', [
            'order' => Order::detailOrder($order),
            'totalProduct' => 0,
            ]);
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
