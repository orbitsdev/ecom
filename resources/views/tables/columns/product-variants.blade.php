<div class="ml-4">
    @foreach ($getRecord()->variants as  $variant)
    <p>
        {{{$variant->name}}} - {{$variant->price}}

    </p>
    @endforeach
    {{-- {{ $getState() }} --}}
</div>
