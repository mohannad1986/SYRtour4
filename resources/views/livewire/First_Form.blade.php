@if($currentStep != 1)
    <div style="display: none" class="row setup-content" id="step-1">
@endif
        <div class="col-xs-12">
            <div class="col-md-12">
                <br>
                <div class="form-row">
                    <div class="col">
                        <label for="title">{{trans('tourist.Arabic Name')}}</label>
                        <input type="text" wire:model="name_ar"  class="form-control">
                        @error('name_ar')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col">
                        <label for="title">{{trans('tourist.English Name')}}</label>
                        <input type="text" wire:model="name_en"  class="form-control">
                        @error('name_en')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                </div>

                <div class="form-row">

                </div>

                <div class="form-row">







                </div>


                <div class="form-row">



                </div>




                @if($updateMode)
                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" wire:click="firstStepSubmit_edit"
                            type="button">
                            {{trans('tourist.Next')}}

                    </button>
                @else
                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" wire:click="firstStepSubmit"
                            type="button">{{trans('tourist.Next')}}
                    </button>
                @endif

            </div>
        </div>
    </div>
