<div class="search">
    <a class="search-btn not_click"></a>
    <div class="search-box not-click">
        <form>
        <input type="text" wire:model="search" class="not-click form-control" placeholder="Search"
           >
        </form>
         {{-- <i class="fa fa-search not-click"></i> --}}

        <ul class="list-group">
            @if ($fac && $fac->count()>0)

            @foreach ($fac as $faco )
            <li><a href="{{route('facility.show',$faco->id)}}"> {{ $faco->name}}</a></li>

            @endforeach

            @else
            {{-- <li></li> --}}
            @endif


        </ul>
    </div>
</div>
