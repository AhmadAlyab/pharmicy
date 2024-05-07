<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;
use App\Http\Requests\MedicineStoreRequest;

class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $madicines = Medicine::all();
        return view('medicine.index', compact('madicines'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('medicine.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MedicineStoreRequest $request)
    {
       try {
           // create new Medicine
           Medicine::create([
            'name'         => $request->name,
            'status'       => $request->available,
            'place_where'  => $request->place_where,
            'combination'  => $request->combination,
            'alternatives' => $request->alternatives,
            'price'        => $request->price
           ]);

       } catch (\Throwable $th) {

       }
    }

    /**
     * Display the specified resource.
     */
    public function show(Medicine $medicine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Medicine $medicine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Medicine $medicine)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Medicine $medicine)
    {
        //
    }
}
