<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;
use App\Http\Requests\MedicineStoreRequest;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

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
    public function show()
    {
        $madicines = Medicine::all();
        $image = Image::where('imageable_id',$id)->where('imageable_type','App\Models\Image')->first()->filename;
        $path = storage_path('app/images/images/medicine3/4.jpg');
        $medicine = Medicine::findOrFail($id);
        if ($medicine->status){
            $val ="available";
        }else{
            $val = "not available";
        }
        return view('medicine.show', compact('madicines','val','path'));
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
            $id = $request->id;
            $name = Image::where('imageable_id',$id)->first()->filename;
            // save image file
            if($request->hasFile('file')){
                Storage::disk('images')->delete('images/medicine'.$id.'/'.$name);
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
            $id = $request->id;
            $file = Image::where('imageable_id',$id)->first();
            Storage::disk('images')->delete('images/medicine'.$id.'/'.$file->filename);
            Image::where('imageable_id',$id)->delete();
            $medicine = Medicine::findOrFail($request->id)->delete();
            toastr()->success('Data has been saved successfully!');
            return redirect()->route('medicine.index');

        } catch (\Throwable $th) {
            toastr()->error('An error has occurred please try again later.');
            return to_route('medicine.index');
        }
    }
}
