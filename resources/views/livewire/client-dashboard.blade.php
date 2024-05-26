<div class="bg-gray-100">

<div class="">
  <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
    <h2 class="sr-only">Mini Producs</h2>
    

    <div class="grid grid-cols-1 gap-y-4 sm:grid-cols-2 sm:gap-x-6 sm:gap-y-10 lg:grid-cols-3 lg:gap-x-8">
      
      @forelse ($products  as $product)
      <a href="{{route('variation-selection', ['record'=> $product])}}" class="block">

      <div class="group relative flex flex-col overflow-hidden rounded-lg border border-gray-200 bg-white">
        <div class="aspect-h-4 aspect-w-3 bg-gray-200 group-hover:opacity-75 max-h-[200px]">
          <img src="https://tailwindui.com/img/ecommerce-images/category-page-02-image-card-01.jpg" alt="Eight shirts arranged on table in black, olive, grey, blue, white, red, mustard, and green." class="max-h-[200px] w-full object-cover object-center">
        </div>
        
        <div class="flex flex-1 flex-col space-y-2 p-4">
          <h3 class="text-sm font-medium text-gray-900">
            <div href="#">
              <span aria-hidden="true" class="absolute inset-0"></span>
              {{$product->name}}
            </div>
          </h3>
          <p class="text-sm text-gray-500">{{$product->description}}</p>
          <div class="flex flex-1 flex-col justify-end">
            <p class="text-sm italic text-gray-500">{{$product->variants->count()}} Variations</p>
            <p class="text-base font-medium text-gray-900">₱{{$product->getLowestPrice()}} -  ₱ {{$product->getHighestPrice()}}</p>
          </div>
        </div>
      </div>
    </a>

      @empty
        
      @endforelse 
        
    
      {{-- <div class="group relative flex flex-col overflow-hidden rounded-lg border border-gray-200 bg-white">
        <div class="aspect-h-4 aspect-w-3 bg-gray-200 sm:aspect-none group-hover:opacity-75 sm:h-96">
          <img src="https://tailwindui.com/img/ecommerce-images/category-page-02-image-card-02.jpg" alt="Front of plain black t-shirt." class="h-full w-full object-cover object-center sm:h-full sm:w-full">
        </div>
        <div class="flex flex-1 flex-col space-y-2 p-4">
          <h3 class="text-sm font-medium text-gray-900">
            <a href="#">
              <span aria-hidden="true" class="absolute inset-0"></span>
              Basic Tee
            </a>
          </h3>
          <p class="text-sm text-gray-500">Look like a visionary CEO and wear the same black t-shirt every day.</p>
          <div class="flex flex-1 flex-col justify-end">
            <p class="text-sm italic text-gray-500">Black</p>
            <p class="text-base font-medium text-gray-900">$32</p>
          </div>
        </div>
      </div>

      <!-- More products... --> --}}
    </div>
    {{$products->links()}}
  </div>
</div>

    </div>

