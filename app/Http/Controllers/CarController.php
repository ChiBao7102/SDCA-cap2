<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarRequest;
use App\Models\Car;
use App\Models\Image;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showList()
    {
        $newid = (int)(Auth::user()->id);
        $cars = Car::where('user_id', '=', $newid)->get();
        // foreach ($cars as $car) {
        //     $car_id = $car->id;
        //     $img = Image::where('car_id', '=',  $car_id)->get();

        // }
        // toastr()->success('Create successful');
        return view('tenant.crud_car', compact('cars'));
    }
    // public function listCar($id)
    // {

    //     $newid = (int)$id;
    //     // dd($newid);
    //     $cars = Car::where('user_id', '=', $newid)->get();
    //     return view('tenant.crud_car', compact('cars'));
    // }
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
    public function store(CarRequest $request)
    {
        $newCar = Car::create($request->all());
        if ($request->has('img_car')) {
            foreach ($request->file('img_car') as $image) {
                $imageName = Carbon::now()->format('Y-m-d_H-i-s') . $image->getClientOriginalName();
                $path = "img/";
                $image->move(public_path($path), $imageName);
                Image::create([
                    'img_car' => $path . $imageName,
                    'car_id' => $newCar->id,
                ]);
            }
        }
        // toastr()->success('Create successful');
        return redirect()->route('show.list')->with('success', __('message.car.create_car'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function showCar($id)
    {
        $car = Car::with('images')->findOrFail($id);
        return response()->json([
            'data' => $car
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update($id, CarRequest $request)
    {
        $newCar = Car::findOrFail($id);
        $data=$request->all();
        $newCar->update($data);
        return response()->json([
            'status' => true
        ]);
    }
    public function updateImg($id,Request $request)
    {
        $img = Image::findOrFail($id);
        dd($img);
        // if ($request->has('img_car')) {
        //     foreach ($request->file('img_car') as $image) {
        //         $imageName = Carbon::now()->format('Y-m-d_H-i-s') . $image->getClientOriginalName();
        //         $path = "img/";
        //         $image->move(public_path($path), $imageName);
        //         Image::create([
        //             'img_car' => $path . $imageName,
        //             'car_id' => $newCar->id,
        //         ]);
        //     }
        // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $img = Image::select('img_car')->where('car_id', 'like', $id)->get();
        foreach ($img as $image) {
            if (File::exists($image->img_car)) {
                File::delete(public_path($image->img_car));
            }
        }
        $car = Car::findOrFail($id);
        $car->images()->delete();
        $car->delete();
        // Image::findOrFail($id)->delete();
        // toastr()->success('Delete successful');
        return redirect()->route('show.list')->with('success', __('message.car.delete_car'));
    }
}
