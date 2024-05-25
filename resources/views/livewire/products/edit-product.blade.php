<div>
    @if (session('success'))
    <div class="alert alert-success animate-pulse bg-blue-200 rounded text-blue-800 p-4 mb-2 flex items-center">
        <i class="fas fa-check-circle mr-2"></i>
        <span>{{ session('success') }}</span>
    </div>
@endif

    <h1 class=" text-xl font-bold flex items-center mb-10" >

        <div class="mr-2 text-gray-600">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
              </svg>

        </div>
        <div class="">
            <a href="{{route('product.index')}}" class="text-gray-600">
                Product

            </a>
            <span class=" text-md inline-block text-gray-600"> > </span>
            <span>
                Edit

            </span>
        </div>
 </h1>
    <form wire:submit="save" class="">
        {{ $this->form }}

        {{-- <button type="submit">
            Submit
        </button> --}}
        <div class="mt-4">
            <x-filament::button wire:click="save">Update</x-filament::button>

        </div>
    </form>

    <x-filament-actions::modals />
</div>
