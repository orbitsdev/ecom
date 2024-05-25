    <div class="flex flex-col md:flex-row">
        <div class="flex-1">
            <img src="{{ $record->getImage() }}" alt="Laptop Pro 2019" class="w-full h-auto rounded-lg">
            {{-- <div class="grid grid-cols-4 mt-4">
                @foreach ($record->variants as $variant)
                    <div class="col-span-1">

                        <a href="{{ $variant->getImage() }}" target="_blank">
                            <img src="{{ $variant->getImage() }}" alt="{{$variant->name}}" class="w-36 h-24  rounded-lg">
                            <p class="mt capitalize text-sm mt-2">
                                {{ $variant->name }}
                            </p>
                        </a>
                    </div>
                @endforeach


            </div> --}}
        </div>
        <div class="flex-1 md:ml-6 mt-6 md:mt-0">
            <h1 class="text-xl font-bold">SKU: d<span>{{$record->sku}}</span> </h1>
            <p> <span class="font-bold"> Product Name:</span>  <span class="text-gray-600"> {{$record->name}}</span></p>
            <p><span class="font-bold"> Status:</span>   <span class="text-gray-600"> {{$record->getStatusText()}}</span></p>
            <h2 class="text-xl font-semibold mt-4">Description</h2>
            <p class=" text-gray-600">{{$record->description}}</p>

            <div class="mt-4">
                <h3 class="text-xl font-semibold">Variants</h3>
                <div class="grid items-center grid-cols-4 gap-x-4 mt-2 ">
                    @foreach ($record->variants as $variant )
                    
                    {{-- <div class="col-span-1">
                      
                        <span class="mt-2">{{$variant->name}}</span>
                        <span class="mt-2 font-bold">{{$variant->price}}</span>
                    </div> --}}
                    <div class="col-span-1">

                        <a href="{{ $variant->getImage() }}" target="_blank" class="inline-block">
                            <img src="{{ $variant->getImage() }}" alt="{{$variant->name}}" class="w-36 h-24  rounded-lg">
                            <span class="mt-3">{{$variant->name}}</span>
                            <span class="mt-2 font-bold">{{$variant->price}}</span>
                        </a>
                    </div>
                    @endforeach
                  
                </div>
            </div>

            

           
        </div>
    </div>
