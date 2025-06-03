@extends('layouts.master')
@section('css')
@toastr_css
@section('title')
{{ trans('city_category.city category attach') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ trans('city_category.city category attach') }}
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
                {{-- +++++++++++++++++++++++++++++++++++++++++++++++ --}}
                <div class="accordion gray plus-icon round">

                    @foreach ($cities as $city)

                        <div class="acd-group">
                            <a href="#" class="acd-heading">{{ $city->name }}</a>
                            <div class="acd-des">


                                <div class="row">
                                    <div class="col-xl-12 mb-30">
                                        <div class="card card-statistics h-100">
                                            <div class="card-body">
                                                <a href="" class="btn btn-success btn-sm" role="button"
                                                aria-pressed="true" data-toggle="modal" data-target="#exampleModal" data-id="{{$city->id}}" > {{ trans('city_category.add new categories') }}                                            </a><br><br>

                                                <a href="" class="btn btn-success btn-sm" role="button"
                                                aria-pressed="true" data-toggle="modal" data-target="#exampleModal6" data-id="{{$city->id}}" > {{ trans('city_category.edit categories') }}</a><br><br>
                                                <div class="d-block d-md-flex justify-content-between">
                                                    <div class="d-block">
                                                    </div>
                                                </div>
                                                <div class="table-responsive mt-15">
                                                    <table class="table center-aligned-table mb-0">
                                                        <thead>
                                                        <tr class="text-dark">
                                                            {{-- <th>#</th> --}}
                                                            {{-- <th>{{ trans('Sections_trans.Name_Section') }}
                                                            </th>
                                                            <th>{{ trans('Sections_trans.Name_Class') }}</th>
                                                            <th>{{ trans('Sections_trans.Status') }}</th>
                                                            <th>{{ trans('Sections_trans.Processes') }}</th> --}}
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php $i = 0; ?>
                                                        @foreach ($city->categories as $category)
                                                            <tr>
                                                                <?php $i++; ?>
                                                                <td>{{ $i }}</td>
                                                                <td>{{ $category->name }}</td>
                                                                <td> <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"data-target="#exampleModal5" data-categoryid="{{$category->id}}" data-cityid="{{$city->id}}" title="حذف"><i class="fa fa-trash"></i></button></td>
                                                                <td>
                                                                    {{-- <label class="badge badge-{{$list_Sections->Status == 1 ? 'success':'danger'}}">{{$list_Sections->Status == 1 ? 'نشط':'غير نشط'}}</label> --}}
                                                                </td>

                                                                <td>
                                                                    {{-- <a href="{{route('Attendance.show',$list_Sections->id)}}" class="btn btn-warning btn-sm" role="button" aria-pressed="true">قائمة الطلاب</a> --}}
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                </div>
                {{-- +++++++++++++++++++++++++++++++++++++++++++++++++++++ --}}
                {{-- ++++++++++++++++++++++++++++++++بداية المدلات++++++++++++++++++++++++++++++ --}}
                                            {{-- +++ مدالا الاضاقة++ --}}
                            <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
          {{-- _______ --}}
          <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;"
                    class="modal-title"
                    >
                    {{ trans('city_category.add new categories') }}
                </h5>
                <button type="button" class="close"
                        data-dismiss="modal"
                        aria-label="Close">
                <span
                    aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form
                    action="{{route('cits_categories_create')}}"
                    method="post">
                    @csrf


                    <input id="id" type="hidden"
                           name="city_id"
                           class="form-control"
                           value="">
                           <div class="form-group">
                            <select class="custom-select mr-sm-2" name="Categories_id[]" multiple>
                                @foreach( $Categories as  $Category)
                                    <option value="{{ $Category->id }}">{{ $Category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    <div class="modal-footer">
                        <button type="button"
                                class="btn btn-secondary"
                                data-dismiss="modal">{{ trans('city_category.Close') }}</button>
                        <button type="submit"
                                class="btn btn-danger">{{ trans('city_category.add new categories') }}</button>
                    </div>
                </form>
            </div>
        </div>
        {{-- _________ --}}


    </div>
  </div>
</div>

{{-- +++ مدولا التعديل +++++++++++++++ --}}

<div class="modal fade" id="exampleModal6" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        {{-- _______ --}}
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;"
                    class="modal-title"
                    id="">
                    {{ trans('city_category.edit categories') }}

                </h5>
                <button type="button" class="close"
                        data-dismiss="modal"
                        aria-label="Close">
                <span
                    aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form
                    action="{{route('cits_categories_update')}}"
                    method="post">
                    {{ method_field('post') }}
                    @csrf

                    <input id="id" type="hidden"
                           name="city_id"
                           class="form-control"
                           value="">
                           <div class="form-group">
                            <select class="custom-select mr-sm-2" name="Categories_id[]" multiple>
                                @foreach( $Categories as  $Category)
                                    <option value="{{ $Category->id }}">{{ $Category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    <div class="modal-footer">
                        <button type="button"
                                class="btn btn-secondary"
                                data-dismiss="modal">{{ trans('city_category.Close') }}</button>
                        <button type="submit"
                                class="btn btn-danger">{{ trans('city_category.edit categories') }}</button>
                    </div>
                </form>
            </div>
        </div>
        {{-- _________ --}}

    </div>


</div>



{{-- ++++++++++++++نهاية مدلا التعديل +++++ --}}

{{-- ============ بداية مودل الحذف للمنتج ======== --}}
<div class="modal fade" id="exampleModal5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        {{-- _______ --}}
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;"
                    class="modal-title"
                    id="">
                {{trans('city_category.delet category')}}
                </h5>
                <button type="button" class="close"
                        data-dismiss="modal"
                        aria-label="Close">
                <span
                    aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form
                    action="{{route('cits_categories_delete',['d'])}}"
                    method="post">
                    {{ method_field('post') }}
                    @csrf
                    {{trans('city_category.Are you sure?')}}
                    <input id="categoryid" type="hidden"
                           name="categoryid"
                           class="form-control"
                           value="">
                           <input id="cityid" type="hidden"
                           name="cityid"
                           class="form-control"
                           value="">
                    <div class="modal-footer">
                        <button type="button"
                                class="btn btn-secondary"
                                data-dismiss="modal">{{ trans('city_category.Close') }}</button>
                        <button type="submit"
                                class="btn btn-danger">{{ trans('city_category.delet category') }}</button>
                    </div>
                </form>
            </div>
        </div>
        {{-- _________ --}}

    </div>


</div>

  {{-- ===================نهاية مودل الحذف للمنتج ========= --}}

                {{-- ++++++++++++++++++++++++++++++++بداية المدلات++++++++++++++++++++++++++++++ --}}

            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

<script>
    // سكربت الاضافة

  $('#exampleModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('id')

    var modal = $(this)
    modal.find('.modal-body  #id').val(id)

  })
  </script>
<script>
    // سكربت الحذف

  $('#exampleModal5').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var categoryid = button.data('categoryid')
    var cityid = button.data('cityid')

    var modal = $(this)
    modal.find('.modal-body  #categoryid').val(categoryid)
    modal.find('.modal-body  #cityid').val(cityid)

    cityid

  })
  </script>

<script>

    // --سكربت المودل الثالث للخاص بتعديل المنتج --------------
$('#exampleModal6').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('id')
    var name = button.data('name')

    var modal = $(this)
    modal.find('.modal-body  #id').val(id)
    modal.find('.modal-body  #name').val(name)

  })
</script>

@endsection
