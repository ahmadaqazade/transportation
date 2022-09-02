@extends('layouts.master');

@section('title', 'ویرایش راننده ');

@section('pageName', 'ویرایش راننده')
@section('breadcrump')
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-left">
        <li class="breadcrumb-item"><a href="{{ route('admin') }}">خانه</a></li>
        <li class="breadcrumb-item active"> <a href="{{ route('admin.driver.index') }}">رانندگان</a></li>
        <li class="breadcrumb-item active">ویرایش راننده</li>
    </ol>
</div>
<section>
    <a href="{{ route('admin.driver.index') }}" class="btn btn-sm m-4  bg-primary">بازگشت</a>
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
            <form role="form" action="{{ route('admin.driver.update', $driver->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-row m-4">



                    <section class=" col-12 col-md-6 mt-2">
                        <div class="form-group">
                            <label for="name">نام</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $driver->name) }}"
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
                            <input type="text" class="form-control" id="family" name="family" value="{{ old('family', $driver->family) }}"
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
                            <input type="number" class="form-control" id="phone" name="phone" value="{{ old('phone', $driver->phone) }}"
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
                            <label for="age">سن</label>
                            <input type="number" class="form-control" id="age" name="age" value="{{ old('age', $driver->age) }}"
                                placeholder="مثال : 32">
                        </div>
                        @error('age')
                                <span class="alert_required bg-danger rounded text-white p-1  mb-2">
                                    <strong>
                                        {{ $message }}
                                    </strong>
                                </span>
                        @enderror
                    </section>


                    <section class="col-12 col-md-6 mt-2">
                        <div class="form-group">
                            <label for="license_number">شماره گواهیمانه</label>
                            <input type="number" class="form-control" id="license_number" name="license_number" value="{{ old('license_number', $driver->license_number) }}"
                                placeholder="مثال : 132135165185">
                        </div>
                        @error('license_number')
                                <span class="alert_required bg-danger rounded text-white p-1  mb-2">
                                    <strong>
                                        {{ $message }}
                                    </strong>
                                </span>
                        @enderror
                    </section>
                    
                    <section class="col-12 col-md-6 mt-2">
                        <div class="form-group">
                            <label for="license">گواهینامه</label>
                            <select name="license" id="license" class="form-control">
                                <option value="0" @if(old('license', $driver->license) == 0) selected @endif ><span>&#9989;</span>ترانزیت بین الملل  <-- بیش از 6 تن بار و یا حمل بیش از 26 مسافر --></option>
                                <option value="1" @if(old('license', $driver->license) == 1) selected @endif ><span>&#9989;</span>پایه یک (داخل کشور)<-- بیش از 6 تن بار و یا حمل بیش از 26 مسافر --></option>
                                <option value="2" @if(old('license', $driver->license) == 2) selected @endif ><span>&#9989;</span>پایه دو <--   6 تن بار و یا حداکثر 26 مسافر --></option>
                                <option value="3" @if(old('license', $driver->license) == 3) selected @endif ><span>&#9989;</span>پایه سه <-- خودرو های 3.5 تن بار و یا حمل حداکثر 9 مسافر --></option>
                            </select>
                        </div>
                        @error('license')
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
                    <button type="submit" class="btn btn-primary">ویرایش</button>
                </div>
            </form>
        </div>
    </div>

</div>

@endsection