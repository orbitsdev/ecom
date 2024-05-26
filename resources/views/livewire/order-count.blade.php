
<div >

{{-- <div wire:poll.5s> --}}

    @if($orders_count > 0)
    <div class="absolute bg-red-600 text-white rounded-full w-6 h-6 flex items-center justify-center text-xs top-0 right-0 transform translate-x-1/2 -translate-y-1/2">{{$orders_count}}</div>
    
    @else
    <div></div>
    @endif
</div>
