<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $limit = $user->term;
        $limitSum = $user->limit;
        $orders = Order::where('user_id',$user->id)->whereDate('created_at', '>', Carbon::now()->subMonth())->orderBy('created_at','DESC')->get();
        $sum = 0;

        if(request()->sort == 'month') {
            $orders = Order::where('user_id',$user->id)->whereDate('created_at', '>', Carbon::now()->subMonth())->orderBy('created_at','DESC')->get();
        }
        if(request()->sort == 'week') {
            $orders = Order::where('user_id',$user->id)->whereDate('created_at', '>', Carbon::now()->subWeek())->orderBy('created_at','DESC')->get();
        }
        if(request()->sort == 'year') {
            $orders = Order::where('user_id',$user->id)->whereDate('created_at', '>', Carbon::now()->subYear())->orderBy('created_at','DESC')->get();
        }
        if(request()->sort == 'day') {
            $orders = Order::where('user_id',$user->id)->whereDate('created_at', '>', Carbon::now()->subDay())->orderBy('created_at','DESC')->get();
        }

        foreach ($orders as $order) {

            if(isset($order->document_b1->price))
                $sum += $order->document_b1->price;
            else {
                $sum += $order->total;
            }
        }

        if($limitSum >= $sum) {
            $sumOrder = $limitSum - $sum;
        } else {
            $sumOrder = 0;
        }

        $from = Carbon::createFromFormat('Y-m-d H:s:i', Carbon::now());
        $limitDays = $orders->map(function ($order) use ($from, $limit, $user) {

            $to = Carbon::createFromFormat('Y-m-d H:s:i', $order->created_at);
            $days = $to->diffInDays($from);

            if($days > $limit) {
                return 0;
            }

            $orderTime = Carbon::createFromFormat('Y-m-d H:s:i', $order->created_at);

            return [
                $limit - $days,
                $orderTime->addDays($user->term)->format('Y-m-d')
            ];
        });

        return view('auth.user.documents', [
            'orders' => $orders,
            'user' => $user,
            'limitDays' => $limitDays,
            'limitSum' => $sumOrder

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
