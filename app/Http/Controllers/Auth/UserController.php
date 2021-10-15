<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show()
    {
        $user = Auth::user();
        $countries = Country::all();
        $city = City::all();
        return view('auth.user.profile', [
            'user' => Auth::user(),
            'countries' => $countries,
            'cities' => $city
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function edit(Request $request)
    {
        $user = User::find( Auth::user()->id);

        $user->update([
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email
        ]);

        $user->address()->update([
            'company_name' => $request->companyname,
            'vat' => $request->vat,
            'pvm' => $request->pvm,
            'street' => $request->street,
            'building' => $request->building,
            'apartment' => $request->apartment,
            'post_code' => $request->postcode,
            'phone' => $request->phone,
            'country_id' => $request->country,
            'city_id' => $request->city
        ]);

    return redirect()->back()->with('success_message', 'Updated');
    }

    public function reset(Request $request)
    {
        return view('auth.user.password-reset');
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
