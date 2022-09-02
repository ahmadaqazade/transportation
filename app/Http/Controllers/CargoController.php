<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use App\Http\Requests\StoreCargoRequest;
use App\Http\Requests\UpdateCargoRequest;
use App\Models\Car;
use App\Models\Driver;
use App\Models\Sender;

class CargoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        

        $cargos = Cargo::orderBy('id', 'DESC')->paginate(5);
        return view('admin.cargo.index', compact('cargos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $senders = Sender::all();
        $drivers = Driver::all();
        $cars = Car::all();
        return view('admin.cargo.create', compact('senders', 'drivers', 'cars'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCargoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCargoRequest $request)
    {
        $inputs = $request->all();
        Cargo::create($inputs);
        return redirect()->route('admin.cargo.index')->with('success', 'محموله با موفقیت ساخته و ارسال خواهد شد.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cargo  $cargo
     * @return \Illuminate\Http\Response
     */
    public function show(Cargo $cargo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cargo  $cargo
     * @return \Illuminate\Http\Response
     */
    public function edit(Cargo $cargo)
    {
        $senders = Sender::all();
        $drivers = Driver::all();
        $cars = Car::all();
        return view('admin.cargo.edit', compact('cargo', 'senders', 'drivers', 'cars'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCargoRequest  $request
     * @param  \App\Models\Cargo  $cargo
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCargoRequest $request, Cargo $cargo)
    {
        $inputs = $request->all();
        $cargo->update($inputs);
        return redirect()->route('admin.cargo.index')->with('success', 'محموله با موفقیت ویرایش شد.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cargo  $cargo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cargo $cargo)
    {
        $cargo->destroy($cargo->id);
        return redirect()->back()->with('error', 'محموله با موفقیت حذف شد.');
    }
}
