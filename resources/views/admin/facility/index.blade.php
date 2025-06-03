@extends('layouts.master')
@section('css')
@toastr_css
@section('title')
{{ trans('category.category') }}

@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ trans('facility.create') }}
            </h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                <li class="breadcrumb-item active">Page Title</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
               {{-- ******************************************* --}}
               <div class="col-xl-12 mb-30">
                <div class="card card-statistics h-100">
                    <div class="card-body">

                        <a href="{{route('facility.create')}}" class="btn btn-success btn-sm" role="button"
                           aria-pressed="true"  > {{ trans('اضافة منشأة') }} </a><br><br>

                        <div class="table-responsive">
                            <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                   data-page-length="50"
                                   style="text-align: center">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ trans('category.category name') }} </th>
                                    <th>المرحلة الدراسية</th>
                                    <th>الصف الدراسي</th>
                                    <th>اسم المعلم</th>
                                    <th>العمليات</th>
                                </tr>
                                </thead>
                                <tbody>
                                {{-- @foreach($Categories as $Category) --}}
                                    <tr>
                                    <td></td>
                                    <td>{{}}</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                        <td>
                                            <button type="button" class="btn btn-info btn-sm" role="button" aria-pressed="true" ><i class="fa fa-edit"></i></a>
                                            <button type="button" class="btn btn-danger btn-sm" title="حذف"><i class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>

                                {{-- @endforeach --}}


                            </table>





@endsection
@section('js')


@endsection
