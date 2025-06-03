@extends('layouts.master')
@section('css')

@section('title')
{{ trans('tourist.descover the city') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ trans('tourist.descover the city') }}</h4>
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

                        <div class="table-responsive">
                            <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                   data-page-length="50"
                                   style="text-align: center">

                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ trans('tourist.facility name') }}
                                    </th>
                                    <th> {{ trans('tourist.town') }}</th>
                                    <th> {{ trans('tourist.city') }}</th>

                                    <th>{{ trans('tourist.category') }} </th>
                                    <th>{{ trans('tourist.visit') }} </th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($facilitiescity as $faccities)
                                <?php $i=1; ?>
                                  @foreach ($faccities->facilities as $faco )
                                  <tr>

                                    <td>{{$i++}}</td>
                                    <td>{{$faco->name}}</td>
                                    <td>{{$faco->town->name }}</td>

                                    <td>{{$faco->town->city->name }}</td>

                                    <td>{{$faco->category->name }}</td>

                                        <td>
                                            <a href="{{route('facility.show',$faco->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true" title="{{ trans('tourist.visit') }}"><i class="fa fa-edit"></i></a>
                                        </td>
                                    </tr>


                                    <div class="modal fade" id="" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

                                  @endforeach



                                @endforeach


                            </table>

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
