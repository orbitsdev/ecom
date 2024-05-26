


    <div class="bg-gray-50">

     
        <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
          {{-- <h2 class="">Variations </h2> --}}
          <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl"> {{$record->name}} Variations</h2>
      
          <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8 mt-8">
            @forelse ($record->variants  as $variant)
            <div class="group">
                <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">
                  <img src="{{$variant->getImage()}}" alt="Tall slender porcelain bottle with natural clay textured body and cork stopper." class="h-full w-full object-cover object-center group-hover:opacity-75">
                </div>
                <h3 class="mt-4 text-sm text-gray-700">{{$variant->name}}</h3>
                <p class="mt-1 text-lg font-medium text-gray-900"> ₱ {{$variant->price}}</p>

                <div class="mt-2">
                    {{-- @dump(Auth::user()->hasManyPreparingOrders()) --}}
                    @if(Auth::user()->hasManyPreparingOrders())
                    {{ ($this->addToOrderWithOptionAction)(['record' => $variant->id]) }}
                    @else
                    {{ ($this->addToOrderAction)(['record' => $variant->id]) }}
                    @endif
                </div>
            </div>
            @empty
                
            @endforelse
           
           
          </div>
        </div>

        <x-filament-actions::modals />
      </div>

