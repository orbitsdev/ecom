<div class="bg-gray-50">
    <div class="py-16 sm:py-24">
      <div class="mx-auto max-w-7xl sm:px-2 lg:px-8">
        <div class="mx-auto max-w-2xl px-4 lg:max-w-4xl lg:px-0">
          <h1 class="text-2xl font-bold tracking-tight text-gray-900 sm:text-3xl">To Ship</h1>
          <p class="mt-2 text-sm text-gray-500">Check the status of recent orders</p>
        </div>
      </div>
      
      @forelse ($orders as $order)
          
      <div class="mt-16">
        <h2 class="sr-only">Recent orders</h2>
        <div class="mx-auto max-w-7xl sm:px-2 lg:px-8">
          <div class="mx-auto max-w-2xl space-y-8 sm:px-4 lg:max-w-4xl lg:px-0">
            <div class="border-b border-t border-gray-200 bg-white shadow-sm sm:rounded-lg sm:border">
              <h3 class="sr-only">Order placed on <time datetime="2021-07-06">{{$order->created_at->format('M, d Y')}}</time></h3>
  
              <div class="flex items-center border-b border-gray-200 p-4 sm:grid sm:grid-cols-4 sm:gap-x-6 sm:p-6">
                <dl class="grid flex-1 grid-cols-2 gap-x-6 text-sm sm:col-span-3 sm:grid-cols-3 lg:col-span-2">
                  <div>
                    <dt class="font-medium text-gray-900">Order number</dt>
                    <dd class="mt-1 text-gray-500">{{$order->sku}}</dd>
                  </div>
                
                  <div>
                    <dt class="font-medium text-gray-900">Total amount</dt>
                    <dd class="mt-1 font-medium text-gray-900">₱ {{number_format($order->totalSummary())}}</dd>
                  </div>
                
                  <div>
                    <dt class="font-medium text-gray-900">Status </dt>
                    <dd class="mt-1 font-medium text-gray-900">{{$order->status}}</dd>
                  </div>
                </dl>
  
                <div class="relative flex justify-end lg:hidden">
                  <div class="flex items-center">
                    <button type="button" class="-m-2 flex items-center p-2 text-gray-400 hover:text-gray-500" id="menu-0-button" aria-expanded="false" aria-haspopup="true">
                      <span class="sr-only">Options for order WU88191111</span>
                      <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z" />
                      </svg>
                    </button>
                  </div>
  
              
                  <div class="absolute right-0 z-10 mt-2 w-40 origin-bottom-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="menu-0-button" tabindex="-1">
                    <div class="py-1" role="none">
                      <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                      <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-0-item-0">View</a>
                     
                    </div>
                  </div>
                </div>
  
                <div class="hidden lg:col-span-2 lg:flex lg:items-center lg:justify-end lg:space-x-4">
                  <a href="{{route('order.summary',['record'=> $order->id])}}" class="flex items-center justify-center rounded-md border border-gray-300 bg-white px-2.5 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-app-500 focus:ring-offset-2">
                    <span>View Order</span>
                 
                  </a>
                 
                </div>
              </div>
  
              <!-- Products -->
              <h4 class="sr-only">Items</h4>
              <ul role="list" class="divide-y divide-gray-200">
                @forelse ($order->items as $item)
                <li class="p-4 sm:p-6">
                 
                    <div class="flex items-center sm:items-start">
                      <div class="h-20 w-20 flex-shrink-0 overflow-hidden rounded-lg bg-gray-200 sm:h-40 sm:w-40">
                        <img src="{{$item->variant->getImage()}}" alt="Moss green canvas compact backpack with double top zipper, zipper front pouch, and matching carry handle and backpack straps." class="h-full w-full object-cover object-center">
                      </div>
                      <div class="ml-6 flex-1 text-sm">
                      
                        <div class="font-medium text-gray-900 sm:flex sm:justify-between capitalize">
                          <h5>{{$item->variant->name}}</h5>
                     
                          <div class="flex flex-col ">
                            <p class="mt-2 sm:mt-0">₱{{number_format($item->variant->price)}}</p>
                            <p class="mt-2 sm:mt-0">₱ {{number_format($item->variant->price)}} x {{$item->quantity}} = ₱ {{number_format($item->itemPrice())}}</p>

                        </div>
                        </div>
                        <p class="hidden text-gray-500 sm:mt-2 sm:block">{{$item->variant->product->description}}</p>
                      </div>
                    </div>
    
                    <div class="mt-6 sm:flex sm:justify-between">
                      <div class="flex items-center">
                        {{-- <svg class="h-5 w-5 text-green-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                          <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
                        </svg> --}}
                        <p class="ml-2 text-sm font-medium text-gray-500">Place om Order <time datetime="2021-07-12">{{$order->created_at->format('M, d Y')}}</time></p>
                      </div>
    
                      
                    </div>
                  </li>
    
                @empty

                No Item
                    
                @endforelse
               
                <!-- More products... -->
              </ul>
            </div>
  
            <!-- More orders... -->
          </div>
        </div>
      </div>
      @empty
          
      @endforelse
    </div>
  </div>
  