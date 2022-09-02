@extends('layouts.master');

@section('title', 'رانندگان');

@section('pageName', 'رانندگان')
@section('breadcrump')
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-left">
        <li class="breadcrumb-item"><a href="{{ route('admin') }}">خانه</a></li>
        <li class="breadcrumb-item active">رانندگان</li>
    </ol>
</div>
<section>
    
    <a href="{{ route('admin.driver.create') }}" class="btn btn-sm m-4 bg-primary" >ساخت راننده جدید</a>
</section>
@endsection



@section('main')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">جدول رانندگان </h3>

                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control float-right" placeholder="جستجو">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                    <tr>
                        <th>شماره</th>
                        <th>نام راننده</th>
                        <th>سن</th>
                        <th>تلفن</th>
                        <th>گواهینامه</th>
                        <th>تنظیمات</th>
                    </tr>
                    @foreach ($drivers as $driver)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $driver->name. ' ' . $driver->family }}</td>
                        <td>{{ $driver->age }}</td>
                        <td>{{ $driver->phone }}</td>
                        <td>{{ $driver->license }}</td>
                        {{-- <td>{{ (($driver->license ==  0) ? 'ترانزیت بین الملل' : 'پایه یک') && (($driver->license ==  2) ? 'پایه دو' : '') }}</td> --}}
                        <td class="">
                            <a class="btn btn-warning btn-sm" href="{{ route('admin.driver.edit', $driver->id) }}"> <i class="fa fa-edit"> </i>  ویرایش </a>
                            <form class="d-inline" method="post" action="{{ route('admin.driver.distroy', $driver->id) }}">
                                @csrf
                                @method('delete')
                                <button type="submit" id="delete" class="delete btn btn-danger btn-sm "> <i class="fa fa-trash-o"> </i> حذف </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    
                    
                </table>
            </div>
            
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
        
    </div>
</div>
<div class="d-flex justify-content-center">
    {{ $drivers->links() }}
</div>

<div class="d-flex justify-content-center">
    <?php if ($drivers->count() == 0) {
        ?>
    <strong>موردی یافت نشد.</strong>
<?php } 
?>
</div>


@if (Session::has('success'))

    <div class="col-12 col-md-4">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ Session::get('success') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>

@endif


@if (Session::has('error'))

    <div class="col-12 col-md-4">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ Session::get('error') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>

@endif
@endsection