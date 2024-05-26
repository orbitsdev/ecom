<div class="bg-gray-100">
    <div class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8 lg:pb-24">
      <div class="max-w-xl">
        <h1 class="text-2xl font-bold tracking-tight text-gray-900 sm:text-3xl">Order history</h1>
        <p class="mt-2 text-sm text-gray-500">Check the status of recent orders, manage returns, and download invoices.</p>
      </div>
  
      <div class="mt-16">
        <h2 class="sr-only">Recent orders</h2>
        
        @forelse ($orders as $order)
        <div class="space-y-20 mb-6  mt-10 bg-white p-4 rounded shadow">
            <div>
              {{-- <h3 class="sr-only">Order placed on <time datetime="2021-01-22">{{$order->created_at->format('M ,d Y')}}</time></h3> --}}
    
              <div class="rounded-lg bg-gray-50 px-4 py-6 sm:flex sm:items-center sm:justify-between sm:space-x-6 sm:px-6 lg:space-x-8">
                <dl class="flex-auto space-y-6 divide-y divide-gray-200 text-sm text-gray-600 sm:grid sm:grid-cols-3 sm:gap-x-6 sm:space-y-0 sm:divide-y-0 lg:w-1/2 lg:flex-none lg:gap-x-8">
                  <div class="flex justify-between sm:block">
                    <dt class="font-medium text-gray-900">Date placed</dt>
                    <dd class="sm:mt-1">
                      <time datetime="2021-01-22">{{$order->created_at->format('M ,d Y')}}</time>
                    </dd>
                  </div>
                  <div class="flex justify-between pt-6 sm:block sm:pt-0">
                    <dt class="font-medium text-gray-900">Order number</dt>
                    <dd class="sm:mt-1">{{$order->sku}}</dd>
                  </div>
                  <div class="flex justify-between pt-6 font-medium text-gray-900 sm:block sm:pt-0">
                    <dt>Total amount</dt>
                    <dd class="sm:mt-1">{{number_format($order->totalSummary())}}</dd>
                  </div>
                </dl>

              
                {{-- <a href="{{route('order.summary',['record'=> $order->id])}}" class="mt-6 flex w-full items-center justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:mt-0 sm:w-auto">
                  View More Details

                </a> --}}
              </div>
    
              <table class="mt-4 w-full text-gray-500 sm:mt-6">
                <caption class="sr-only">
                  Products
                </caption>
                <thead class="sr-only text-left text-sm text-gray-500 sm:not-sr-only">
                  <tr>
                    <th scope="col" class="py-3 pr-8 font-normal sm:w-2/5 lg:w-1/3">Items</th>
                    <th scope="col" class="hidden w-1/5 py-3 pr-8 font-normal sm:table-cell">Price</th>
                    {{-- <th scope="col" class="hidden py-3 pr-8 font-normal sm:table-cell">Status</th> --}}
                    <th scope="col" class="w-0 py-3 text-right font-normal">Info</th>
                  </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 border-b border-gray-200 text-sm sm:border-t">
                    @foreach ($order->items as $item )
                        
                    <tr>
                      <td class="py-6 pr-8">
                        <div class="flex items-center">
                          <img src="{{$item->variant->getImage()}}" alt="Detail of mechanical pencil tip with machined black steel shaft and chrome lead tip." class="mr-6 h-16 w-16 rounded object-cover object-center">
                          <div>
                            <div class="font-medium text-gray-900">{{$item->variant->name}}</div>
                            <div class="mt-1 sm:hidden">₱{{number_format($item->variant->price)}}</div>
                          </div>
                        </div>
                      </td>
                      <td class="hidden py-6 pr-8 sm:table-cell">₱{{number_format($item->variant->price)}}</td>
                      {{-- <td class="hidden py-6 pr-8 sm:table-cell">Delivered Jan 25, 2021</td> --}}
                      <td class="whitespace-nowrap py-6 text-right font-medium">
                        {{($this->viewProductAction)(['record'=> $item->variant->product->id, ])}}
                      </td>
                    </tr>
                    @endforeach
    
                  <!-- More products... -->
                </tbody>
              </table>
            </div>
    
            <!-- More orders... -->
          </div>
        @empty
            
        @endforelse
       

      </div>
    </div>
    <x-filament-actions::modals />
  </div>
  