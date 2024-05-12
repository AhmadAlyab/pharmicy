<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;
use App\Http\Requests\MedicineStoreRequest;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;

class MedicineController extends Controller
{
    public function index()
    {
        $madicines = Medicine::all();
        return view('medicine.index', compact('madicines'));
    }
    // create new medicine
    public function create()
    {
        return view('medicine.create');
    }
    // store new medicine
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
           $id = Medicine::latest()->first()->id;
           // save file
           if($request->hasFile('file')){
            $image = $request->file('file');
              $name = $image->getClientOriginalName();
              $image->storeAs('images/medicine'.$id,$image->getClientOriginalName(),'images');
              $images = new Image();
              $images->filename = $name;
              $images->imageable_id =$id;
              $images->imageable_type = "App\Models\Image";
              $images->save();

          }
           toastr()->success('Data has been saved successfully!');
           return redirect()->route('medicine.index');

       } catch (\Throwable $th) {
           toastr()->error('An error has occurred please try again later.');
           return to_route('medicine.index');
       }
    }
    // show deatiles Medicine
    public function show(Medicine $medicine)
    {
        //
    }
    // edit Medicine
    public function edit($id)
    {
        $medicine = Medicine::findOrFail($id);
        if ($medicine->status){
            $val ="available";
        }else{
            $val = "not available";
        }
        return view('medicine.edit', compact('medicine','val'));
    }
    // update Medicine
    public function update(Request $request)
    {
        try {
            $medicine = Medicine::findOrFail($request->id);
            // update Medicine
            $medicine->update([
             'name'         => $request->name,
             'status'       => $request->available,
             'place_where'  => $request->place_where,
             'combination'  => $request->combination,
             'alternatives' => $request->alternatives,
             'price'        => $request->price
            ]);
            $id = Medicine::latest()->first()->id;
            // save file
            if($request->hasFile('file')){
             $image = $request->file('file');
               $name = $image->getClientOriginalName();
               $image->storeAs('images/medicine'.$id,$image->getClientOriginalName(),'images');
               $images = new Image();
               $images->filename = $name;
               $images->imageable_id =$id;
               $images->imageable_type = "App\Models\Image";
               $images->save();
            }
            toastr()->success('Data has been saved successfully!');
            return redirect()->route('medicine.index');

        } catch (\Throwable $th) {
            toastr()->error('An error has occurred please try again later.');
            return to_route('medicine.index');
        }
    }
    // delete Medicine
    public function destroy(Request $request)
    {
        try {
            $medicine = Medicine::findOrFail($request->id)->delete();
            toastr()->success('Data has been saved successfully!');
            return redirect()->route('medicine.index');

        } catch (\Throwable $th) {
            toastr()->error('An error has occurred please try again later.');
            return to_route('medicine.index');
        }
    }
}
