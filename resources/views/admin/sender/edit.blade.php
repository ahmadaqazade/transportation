@extends('layouts.master');

@section('title', 'ویرایش ارسال کننده ');

@section('pageName', 'ویرایش ارسال کننده ')
@section('breadcrump')
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-left">
        <li class="breadcrumb-item"><a href="{{ route('admin') }}">خانه</a></li>
        <li class="breadcrumb-item active"> <a href="{{ route('admin.sender.index') }}">ارسال کنندگان</a></li>
        <li class="breadcrumb-item active"> ویرایش ارسال کننده</li>
    </ol>
</div>
<section>
    <a href="{{ route('admin.sender.index') }}" class="btn btn-sm m-4  bg-primary">بازگشت</a>
</section>
@endsection



@section('main')

<div class="row">

    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">لطفا فرم را پر کنید -></h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" action="{{ route('admin.sender.update', $sender->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-row m-4">



                    <section class=" col-12 col-md-6 mt-2">
                        <div class="form-group">
                            <label for="name">نام</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $sender->name) }}"
                                placeholder="مثال : احمد">
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
                            <label for="family">نام خانوادگی</label>
                            <input type="text" class="form-control" id="family" name="family" value="{{ old('family', $sender->family) }}"
                                placeholder="مثال : آقازاده">
                        </div>
                        @error('family')
                                <span class="alert_required bg-danger rounded text-white p-1  mb-2">
                                    <strong>
                                        {{ $message }}
                                    </strong>
                                </span>
                        @enderror
                    </section>
                    




                    <section class="col-12 col-md-6 mt-2" >
                        <div class="form-group">
                            <label for="phone">شماره تلفن</label>
                            <input type="number" class="form-control" id="phone" name="phone" value="{{ old('phone', $sender->phone) }}"
                                placeholder="مثال : 0212345678">
                        </div>
                        @error('phone')
                                <span class="alert_required bg-danger rounded text-white p-1  mb-2">
                                    <strong>
                                        {{ $message }}
                                    </strong>
                                </span>
                        @enderror
                    </section>
                    

                    <section class="col-12 col-md-6 mt-2">
                        <div class="form-group">
                            <label for="postalCode">کد پستی</label>
                            <input type="number" class="form-control" id="postalCode" name="postalCode" value="{{ old('postalCode', $sender->postalCode) }}"
                                placeholder="مثال : 123456789">
                        </div>
                        @error('postalCode')
                                <span class="alert_required bg-danger rounded text-white p-1  mb-2">
                                    <strong>
                                        {{ $message }}
                                    </strong>
                                </span>
                        @enderror
                    </section>
                    
                    <section class="col-12 col-md-6 mt-2">
                        <div class="form-group">
                            <label for="address">آدرس</label>
                            <input type="text" class="form-control" id="address" name="address" value="{{ old('name', $sender->address) }}"
                                placeholder="مثال : تهران اسلامشهر پامچال 2">
                        </div>
                        @error('address')
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
                    <button type="submit" class="btn btn-primary">ارسال</button>
                </div>
            </form>
        </div>
    </div>

</div>

@endsection