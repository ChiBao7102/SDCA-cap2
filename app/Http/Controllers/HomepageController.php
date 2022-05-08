<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\User;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function showCar()
    {
        $cars_mec = Car::with('images')->where('name', 'like', '%ercede%')->get();
        $cars_ford = Car::with('images')->where('name', 'like', '%ford%')->get();
        $cars_toyota = Car::with('images')->where('name', 'like', '%toyota%')->get();
        $cars_honda = Car::with('images')->where('name', 'like', '%honda%')->get();
        // dd($cars_mec);

        return view('welcome', compact('cars_mec', 'cars_ford', 'cars_toyota', 'cars_honda'));
    }
    public function detail($id)
    {
        $cars = Car::with('images')->where('id','like',$id)->get();
        foreach($cars as $car){
            $id_user=$car->user_id;
        };
        // $id_user = Car::select('user_id')->where('id','like',$id)->get();
        $user = User::where('id','like',$id_user)->get();
   
        return view('detailProduct', compact('cars', 'user'));
    }
    // public function registerTransaction($id,Request $request){
    //     $pending = Car::findOrFail($id);

    //     $data= $request->all();
    // }
}
