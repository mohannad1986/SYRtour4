@extends('layouts.master')
@section('css')
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css"> --}} --}}
{{-- <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans%3A400%2C400italic%2C600%2C700%2C700italic%7COswald%3A400%2C300%7CVollkorn%3A400%2C400italic'><link rel="stylesheet" href="./style.css"> --}}



<link rel="stylesheet" href="{{ URL::asset('assets/css/slidestyle.css') }}">


@section('title')
{{ trans('tourist.the facility') }}

@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ trans('tourist.the facility') }}
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
                {{-- ****************************************************** --}}
                <main class="main-content">
                    <section class="slideshow">
                      <div class="slideshow-inner">
                        <div class="slides">
                          {{-- <div class="slide is-active ">
                            <div class="slide-content">
                              <div class="caption">
                                <div class="title">Slide title 1</div>
                                <div class="text">
                                  <p>Slide description 1</p>
                                </div>
                                <a href="#" class="btn">
                                  <span class="btn-inner">Learn More</span>
                                </a>
                              </div>
                            </div>
                            <div class="image-container">
                              <img src="https://www.alixbdanthenay.fr/wp-content/uploads/2015/07/Indispensable-1.jpg" alt="" class="image" />
                            </div>
                          </div> --}}

                        @foreach ($fac->images as  $image)

                        <div class="slide">
                            <div class="slide-content">
                              <div class="caption">
                                {{-- <div class="title">Slide title 2</div> --}}
                                <div class="text">
                                  {{-- <p>Slide description 2</p> --}}
                                </div>
                                {{-- <a href="#" class="btn">
                                  <span class="btn-inner">Learn More</span>
                                </a> --}}
                              </div>
                            </div>
                            <div class="image-container">
                              <img src="{{Storage::url('public/facility_pho/'.$fac->id.'/'.$image->filename.'')}}" alt="" class="image" />
                              {{-- <img src="{{ asset('storage/facility_pho/' . $fac->id . '/' . $image->filename) }}" alt="الصورة" class="image" /> --}}

                            </div>
                          </div>

                        @endforeach


                        </div>

                        <div class="arrows">
                          <div class="arrow prev">
                            <span class="svg svg-arrow-left">
                              <svg version="1.1" id="svg4-Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="14px" height="26px" viewBox="0 0 14 26" enable-background="new 0 0 14 26" xml:space="preserve"> <path d="M13,26c-0.256,0-0.512-0.098-0.707-0.293l-12-12c-0.391-0.391-0.391-1.023,0-1.414l12-12c0.391-0.391,1.023-0.391,1.414,0s0.391,1.023,0,1.414L2.414,13l11.293,11.293c0.391,0.391,0.391,1.023,0,1.414C13.512,25.902,13.256,26,13,26z"/> </svg>
                              <span class="alt sr-only"></span>
                            </span>
                          </div>
                          <div class="arrow next">
                            <span class="svg svg-arrow-right">
                              <svg version="1.1" id="svg5-Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="14px" height="26px" viewBox="0 0 14 26" enable-background="new 0 0 14 26" xml:space="preserve"> <path d="M1,0c0.256,0,0.512,0.098,0.707,0.293l12,12c0.391,0.391,0.391,1.023,0,1.414l-12,12c-0.391,0.391-1.023,0.391-1.414,0s-0.391-1.023,0-1.414L11.586,13L0.293,1.707c-0.391-0.391-0.391-1.023,0-1.414C0.488,0.098,0.744,0,1,0z"/> </svg>
                              <span class="alt sr-only"></span>
                            </span>
                          </div>
                        </div>
                      </div>
                    </section>
                  </main>

                {{-- ++++++++++++++++++++++++++++++++++++++++++++++++++ --}}






            </div>

                   {{-- +++بداية التايبل ++++ --}}
                   <div class="table-responsive">
                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                           data-page-length="50"
                           style="text-align: center">
                        <thead>
                        <tr>

                            <th>{{ trans('tourist.facility name') }}  </th>
                            <th>{{ trans('tourist.town') }} </th>
                            <th>{{ trans('tourist.city') }} </th>
                            <th>{{ trans('tourist.category') }} </th>
                            <th>{{ trans('tourist.owner') }} </th>
                            @if(auth('owner')->check())
                                @if(isset($fac->owner->id))
                                      @if($fac->owner_id == auth()->guard('owner')->user()->id)


                                           <th>{{ trans('tourist.prosejers') }}</th>

                                        @endif

                                @endif

                            @endif
                        </tr>
                        </thead>
                        <tbody>
                        {{-- @foreach($Categories as $Category) --}}
                            <tr>

                            <td>{{$fac->name}}</td>
                            <td>{{$fac->town->name}}</td>
                            <td>{{$fac->town->city->name}}</td>
                            <td>{{$fac->category->name}}</td>
                            @if(isset($fac->owner->name))
                            <td>{{$fac->owner->name}}</td>

                            @else
                            <td>  {{ trans('tourist.no owner') }}</td>
                            @endif



                            @if(auth('owner')->check())
                               @if(isset($fac->owner->id))
                                  @if($fac->owner_id == auth()->guard('owner')->user()->id)

                                            <td>
                                                <button type="button" class="btn btn-info btn-sm" role="button" aria-pressed="true" ><i class="fa fa-edit"></i></a>
                                                <button type="button" class="btn btn-danger btn-sm" title="حذف"><i class="fa fa-trash"></i></button>
                                            </td>
                                    @endif

                                @endif

                            @endif
                            </tr>

                        {{-- @endforeach --}}


                    </table>
                </div>

                {{-- ++++ نهاية التايبل ++++ --}}





        </div>


    </div>



</div>



<!-- row closed -->
@endsection
@section('js')
{{-- <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script> --}}
<script src='https://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.1/TweenMax.min.js'></script>
<script  src="{{ URL::asset('assets/js/slidescript.js') }}"></script>
@endsection
