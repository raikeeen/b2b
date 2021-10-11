<?php

namespace App\Http\Controllers;

use App\Models\Delivery;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\Request;
//use Gloudemans\Shoppingcart\Cart;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $deliveries = Delivery::all();
        $payments = Payment::all();

        return view('cart.cart',[
            'deliveries' => $deliveries,
            'payments'  => $payments,
            'discount' => Order::getNumbers()->get('discount'),
            'newSubTotal' => Order::getNumbers()->get('newSubTotal'),
            'newTotal' => Order::getNumbers()->get('newTotal')
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required'
        ]);

        $duplicates = Cart::search(function ($cartItem, $rowId) use ($request){
            return $cartItem->id === $request->id;
        });

        if($duplicates->isNotEmpty()){
            return redirect()->route('cart.index')->with('success_message', 'Item already in your cart!');
        }

        $product = Product::where('id', $request->id)->first();

        Cart::add($request->id,$product->name,$request->amount,$product->price)
            ->associate('App\Models\Product');

        return redirect()->route('cart.index')->with('success_message', 'Item was added to your cart');
    }

    public function empty($param)
    {
        return 0;
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function edit(Request $request,$rowId)
    {
        Cart::update($rowId, $request->amount);

        return back()->with('success_message', 'Item was updated to your cart');
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
        Cart::remove($id);
        return back()->with('success_message', 'Item has been removed');
    }

}
