@extends('layouts.master');

@section('title', 'محموله ها');

@section('pageName', 'محموله ها')
@section('breadcrump')
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-left">
        <li class="breadcrumb-item"><a href="{{ route('admin') }}">خانه</a></li>
        <li class="breadcrumb-item active">محموله ها</li>
    </ol>
</div>
<section>
    
    <a href="{{ route('admin.cargo.create') }}" class="btn btn-sm m-4 bg-primary" >ارسال محموله جدید</a>
</section>
@endsection



@section('main')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">جدول محموله ها </h3>

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
                        <th>محموله</th>
                        <th>نام ارسال کننده</th>
                        <th>نام راننده مسئول</th>
                        <th>خودرو</th>
                        <th>از مبدا</th>
                        <th>به مقصد</th>
                        <th>وضعیت</th>
                        <th>تنظیمات</th>
                    </tr>
                    @foreach ($cargos as $cargo)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $cargo->name }}</td>
                        <td>{{ $cargo->sender->name . ' ' . $cargo->sender->family }}</td>
                        <td>{{ $cargo->driver->name . ' ' . $cargo->driver->family }}</td>
                        <td>{{ $cargo->car->name }}</td>
                        <td>{{ $cargo->origin }}</td>
                        <td>{{ $cargo->destination}}</td>
                        <td><?php if ($cargo->status === 0) { ?>
                            <span class="badge badge-warning">در مسیر مقصد</span>
                            <?php }
                            else{ ?>
                            <span class="badge badge-success">به مقصد رسید</span>
                        <?php } ?></td>
                        {{-- <td>{{ (($driver->license ==  0) ? 'ترانزیت بین الملل' : 'پایه یک') && (($driver->license ==  2) ? 'پایه دو' : '') }}</td> --}}
                        <td class="">
                            <a class="btn btn-warning btn-sm" href="{{ route('admin.cargo.edit', $cargo->id) }}"> <i class="fa fa-edit"> </i>  ویرایش </a>
                            <form class="d-inline" method="post" action="{{ route('admin.cargo.distroy', $cargo->id) }}">
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
    {{ $cargos->links() }}
</div>

<div class="d-flex justify-content-center">
    <?php if ($cargos->count() == 0) {
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