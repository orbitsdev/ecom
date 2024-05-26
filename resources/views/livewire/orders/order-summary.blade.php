<main class="bg-gray-50 px-4 pb-24  sm:px-6 sm:pt-24 lg:px-8 ">
    <div class="mx-auto max-w-3xl">
      <div class="max-w-xl">
      
        <h1 class="text-3xl font-bold tracking-tight text-gray-900">Order Details</h1>
        <dl class="mt-12 text-sm font-medium">
         
          <dt class="text-gray-900 text-lg">Tracking number</dt>
          <dd class="mt-2 text-gray-900 text-2xl font-bold  capitalize">{{$record->sku}}</dd>
          <div class="mt-4">
            <dd class="mt-2 text-2xl font-bold capitalize">
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-sm font-medium 
                    @if ($record->status == 'accepted') bg-green-100 text-green-800 
                    @elseif ($record->status == 'receive') bg-blue-100 text-blue-800 
                    @elseif ($record->status == 'preparing') bg-yellow-100 text-yellow-800 
                    @elseif ($record->status == 'cancelled') bg-red-100 text-red-800 
                    @else bg-gray-100 text-gray-800 @endif">
                    {{$record->status}}
                </span>
            </dd>
        </div>
        </dl>
      </div>
  
      <section aria-labelledby="order-heading" class="mt-10 border-t border-gray-200">
        <h2 id="order-heading" class="sr-only">Your order</h2>
  
        <h3 class="sr-only">Items</h3>
        @forelse ($record->items as $item)
        <div class="flex space-x-6 border-b border-gray-200 py-10">
            <img src="{{$item->variant->getImage()}}" alt="Glass bottle with black plastic pour top and mesh insert." class="h-20 w-20 flex-none rounded-lg bg-gray-100 object-cover object-center sm:h-40 sm:w-40">
            <div class="flex flex-auto flex-col">
              <div>
                <h4 class="font-medium text-gray-900">
                  <p href="#">{{$item->variant->name}}</p>
                </h4>
                <p class="mt-2 text-sm text-gray-600">{{$item->variant->product->description}}</p>
              </div>
              <div class="mt-6 flex flex-1 items-end">
                <dl class="flex space-x-4 divide-x divide-gray-200 text-sm sm:space-x-6">
                  <div class="flex">
                    <dt class="font-medium text-gray-900">Quantity</dt>
                    <dd class="ml-2 text-gray-700">{{$item->quantity}}</dd>
                  </div>
                  <div class="flex pl-4 sm:pl-6">
                    <dt class="font-medium text-gray-900">Price</dt>
                    <dd class="ml-2 text-gray-700">₱{{$item->itemPrice()}}</dd>
                  </div>
                </dl>
              </div>
            </div>
          </div> 
        @empty
            
        @endforelse
       
  
        <div class="sm:ml-40 sm:pl-6">
          <h3 class="sr-only">Your information</h3>
  
          <h4 class="sr-only">Addresses</h4>
          <dl class="grid grid-cols-2 gap-x-6 py-10 text-sm">
            <div>
              <dt class="font-medium text-gray-900">Shipping address</dt>
              <dd class="mt-2 text-gray-700">
                <address class="not-italic">
                    <span class="block">Name</span>
                    <span class="block">Phone</span>
                    <span class="block">Address</span>
                </address>
              </dd>
            </div>
            <div>
              <dt class="font-medium text-gray-900"></dt>
              <dd class="mt-2 text-gray-700">
                <address class="not-italic">
                  <span class="block">{{Auth::user()->name}}</span>
                  <span class="block">{{$record->phone}}</span>
                  <span class="block">{{$record->address}}</span>
                </address>
              </dd>
            </div>
          </dl>
  
          <h4 class="sr-only">Payment</h4>
          <dl class="grid grid-cols-2 gap-x-6 border-t border-gray-200 py-10 text-sm">
            <div>
              <dt class="font-medium text-gray-900">Payment method</dt>
              <dd class=" text-gray-700">
                <p>{{$record->payment_method}}</p>

              </dd>
            </div>
          
          </dl>

          <dl class="grid grid-cols-2 gap-x-6 border-t border-gray-200 py-10 text-sm">
            <div>
              <dt class="font-medium text-gray-900">Payment method</dt>
              <dd class=" text-gray-700">
                <p>Name</p>
                <p>Phone</p>
              
              </dd>
            </div>
            <div>
              <dt class="font-medium text-gray-900">{{$record->name}}</dt>
              <dd class="mt-4 text-gray-700">
                <p>{{$record->rider_name}}</p>
                <p>{{$record->rider_phone_number}}</p>
              </dd>
            </div>
          </dl>
  
          <h3 class="sr-only">Summary</h3>
  
          <dl class=" border-t border-gray-200 p-4  bg-app-600  text-white text-sm">
            <div class="flex justify-between">
              <dt class="font-bold 0 text-xl">Total</dt>
              <dd class="font-bold text-xl">₱ {{number_format($record->totalSummary())}}</dd>
            </div>
            
          </dl>

          
        </div>
      </section>

      
    </div>

    @if ($record->status == 'accepted' || $record->status == 'receive')
    <div class="max-w-7xl mx-auto sm:px-6 py-12 lg:px-8">
      <div class="max-w-xl mb-8">
        <p class="mt-2 text-4xl font-bold tracking-tight sm:text-5xl">Timeline</p>
    </div>
    
    
        <div class="flow-root">
            <ul class="-mb-8">
                @forelse ($record->logistics()->latest()->get() as $index => $logistic)
                <li>
                    <div class="relative pb-8">
                        @if ($index < $record->logistics()->count() - 1)
                            <span class="absolute top-5 left-5 -ml-px h-full w-0.5 bg-gray-200" aria-hidden="true"></span>
                        @endif
                        <div class="relative flex space-x-3">
                            <div>
                                <span class="h-10 w-10 rounded-full {{ $index === 0 ? 'bg-app-600' : 'bg-gray-400' }} flex items-center justify-center ring-8 ring-white">
                                    <svg class="h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm-1.707-7.707a1 1 0 011.414 0L10 10.586l2.293-2.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-1.5-1.5a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                    </svg>
                                </span>
                            </div>
                            <div class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4">
                                <div>
                                    <p class="text-sm {{ $index === 0 ? 'text-gray-900' : 'text-gray-500' }}">Parcel Current Location: <span class="font-medium">{{ $logistic->parcel_current_location }}</span></p>
                                    <p class="mt-1 text-sm {{ $index === 0 ? 'text-gray-900' : 'text-gray-500' }}">Storage House: <span class="font-medium">{{ $logistic->storage_house }}</span></p>
                                    <p class="mt-1 text-sm {{ $index === 0 ? 'text-gray-900' : 'text-gray-500' }}">{{$logistic->status }}</span></p>
                                </div>
                                <div class="text-right text-sm whitespace-nowrap {{ $index === 0 ? 'text-gray-900' : 'text-gray-500' }}">
                                    <time datetime="{{ $logistic->created_at }}">{{ $logistic->created_at->format('M d, Y h:i A') }}</time>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                @empty
                <li>
                    <div class="relative pb-8">
                        <div class="relative flex space-x-3">
                            <div class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4">
                                <div>
                                    <p class="text-sm text-gray-500">No logistics data available.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                @endforelse
            </ul>
        </div>
    </div>
    @endif
    
  

   
    
  </main>
  