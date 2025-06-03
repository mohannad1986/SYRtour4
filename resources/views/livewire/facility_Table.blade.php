<button class="btn btn-success btn-sm btn-lg pull-right" wire:click="showformadd" type="button">{{ trans('tourist.Add facility') }}</button><br><br>
<div class="table-responsive">
    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
           style="text-align: center">
        <thead>
        <tr class="table-success">
            <th>#</th>
               <th>{{ trans('tourist.facility name') }}  </th>
                            <th>{{ trans('tourist.town') }} </th>
                            <th>{{ trans('tourist.category') }} </th>
                            <th>{{ trans('tourist.city') }} </th>
                            <th>{{ trans('tourist.owner') }} </th>
                            <th>{{ trans('tourist.prosejers') }}</th>
        </tr>
        </thead>
        <tbody>
        <?php $i = 0; ?>
        @foreach ($facilites as $facility)
            <tr>
                <?php $i++; ?>
                <td>{{ $i }}</td>
                <td>{{ $facility->name }}</td>
                <td>{{ $facility->town->name }}</td>
                <td>{{ $facility->category->name }}</td>
                <td>{{$facility->town->city->name}}</td>
                @if(isset($facility->owner->name))
                <td>{{$facility->owner->name}}</td>

                @else
                <td>  {{ trans('tourist.no owner') }}</td>
                @endif

                <td>
                    <button wire:click="edit({{ $facility->id }})" title="{{ trans('Grades_trans.Edit') }}"
                            class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button>
                    <button type="button" class="btn btn-danger btn-sm" wire:click="delete({{ $facility->id }})" title="{{ trans('Grades_trans.Delete') }}"><i class="fa fa-trash"></i></button>
                </td>
            </tr>
        @endforeach
    </table>
</div>
