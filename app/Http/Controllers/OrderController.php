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

        foreach (Cart::content() as $item) {

            $product = Product::find($item->id);

            if (0 <= (int)$item->amount) {

                return back()->withErrors('Nėra reikiamo kiekio sandėlyje. Preke kiekio '.$product->reference);
            }
        }
        $order = Order::createOrder(Auth::user()->id, $request);

        return redirect()->route('orders.show', $order->reference)->with('success_message', 'Ačiū kad pirkote!');
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

        if($order->user->id !== $id || $order === null){
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
