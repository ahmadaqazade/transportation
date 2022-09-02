@extends('layouts.master');

@section('title', 'ویرایش محموله ');

@section('pageName', 'ویرایش محموله')
@section('breadcrump')
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-left">
        <li class="breadcrumb-item"><a href="{{ route('admin') }}">خانه</a></li>
        <li class="breadcrumb-item active"> <a href="{{ route('admin.cargo.index') }}">محموله ها</a></li>
        <li class="breadcrumb-item active">ویرایش محموله</li>
    </ol>
</div>
<section>
    <a href="{{ route('admin.cargo.index') }}" class="btn btn-sm m-4  bg-primary">بازگشت</a>
</section>
@endsection



@section('main')

<div class="row">

    <div class="col-md-12">
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">لطفا فرم را پر کنید -></h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" action="{{ route('admin.cargo.update', $cargo->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-row m-4">



                    <section class=" col-12 col-md-6 mt-2">
                        <div class="form-group">
                            <label for="name">نام محموله</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $cargo->name) }}"
                                placeholder="مثال : گندم">
                        </div>

                        @error('name')
                                <span class="alert_required bg-danger rounded text-white p-1  mb-2">
                                    <strong>
                                        {{ $message }}
                                    </strong>
                                </span>
                        @enderror
                    </section>

                    <section class="col-12 col-md-6 mt-2">
                        <div class="form-group">
                            <label for="sender_id">نام ارسال کننده</label>
                            <select name="sender_id" id="sender_id" class="form-control">
                                @foreach($senders as $sender)
                                    <option value="{{ $sender->id }}" @if(old('sender_id', $cargo->sender_id) == $sender->id) selected @endif><span>&#9989;</span>{{ $sender->name . ' ' . $sender->family}}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('sender_id')
                                <span class="alert_required bg-danger rounded text-white p-1  mb-2">
                                    <strong>
                                        {{ $message }}
                                    </strong>
                                </span>
                        @enderror
                    </section>
                    

                    <section class="col-12 col-md-6 mt-2">
                        <div class="form-group">
                            <label for="driver_id">نام راننده</label>
                            <select name="driver_id" id="driver_id" class="form-control">
                                @foreach($drivers as $driver)
                                    <option value="{{ $driver->id }}" @if(old('driver_id', $cargo->driver_id) == $driver->id) selected @endif><span>&#9989;</span>{{ $driver->name . ' ' . $driver->family }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('driver_id')
                                <span class="alert_required bg-danger rounded text-white p-1  mb-2">
                                    <strong>
                                        {{ $message }}
                                    </strong>
                                </span>
                        @enderror
                    </section>

                    <section class="col-12 col-md-6 mt-2">
                        <div class="form-group">
                            <label for="car_id">نام خودرو</label>
                            <select name="car_id" id="car_id" class="form-control">
                                @foreach($cars as $car)
                                    <option value="{{ $car->id }}" @if(old('car_id', $cargo->car_id) == $car->id) selected @endif><span>&#9989;</span>{{ $car->name . ' <====> ' . $car->brand }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('car_id')
                                <span class="alert_required bg-danger rounded text-white p-1  mb-2">
                                    <strong>
                                        {{ $message }}
                                    </strong>
                                </span>
                        @enderror
                    </section>




                    <section class="col-12 col-md-6 mt-2" >
                        <div class="form-group">
                            <label for="origin">مبدا</label>
                            <input type="text" class="form-control" id="origin" name="origin" value="{{ old('origin', $cargo->origin) }}"
                                placeholder="مثال : تهران">
                        </div>
                        @error('origin')
                                <span class="alert_required bg-danger rounded text-white p-1  mb-2">
                                    <strong>
                                        {{ $message }}
                                    </strong>
                                </span>
                        @enderror
                    </section>
                    

                    <section class="col-12 col-md-6 mt-2">
                        <div class="form-group">
                            <label for="destination">مقصد</label>
                            <input type="text" class="form-control" id="destination" name="destination" value="{{ old('destination', $cargo->destination) }}"
                                placeholder="مثال : بندرعباس">
                        </div>
                        @error('destination')
                                <span class="alert_required bg-danger rounded text-white p-1  mb-2">
                                    <strong>
                                        {{ $message }}
                                    </strong>
                                </span>
                        @enderror
                    </section>

                    <section class="col-12 col-md-6 mt-2">
                        <div class="form-group">
                            <label for="status">وضعیت</label>
                            <select name="status" id="status" class="form-control">
                                    <option value="0" @if(old('status', $cargo->status == 0)) selected @endif><span>&#9989;</span>در راه مقصد</option>
                                    <option value="1" @if(old('status', $cargo->status == 1)) selected @endif><span>&#9989;</span>رسیده</option>
            
                            </select>
                        </div>
                        @error('status')
                                <span class="alert_required bg-danger rounded text-white p-1  mb-2">
                                    <strong>
                                        {{ $message }}
                                    </strong>
                                </span>
                        @enderror
                    </section>




                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">ثبت</button>
                </div>
            </form>
        </div>
    </div>

</div>

@endsection