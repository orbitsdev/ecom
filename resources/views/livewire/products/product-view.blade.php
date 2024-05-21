<div>
    {{-- {{$record}} --}}

    <div class="mt-8">
        <h2 class="sr-only">Products purchased</h2>

        <div class="space-y-24">
            <div class="grid grid-cols-12 gap-4 text-sm">
                @if (!empty($record->image))
                    <div class="col-span-12 sm:col-span-5 md:col-span-5">
                        <a href="{{ $record->getImage() }}" target="_blank">
                            <img src="{{ $record->getImage() }}" alt="{{ $record->name }}"
                                class="w-[400px] h-[400px] object-contain">
                        </a>
                    </div>
                @endif
                <div class="col-span-12 sm:col-span-7 md:col-span-7 mt-4 sm:mt-0">
                    <h3 class="text-lg font-medium text-gray-900">
                        <a href="#" class="mt-4 text-2xl capitalize"> <span class="mr-2"> {{ $record->name }}</a>
                    </h3>
                    <p class="mt-1 font-medium text-gray-900"><span class="mr-2"> SKU :</span> {{ $record->sku }}</p>
                    <p class="mt-1 font-medium text-gray-900"><span class="mr-2"> Price :</span> ₱ {{ $record->price }}</p>
                    <p class="mt-1 font-medium text-gray-900"><span class="mr-2"> Created At :</span>{{ $record->created_at->format('F d, Y h:i A') }}</p>
                   
                    <div class="mt-4">
                        <h1 class="text-2xl"> Description</h1>
                        <p class="">{{ $record->description }}</p>
                    </div>
                  
                    <div class="mt-6">
                       
                        <div class="">
                            <p class="text-2xl">Variants</p>
                            <div class="flex mt-2">
                                @forelse ($record->variants as $variant)
                                    <li class="relative flex items-center mr-2 ">
                                        <div>
                                            
                                            @if (!empty($variant->image))
                                            <a href="{{ $variant->getImage() }}" target="_blank">
                                                <img src="{{ $variant->getImage() }}" alt="{{ $variant->name }}"
                                                class=" " style="width: 120px; height:120px">
                                            </a>
                                            @endif
                                            <p class="mt-2 truncate  font-medium text-gray-900">{{ $variant->name }}</p>
                                        </div>
                                    </li>
                                @empty
                                    <li class="text-gray-500">No variants available.</li>
                                @endforelse
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- More products... -->
        </div>
    </div>
</div>
