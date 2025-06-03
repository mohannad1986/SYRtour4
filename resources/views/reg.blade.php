<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>انشاء حساب</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    {{-- <link rel="stylesheet" href="./style.css"> --}}


    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:200,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900">

    <link href="{{ URL::asset('assets/css/ltr.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/stylelogin.css') }}" rel="stylesheet">


</head>

<body>
    <!-- partial:index.partial.html -->
    <h1>انشاء حساب</h1>
    {{-- <h2>Transitioning Between Variable Heights</h2> --}}

    <div class="container">

        <div class="demo-section">
            <!-- <p>Praesent nonummy mi in odio. Nullam accumsan lorem in dui. Vestibulum turpis sem, aliquet eget, lobortis pellentesque, rutrum eu, nisl. Nullam accumsan lorem in dui. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.</p> -->
        </div>

        <div class="tab-wrap">

            <!-- active tab on page load gets checked attribute -->
            <input type="radio" id="tab1" name="tabGroup1" class="tab" checked>
            <label for="tab1">سائح</label>

            <input type="radio" id="tab2" name="tabGroup1" class="tab">
            <label for="tab2">مالك منشأة</label>

            <input type="radio" id="tab3" name="tabGroup1" class="tab">
            <label for="tab3">ادمن</label>
{{-- +++++++++++++++++++++++++++++++++++++++++++++++++++++++++ --}}
            <div class="tab__content">
                <h3 class="text-center">  سائح</h3>
                {{-- +++بداية الفورم ++++ --}}

                <form method="post"  action="{{ route('tourist.store') }}" autocomplete="off">
                    @csrf
                    <div class="row">


                        <div class="col-md-12">
                            <div class="form-group">
                                <label> اسم السائح </label>
                                <input  class="form-control" name="name" value="" type="text" >
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label> الايميل</label>
                                <input  class="form-control" name="email" value="" type="email" >

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label> كلمة السر</label>
                                <input  class="form-control" name="password" value="" type="password" >

                            </div>
                        </div>
                    </div>
                    <a  class="btn btn-link" href="{{ route('loginshow') }}"> <button class="btn btn-danger btn-sm nextBtn btn-lg pull-right" type="button" >{{trans('I have an acouunt')}}</button></a>


                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">{{trans('Register tourist account')}}</button>
                </form>

                {{-- +++++ نهاية الفةرم ++++ --}}
            </div>

{{-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ --}}
            <div class="tab__content">
                <h3 class="text-center"> مالك منشأة</h3>


                    {{-- +++بداية الفورم ++++ --}}

                    <form method="post"  action="{{ route('owner.store') }}" autocomplete="off">
                        @csrf
                        <div class="row">


                            <div class="col-md-12">
                                <div class="form-group">
                                    <label> اسم مالك المنشأة </label>
                                    <input  class="form-control" name="name" value="" type="text"  autocomplete="off" >
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label> الايميل</label>
                                    <input  class="form-control" name="email" value="" type="email" autocomplete="off">

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label> كلمة السر</label>
                                    <input  class="form-control" name="password" value="" type="password" >

                                </div>
                            </div>
                        </div>

                        <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">{{trans('register owner account')}}</button>
                    </form>

                    {{-- +++++ نهاية الفةرم ++++ --}}
                </div>



{{-- +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ --}}

            <div class="tab__content">
                <h3 class="text-center">انشاء ادمن </h3>
                {{-- <p>Praesent nonummy mi in odio. Nullam accumsan lorem in dui. Vestibulum turpis sem, aliquet eget, lobortis pellentesque, rutrum eu, nisl. Nullam accumsan lorem in dui. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.</p> --}}
                <form method="POST" action="{{ route('register') }}" autocomplete="off">
                    @csrf
                    <div class="row">


                        <div class="col-md-12">
                            <div class="form-group">
                                <label> اسم الادمن  </label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label > الايميل</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label> كلمة السر</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                  {{-- ++++++++++++++++++++++++++++++ --}}
                  <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-end">تاكيد كلمة السر</label>


                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>

                    </div>
                  </div>
                    {{-- +++++++++++++++++++++++++++++++ --}}

                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">{{trans('register Admin acount')}}</button>
                </form>


            </div>

        </div>





    </div>
    <!-- partial -->

</body>

<script>
    @toastr_js
    @toastr_render

 </script>

</html>
