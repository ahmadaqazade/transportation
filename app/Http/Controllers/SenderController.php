<?php

namespace App\Http\Controllers;

use App\Models\Sender;
use App\Http\Requests\StoreSenderRequest;
use App\Http\Requests\UpdateSenderRequest;

class SenderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $senders = Sender::orderBy('name', 'desc')->paginate(5);
        return view('admin.sender.index', compact('senders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sender.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSenderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSenderRequest $request)
    {
        $inputs = $request->all();
        Sender::create($inputs);
        return redirect()->route('admin.sender.index')->with('success', 'ارسال کننده جدید با موفقیت اضافه شد .');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sender  $sender
     * @return \Illuminate\Http\Response
     */
    public function show(Sender $sender)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sender  $sender
     * @return \Illuminate\Http\Response
     */
    public function edit(Sender $sender)
    {
        return view('admin.sender.edit', compact('sender'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSenderRequest  $request
     * @param  \App\Models\Sender  $sender
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSenderRequest $request, Sender $sender)
    {
        $inputs = $request->all();
        $sender->update($inputs);
        return redirect()->route('admin.sender.index')->with('success', 'ارسال کننده با موفقیت ویرایش شد.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sender  $sender
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sender $sender)
    {
        $sender->destroy($sender->id);
        return redirect()->back()->with('error', 'ارسال کننده با موفقیت حذف شد');
    }
}
