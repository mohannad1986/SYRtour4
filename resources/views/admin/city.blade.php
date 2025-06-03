@extends('layouts.master')
@section('css')
@toastr_css

@section('title')
{{ trans('city.cities') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ trans('city.cities') }}
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

                        <a href="" class="btn btn-success btn-sm" role="button"
                           aria-pressed="true" data-toggle="modal" data-target="#exampleModal" > {{ trans('city.add new city') }}</a><br><br>

                        <div class="table-responsive">
                            <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                   data-page-length="50"
                                   style="text-align: center">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ trans('city.city name') }}</th>

                                    <th>{{ trans('city.Action') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1;?>
                                @foreach($cities as $city)

                                    <tr id="{{$city->id}}">
                                    <td>{{$i++;}}</td>
                                    <td>{{$city->name}}</td>



                                        <td>
                                            <button type="button" id="{{$city->id}}edit" class="btn btn-info btn-sm" role="button" aria-pressed="true" data-toggle="modal" data-target="#exampleModal6" data-id="{{$city->id}}" data-name_ar="{{$city->getTranslation('name', 'ar')}}" data-name_en="{{$city->getTranslation('name', 'en')}}"><i class="fa fa-edit"></i></a>
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"data-target="#exampleModal5" data-id="{{$city->id}}" title="حذف"><i class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>

                                @endforeach


                            </table>
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
                    {{ trans('city.add city') }}

                </h5>
                <button type="button" class="close"
                        data-dismiss="modal"
                        aria-label="Close">
                <span
                    aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-success" id="success_msg" style="display: none;">
                    {{ trans('city.city inserted successfully') }}
                </div>

                <span class="text-danger" id="file-input-error"></span>

                <form
                action="{{ route('city.store') }}"
                     method="post"
                     id="file-upload"
                  enctype="multipart/form-data" >
                  @csrf

                    {{ csrf_field() }}

                     <label>{{trans('city.inter city name in Arabic')}} </label>
                        <input       type="text"
                                    name="name_ar"
                                    id="name_ar"
                           class="form-control"
                           value="">
                           <label> {{trans('city.inter city name in English')}}</label>
                           <input   type="text"
                                 name="name_en"
                                 id="name_en"
                                  class="form-control"
                                  value="">

                               {{-- <label> {{trans('city.inter city name in English')}}</label> --}}
                           <input  type="file"
                           name="file"
                           id="inputFile"
                            accept="image/*"
                                  class="form-control">
                    <div class="modal-footer">
                        <button type="button"
                                class="btn btn-secondary"
                                data-dismiss="modal">{{ trans('city.close') }}</button>
                        <button type="submit"
                                class="btn btn-danger">{{ trans('city.add new city') }}</button>
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
                    {{ trans('city.edit city') }}
                </h5>
                <button type="button" class="close"
                        data-dismiss="modal"
                        aria-label="Close">
                <span
                    aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-success" id="update_msg" style="display: none;">
                    {{ trans('city.city updated successfully') }}
                </div>

                <span class="text-danger" id="file-input-error-u"></span>
                <form
                    action="{{route('city.update',['e'])}}"
                    method="POST"

                    id="file-edite"
                    enctype="multipart/form-data">
                    @csrf
                    {{ method_field('patch') }}
                    {{-- حط الميثود بوست والراوت يروح عالابديت  --}}
                   تعديل
                    <input id="id" type="hidden"
                           name="id"
                           class="form-control"
                           value="">
                    <label>{{trans('city.inter city name in Arabic')}} </label>
                    <input id="name_ar" type="text"
                           name="name_ar"

                           class="form-control"
                           value="">
                           <label>{{trans('city.inter city name in English')}}</label>
                           <input id="name_en" type="text"
                                  name="name_en"

                                  class="form-control"
                                  value="">

                                         {{-- <label> {{trans('city.inter city name in English')}}</label> --}}
                           <input  type="file"
                           name="file"
                           id="inputFile"
                            accept="image/*"
                                  class="form-control">
                    <div class="modal-footer">
                        <button type="button"
                                class="btn btn-secondary"
                                data-dismiss="modal">{{ trans('city.close') }}</button>
                        <button type="submit"
                                class="btn btn-danger">{{ trans('city.edit city') }}</button>
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
                    {{trans('city.delet city')}}
                </h5>
                <button type="button" class="close"
                        data-dismiss="modal"
                        aria-label="Close">
                <span
                    aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger" id="delete_msg" style="display: none;">
                    {{ trans('city.city deleted successfully') }}
                </div>

                <span class="text-danger" id="file-input-error"></span>

                <form
                action="{{ route('city.destroy',['delete']) }}"
                method="post"
                    id="file-Delete"
                     enctype="multipart/form-data" >

                    {{ method_field('Delete') }}
                    @csrf
                    {{trans('city.Are you sure?')}}
                    <input id="id" type="hidden"
                           name="id"
                           class="form-control"
                           value="">
                    <div class="modal-footer">
                        <button type="button"
                                class="btn btn-secondary"
                                data-dismiss="modal">{{ trans('city.close') }}</button>
                        <button type="submit"
                                class="btn btn-danger">{{ trans('city.delet city') }}</button>
                    </div>
                </form>
            </div>
        </div>
        {{-- _________ --}}

    </div>


</div>

  {{-- ===================نهاية مودل الحذف للمنتج ========= --}}



@endsection
@section('js')

{{-- <script
    src="https://code.jquery.com/jquery-3.5.0.min.js"
    integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ="
    crossorigin="anonymous"></script> --}}

<script>

    // سكربت الحذف

  $('#exampleModal5').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('id')

    var modal = $(this)
    modal.find('.modal-body  #id').val(id)

  })
  </script>

<script>

    // --سكربت المودل الثالث للخاص بتعديل المنتج --------------
$('#exampleModal6').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('id')
    var name_ar = button.data('name_ar')
    var name_en = button.data('name_en')


    var modal = $(this)
    modal.find('.modal-body  #id').val(id)
    modal.find('.modal-body  #name_ar').val(name_ar)
    modal.find('.modal-body  #name_en').val(name_en)


  })

  </script>




{{-- // +++++++++++++++++++++++++الاجاكسسس++++++++++++++++++++++++++++++++++++++++++++ --}}


<script type="text/javascript">

 $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
 });

$('#file-upload').submit(function(e) {
    e.preventDefault();
    let formData = new FormData(this);

    $('#file-input-error').text('');

    $.ajax({
        type:'POST',
        url: "{{ route('city.store') }}",
        data: formData,
        contentType: false,
        processData: false,

        success: function (data) {

                if(data.status == true){
                    $('#success_msg').show();




                }

                this.reset();

            },
        error: function(response){
            $('#file-input-error').text(response.responseJSON.message);

        }
   });
});

</script>

{{-- ++++++++++++++++++++++++++++++  اجاكسسالتعديل +++++++++++++++++++++++++++++++++++++++++++++++++++++ --}}

<script type="text/javascript">

    $.ajaxSetup({
       headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       }
    });

   $('#file-edite').submit(function(e) {
       e.preventDefault();
       let formData = new FormData(this);

       $('#file-input-error').text('');

       $.ajax({
           type:'POST',
           url: "{{ route('city.update',['e'])}}",
           data: formData,
           contentType: false,
           processData: false,

           success: function (data) {

                   if(data.status == true){

                    var id=data.id;

                       $('#update_msg').show();

                       $('#'+id).css("opacity","0.5");

                       $('#'+id+'edit').attr("disabled","disabled");

                    //    id="bupdate"





                   }

                   this.reset();

               },
           error: function(response){
               $('#file-input-error-u').text(response.responseJSON.message);

           }
      });
   });

   </script>

{{-- // ++++++++++++++++++++++++++اجاكس الحذف+++++++++++++++++++++++++++++++++++++++++++++++++++++ --}}
<script type="text/javascript">

    $.ajaxSetup({
       headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       }
    });

   $('#file-Delete').submit(function(e) {
       e.preventDefault();
       let formData = new FormData(this);

       $('#file-input-error').text('');

       $.ajax({
           type:'POST',
           url: "{{ route('city.destroy',['delete'])}}",
           data: formData,
           contentType: false,
           processData: false,

           success: function (data) {

                   if(data.status == true){

                    var id=data.id;
                       $('#delete_msg').show();
                       $('#'+id).hide();


                   }

                   this.reset();

               },
           error: function(response){
               $('#file-input-error').text(response.responseJSON.message);

           }
      });
   });

   </script>
{{-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ --}}

<script>

@toastr_js
@toastr_render

</script>

@endsection
