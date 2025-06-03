@if($currentStep != 2)
    <div style="display: none" class="row setup-content" id="step-2">
 @endif
        <div class="col-xs-12">
            <div class="col-md-12">
                <br>

                <div class="form-row">
                    <div class="col">


                        <div>
                            <label for="title">{{trans('tourist.Choose city')}}</label>
                            <select class="custom-select my-1 mr-sm-2" wire:model="selectedClass">
                                <option value="">{{trans('tourist.Choose city')}}</option>

                                @foreach ($cites as $city)
                                <option value="{{ $city->id}}">{{$city->name}}</option>

                                @endforeach

                            </select>

                            @error('selectedTown')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            @error('selectedcategoryy')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                        </div>


                        @if (!is_null($towns))
                        <div>
                            <label for="title">{{trans('tourist.Choose Town')}}</label>


                                <select class="custom-select my-1 mr-sm-2" wire:model="selectedTown">
                                    <option value="" selected>{{trans('tourist.Choose Town')}}</option>

                                    @foreach($towns as $town)
                                        <option value="{{$town->id }}">{{ $town->name }}</option>
                                    @endforeach

                                </select>


                                <label for="title">{{trans('tourist.Choose Category')}}</label>


                                <select class="custom-select my-1 mr-sm-2" wire:model="selectedcategoryy">
                                    <option value="" selected>{{trans('tourist.Choose Category')}}</option>

                                    @foreach($cateees as $caty)
                                        <option value="{{$caty->id }}">{{ $caty->name }}</option>
                                    @endforeach

                                </select>




                        </div>

                        @endif




                        {{-- <div>
                            <label for="title">{{trans('tourist.town')}}</label>
                            <select class="custom-select my-1 mr-sm-2" wire:model="town_id">
                                <option value="">{{trans('tourist.Coose')}}</option>

                                @foreach ($town as $tow)
                                <option value="{{ $tow->id}}">{{$tow->name}}</option>

                                @endforeach

                            </select>
                            @error('town_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                        </div> --}}

                        {{-- <div>
                            <label for="title">{{trans('tourist.category')}}</label>

                            <select class="custom-select my-1 mr-sm-2"  wire:model="category_id">
                                <option value="">Select an option</option>

                                @foreach ($category as $catego)
                                <option value="{{$catego->id}}">{{$catego->name}}</option>

                                @endforeach

                            </select>
                            @error('category_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                        </div> --}}












                    </div>

                </div>






                </div>



                <button class="btn btn-danger btn-sm nextBtn btn-lg pull-right" type="button" wire:click="back(1)">
                    {{trans('tourist.Back')}}

                </button>

                @if($updateMode)
                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" wire:click="secondStepSubmit_edit"
                            type="button">
                            {{trans('tourist.Next')}}

                    </button>
                @else
                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="button"
                            wire:click="secondStepSubmit">  {{trans('tourist.Next')}}
                        </button>
                @endif

            </div>
        </div>




