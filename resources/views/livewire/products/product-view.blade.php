<div>



        <div class="flex flex-col md:flex-row">
            <div class="flex-1">
                <img src="{{$record->getImage()}}" alt="Laptop Pro 2019" class="w-full h-auto rounded-lg">
                <div class="flex space-x-2 mt-4">
                    @foreach ($record->variants as $variant)     
                    <img src="{{asset('images/placeholder.png')}}" alt="Laptop Pro 2019" class="w-1/4 h-auto rounded-lg">
                    <img src="{{asset('images/placeholder.png')}}" alt="Laptop Pro 2019" class="w-1/4 h-auto rounded-lg">
                    <img src="{{asset('images/placeholder.png')}}" alt="Laptop Pro 2019" class="w-1/4 h-auto rounded-lg">
                    <img src="{{asset('images/placeholder.png')}}" alt="Laptop Pro 2019" class="w-1/4 h-auto rounded-lg">
                    <img src="{{asset('images/placeholder.png')}}" alt="Laptop Pro 2019" class="w-1/4 h-auto rounded-lg">
                    <img src="{{asset('images/placeholder.png')}}" alt="Laptop Pro 2019" class="w-1/4 h-auto rounded-lg">
                    @endforeach
                   
                </div>
            </div>
            <div class="flex-1 md:ml-6 mt-6 md:mt-0">
              
                <h1 class="text-3xl font-bold"> ₱ {{$record->price}}  @if($record->old_price)
                    <span class=" ">
                        - 
                    </span>
                    <span class="line-through text-gray-400 font-normal"> ₱ {{$record->old_price}}</span>
                    @endif
                </h1>
                <h2 class="text-2xl font-semibold mt-4 capitalize">{{$record->name}}</h2>
                <p class="mt-2 text-gray-600">{{$record->description}}</p>

                

                <div class="mt-4">
                    <h3 class="text-xl font-semibold">SKU</h3>
                    <div class="flex items-center mt-2 space-x-4">
                        <label class="border rounded-lg p-2 w-full text-center cursor-pointer">
                         
                            <span class="block text-sm text-gray-500">{{$record->sku}}</span>
                        </label>
                      
                    </div>
                </div>

              

                <div class="mt-6">
                    <h4 class="text-lg font-semibold">Address</h4>
                    <p class="text-gray-600">{{$record->address}}</p>
                </div>
            </div>
        </div>
   
</div>
