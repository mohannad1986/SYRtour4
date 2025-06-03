<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>تسجيل الدخول</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    {{-- <link rel="stylesheet" href="./style.css"> --}}


    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:200,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900">

    <link href="{{ URL::asset('assets/css/ltr.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/stylelogin.css') }}" rel="stylesheet">


</head>

<body>
    <!-- partial:index.partial.html -->
    <h1> تسجيل الدخول</h1>
    {{-- <h2>Transitioning Between Variable Heights</h2> --}}

    @if (\Session::has('message'))
    <div class="alert alert-danger text-center">
     <li>{!! \Session::get('message') !!}</li>
    </div>
    @endif

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
                <h3 class="text-center">سائح</h3>
                {{-- +++بداية الفورم ++++ --}}

                <form method="post"  action="{{ route('login') }}" >
                    @csrf
                    <div class="row">

                        <input  class="form-control" name="type" value="tourist" type="hidden" >



                        <div class="col-md-12">
                            <div class="form-group">
                                <label> الايميل</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus >

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
                                <label> الباسورد</label>
                                <input  id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" >

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>
                    </div>

                       <div>
                        <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">{{trans('تسجيل دخول')}}</button>
                       </div>
                    <div>

                    <a  class="btn btn-link" href="{{ route('rego') }}"> <button class="btn btn-danger btn-sm nextBtn btn-lg pull-right" type="button" >{{trans('have no acouunt')}}</button></a>

                   </div>
                    @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                    @endif
                </form>

                {{-- +++++ نهاية الفةرم ++++ --}}


            </div>

{{-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ --}}
            <div class="tab__content">
                <h3 class="text-center"> مالك منشأة</h3>

                {{-- +++++++++++++++++++++++++++++++++++++++++++++++++++++++++ --}}

                {{-- +++بداية الفورم ++++ --}}

                <form method="post"  action="{{ route('login') }}" >
                    @csrf
                    <div class="row">

                        <input  class="form-control" name="type" value="owner" type="hidden" >



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
                                <label> الباسورد</label>
                                <input  class="form-control" name="password" value="" type="password" >

                            </div>
                        </div>
                    </div>
                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">{{trans('Students_trans.submit')}}</button>


                </form>

                {{-- +++++ نهاية الفةرم ++++ --}}


{{-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ --}}

            </div>

            <div class="tab__content">
                <h3 class="text-center"> ادمن</h3>
                {{-- <p>Praesent nonummy mi in odio. Nullam accumsan lorem in dui. Vestibulum turpis sem, aliquet eget, lobortis pellentesque, rutrum eu, nisl. Nullam accumsan lorem in dui. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.</p> --}}
                <form method="post"  action="{{ route('login') }}" >
                    @csrf
                    <div class="row">

                        <input  class="form-control" name="type" value="web" type="hidden" >



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
                                <label> الباسورد</label>
                                <input  class="form-control" name="password" value="" type="password" >

                            </div>
                        </div>
                    </div>
                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">{{trans('تسجيل دخول ادمن')}}</button>
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
