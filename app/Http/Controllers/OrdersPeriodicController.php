<?php

namespace App\Http\Controllers;

use App\Models\OrdersPeriodic;
use Illuminate\Http\Request;

class OrdersPeriodicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        if ($request->has('predioc'))
        {
            OrdersPeriodic::create([
                'period'    => $request->period,
                'orders_id' => $request->id
            ]);
            toastr()->success('Data has been saved successfully!');
            return redirect()->route('order.index');
        }
        else{
            toastr()->error('An error has occurred please try again later.');
            return to_route('medicine.index');
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
    public function show(OrdersPeriodic $ordersPeriodic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OrdersPeriodic $ordersPeriodic)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OrdersPeriodic $ordersPeriodic)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OrdersPeriodic $ordersPeriodic)
    {
        //
    }
}
