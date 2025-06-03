@extends('layouts.master')
@section('css')

@section('title')
    empty
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> ncvlxcnvxcnvxcv</h4>
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
               {{-- ******************************************* --}}
               <div class="col-xl-12 mb-30">
                <div class="card card-statistics h-100">
                    <div class="card-body">
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="55" title="حذف"><i class="fa fa-trash"></i></button>

                        <a href="" class="btn btn-success btn-sm" role="button"
                           aria-pressed="true"  data-toggle="modal" data-target="55" >اضافة مادة جديدة</a><br><br>
                        <div class="table-responsive">
                            <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                   data-page-length="50"
                                   style="text-align: center">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>اسمالسائح</th>
                                    <th>الايميل </th>
                                    <th>الرقم للاتصال </th>
                                    <th>العمليات</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php  $i=1;?>
                                @foreach($tourists as $tourist)
                                    <tr>
                                    <td>{{$i++}}</td>

                                    <td>{{$tourist->name}}</td>
                                    <td>{{$tourist->email}}</td>
                                    <td>{{$tourist->Phone_num}}</td>
                                        <td>
                                            <a href="" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete" title="حذف"><i class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>

                                    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <form action="{{route('tourist.destroy',['delete'])}}" method="post">
                                                {{method_field('delete')}}
                                                {{csrf_field()}}
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">حذف  سائح</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>  هل انت متاكد؟  </p>
                                                    <input type="hidden" name="id"  value="{{$tourist->id}}">
                                                </div>
                                                <div class="modal-footer">
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">زر</button>
                                                        <button type="submit"
                                                                class="btn btn-danger">زر2</button>
                                                    </div>
                                                </div>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                @endforeach


                            </table>

             {{-- +++مدلا الاد ++ +++++++--}}
              <div class="modal fade" id="55" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form action="" method="post">
                        {{method_field('delete')}}
                        {{csrf_field()}}
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">حذف مادة دراسية</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p> ابعرف شو بدك </p>
                            <input type="hidden" name="id"  value="">
                        </div>
                        <div class="modal-footer">
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">زر</button>
                                <button type="submit"
                                        class="btn btn-danger">زر2</button>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>

               {{-- ++نهاية مدلا الاد +++++ --}}
                        </div>
                    </div>
                </div>
            </div>

               {{-- ++++++++++++++++++++++++++++++++++++++++++++ --}}


            </div>
        </div>
    </div>
</div>


<!-- row closed -->
@endsection
@section('js')

@endsection
