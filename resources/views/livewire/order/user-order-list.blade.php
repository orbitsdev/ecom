<div class="bg-gray-50">
    <div class="mx-auto max-w-3xl px-4 py-16 sm:px-6 sm:py-24 lg:px-8">
        <div class="max-w-xl mb-4">
            <p class="mt-2 text-4xl font-bold tracking-tight sm:text-5xl">Order Details</p>
            
        </div>

        @foreach ($orders as $order)

        <div class="mb-6 border-b-2 hover:bg-white p-4 ">

            <div class="">

                <h1 class="text-3xl font-bold tracking-tight text-gray-900  mr-2">SKU # {{$order->sku}}</h1>
                <p class=" ">{{$order->created_at->format('M d, Y')}}</p>
            </div>
        <div class="mt-10 border-t border-gray-200">
            <h2 class="sr-only"></h2>

            <h3 class="sr-only">Items</h3>
            @foreach ($order->items as $item)

            <div class="flex space-x-6 border-b border-gray-200 py-10">
                <img src="{{$item->variant->getImage()}}"
                     alt="Glass bottle with black plastic pour top and mesh insert."
                     class="h-20 w-20 flex-none rounded-lg bg-gray-100 object-cover object-center sm:h-40 sm:w-40">
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
                                <dt class="font-medium text-gray-900">Quantity </dt>
                                <dd class="ml-2 text-gray-700 flex items-center">
                                    {{($this->subQuantityAction)(['record'=> $item->id,'order'=> $order->id])}}
                                    <span class="mx-2">{{$item->quantity}}</span>
                                    {{($this->addQuantityAction)(['record'=> $item->id,'order'=>$order->id])}}

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
          
         
            @endforeach

            <div class="flex items-center justify-between py-4">
                <dt class="font-medium text-gray-900">Total</dt>
                <dd class="text-2xl font-medium text-app-600">{{number_format($order->totalSummary())}}</dd>

             </div>
             <div class="my-2 mb-4">
                {{($this->checkoutAction)(['record'=>$order->id])}} 
            </div>
            

        </div>
    </div>
  

        @endforeach
    </div>
    <x-filament-actions::modals />
</div>
