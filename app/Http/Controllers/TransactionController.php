<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Models\Car;
use phpDocumentor\Reflection\DocBlock\Tags\Uses;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id_user=Auth::user()->id;
        $transaction=Car::with('transactions')->where('user_id','like',$id_user)->get()->pluck('transactions')->flatten();
        return view('tenant.transaction',compact('transaction'));
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
        $data = $request->all();
        if ($request->has('img_id')) {
            foreach ($request->file('img_id') as $image) {
                $imageName = Carbon::now()->format('Y-m-d_H-i-s') . $image->getClientOriginalName();
                $path = "img_renter/";
                $image->move(public_path($path), $imageName);
            }
        }
        if ($request->has('img_license')) {
            foreach ($request->file('img_license') as $image_license) {
                $imageName_lincense = Carbon::now()->format('Y-m-d_H-i-s') . $image_license->getClientOriginalName();
                $path2 = "img_renter/";
                $image_license->move(public_path($path2), $imageName_lincense);
            }
        }
        Transaction::create([
            'name'=>$request->input('name'),
            'phone'=>$request->input('phone'),
            'address'=>$request->input('address'),
            'id_number'=>$request->input('id_number'),
            'id_driver_license'=>$request->input('id_driver_license'),
            'img_id' => $path . $imageName,
            'img_license' => $path2 . $imageName_lincense,
            'car_id'=>$request->input('id_car')
        ]);
        $car_rent= Car::findOrFail($request->input('id_car'));
        if($car_rent) {
            $car_rent->status = 'busy';
            $car_rent->save();
        }
        return redirect()->route('list.car');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaction = Transaction::findOrFail($id);
        return response()->json([
            'data'=>$transaction
        ]);
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
