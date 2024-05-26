<div class="mx-auto max-w-7xl sm:px-6 sm:py-24 lg:px-8">
    <div class="max-w-xl mb-4">
        <p class="mt-2 text-4xl font-bold tracking-tight sm:text-5xl">Order Details</p>
    </div>
    <div>
        <h1 class="text-3xl font-bold tracking-tight text-gray-900 mr-2">Order.{{$record->id}}</h1>
        <p>{{$record->created_at->format('M d, Y')}}</p>
    </div>
    @foreach ($record->items as $item)
    <div class="mb-6  hover:bg-white p-4 my-2">
       
        <div class=" border-t pt-4">
            <h2 class="sr-only"></h2>
            <h3 class="sr-only">Items</h3>
            <div class="flex space-x-6 ">
                <img src="{{$item->variant->getImage()}}" alt="Glass bottle with black plastic pour top and mesh insert." class="h-20 w-20 flex-none rounded-lg bg-gray-100 object-cover object-center sm:h-40 sm:w-40">
                <div class="flex flex-auto flex-col">
                    <div>
                        <h4 class="font-medium text-gray-900">
                            <p class="capitalize">{{$item->variant->name}} </p>
                            <p class="mt-2 text-sm font-medium text-gray-900">₱ {{number_format($item->variant->price)}}</p>
                            <p class="uppercase text-gray-400">{{$item->variant->product->name}}</p>
                        </h4>
                        <p class="mt-2 text-sm text-gray-600">{{$item->variant->product->description}}</p>
                    </div>
                    <div class="mt-6 flex flex-1 items-end">
                        <dl class="flex space-x-4 divide-x divide-gray-200 text-sm sm:space-x-6">
                            <div class="flex">
                                <dt class="font-medium text-gray-900">Quantity</dt>
                                <dd class="ml-2 text-gray-700 flex items-center">
                                    <span class="mx-2">{{$item->quantity}}</span>
                                </dd>
                            </div>
                            <div class="flex pl-4 sm:pl-6">
                                <dt class="font-medium text-gray-900">Price</dt>
                                <dd class="ml-2 text-gray-700">₱ {{number_format($item->itemPrice())}} </dd>
                            </div>
                        </dl>
                    </div>
                </div>
            </div>
           
        </div>
    </div>
    @endforeach

    <div class="flex items-center justify-between py-4 bg-gray-900 text-white px-4">
        <dt class="text-2xl font-medium ">Total</dt>
        <dd class="text-2xl font-medium ">₱ {{number_format($record->totalSummary())}}</dd>
    </div>
    {{-- <a href="{{route('client-dashboard')}}" class="flex flex-shrink-0 items-center justify-center mx-auto">
        <img class="h-40 w-40 " src="{{asset('images/app_logo.png')}}" alt="Your Company">
      </a> --}}
      <p class="mt-8  text-xl mb-2 text-gray-500">Please fillup information Below</p>
    <div class="max-w-7xl m-auto bg-gray-100 p-6 rounded">

        <form wire:submit="save">
            {{ $this->form }}
            <div class="mt-4">
                <x-filament::button style="width: 100%" wire:click="save">Place Order</x-filament::button>
            </div>
        </form>
    </div>

    <x-filament-actions::modals />
</div>
