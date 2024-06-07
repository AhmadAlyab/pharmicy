<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\Medicine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{
    // show all orders for user
    public function index()
    {
        $user_id = Auth::user()->id;
        $orders = Orders::where('user_id',$user_id)->get();
        return view('order.index',compact('orders'));
    }

    // create new order for user
    public function create($id)
    {
        try {
            Orders::create([
               'user_id'    => Auth::user()->id,
               'medicine_id'=> $id,
               'sender'     => Auth::user()->name,
               'recipient'  => 'pharmicy',
               'status'     => 'waiting',
               'date'       =>  date('Y-m-d H:i:s'),
               'description'=> 'none'
            ]);
            toastr()->success('Data has been saved successfully!');  
            return to_route('medicine.customer');   
        } catch (\Throwable $th) {
            toastr()->error('An error has occurred please try again later.');
            return to_route('medicine.customer');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Orders $orders)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Orders $orders)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Orders $orders)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        try {
            Orders::findOrFail($request->id)->delete();
            toastr()->success('Data has been saved successfully!');
            return redirect()->route('order.index');

        } catch (\Throwable $th) {
            toastr()->error('An error has occurred please try again later.');
            return to_route('medicine.index');
        }
    }
}
