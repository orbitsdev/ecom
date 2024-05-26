<div class="bg-white">

    <nav class="bg-white shadow py-4">

        <div class="mx-auto max-w-7xl px-2 sm:px-4 lg:px-8">
            <div class="flex h-16 justify-between">

                <a href="{{ route('client-dashboard') }}" class="flex flex-shrink-0 items-center">
                    <img class="h-20 w-auto" src="{{ asset('images/app_logo.png') }}" alt="Your Company">


                </a>
                <div class="flex items-center lg:hidden">

                    <button type="button" @click="open = !open"
                        class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-app-500"
                        aria-controls="mobile-menu" aria-expanded="false">
                        <span class="absolute -inset-0.5"></span>
                        <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                        <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="hidden lg:ml-4 lg:flex lg:items-center">
                  <a href="{{ route('client-dashboard') }}"
                      class="relative flex-shrink-0 rounded-full bg-white p-1 mr-4 text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-app-500 focus:ring-offset-2">
                      <div class="flex flex-col items-center">
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                              stroke="currentColor" class="h-6 w-6">
                              <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M4.75 19.5H5m0 0a1.75 1.75 0 0 1 1.75 1.75M5 19.5a1.75 1.75 0 0 1 1.75-1.75M5 19.5a1.75 1.75 0 0 1-1.75-1.75m0 0H3.25m1.75 1.75V17m10.5 0v1.75m0 0a1.75 1.75 0 0 1-1.75 1.75m0 0h-6.5m0 0a1.75 1.75 0 0 1-1.75-1.75m0 0V17M15.75 9.25v-2.5A2.75 2.75 0 0 0 13 4H8.75A2.75 2.75 0 0 0 6 6.75v2.5m9.75 0v1.75A2.75 2.75 0 0 1 13 13.75h-1.25m-3.5 0H6a2.75 2.75 0 0 1-2.75-2.75V9.25m0 0v-1.5a2.75 2.75 0 0 1 2.75-2.75h4.25a2.75 2.75 0 0 1 2.75 2.75v1.5m-7.5 4v1.75A2.75 2.75 0 0 0 6 13.75h3.25M12 16v1.75A2.75 2.75 0 0 1 9.25 20H6a2.75 2.75 0 0 1-2.75-2.75V13.75" />
                          </svg>
                          <p class="font-extrabold text-red-600">SHOP</p>
                      </div>
                  </a>
              
                  <a href="{{ route('order.receive') }}"
                      class="relative flex-shrink-0 rounded-full bg-white p-1 text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-app-500 focus:ring-offset-2 mr-4">
                      <div class="flex flex-col items-center">
                          <span class="sr-only">To Receive</span>
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                              stroke="currentColor" class="h-6 w-6">
                              <path stroke-linecap="round" stroke-linejoin="round"
                                  d="m7.875 14.25 1.214 1.942a2.25 2.25 0 0 0 1.908 1.058h2.006c.776 0 1.497-.4 1.908-1.058l1.214-1.942M2.41 9h4.636a2.25 2.25 0 0 1 1.872 1.002l.164.246a2.25 2.25 0 0 0 1.872 1.002h2.092a2.25 2.25 0 0 0 1.872-1.002l.164-.246A2.25 2.25 0 0 1 16.954 9h4.636M2.41 9a2.25 2.25 0 0 0-.16.832V12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 12V9.832c0-.287-.055-.57-.16-.832M2.41 9a2.25 2.25 0 0 1 .382-.632l3.285-3.832a2.25 2.25 0 0 1 1.708-.786h8.43c.657 0 1.281.287 1.709.786l3.284 3.832c.163.19.291.404.382.632M4.5 20.25h15A2.25 2.25 0 0 0 21.75 18v-2.625c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125V18a2.25 2.25 0 0 0 2.25 2.25Z" />
                          </svg>
                          <p class="text-sm font-medium text-gray-700">To Receive</p>
                      </div>
                  </a>
              
                  <a href="{{ route('to-ship-list') }}"
                      class="relative flex-shrink-0 rounded-full bg-white p-1 text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-app-500 focus:ring-offset-2 mr-4">
                      @livewire('orders.to-ship-count')
                      <div class="flex flex-col items-center">
                          <span class="sr-only">To Ship</span>
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                              stroke="currentColor" class="h-6 w-6">
                              <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M8.25 18.75a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 0 1-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 0 0-3.213-9.193 2.056 2.056 0 0 0-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 0 0-10.026 0 1.106 1.106 0 0 0-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12" />
                          </svg>
                          <p class="text-sm font-medium text-gray-700">To Ship</p>
                      </div>
                  </a>
              
                  <a href="{{ route('order-list') }}"
                      class="relative flex-shrink-0 rounded-full bg-white p-1 text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-app-500 focus:ring-offset-2">
                      @livewire('order-count')
                      <div class="flex flex-col items-center">
                          <span class="sr-only">My Orders</span>
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                              stroke="currentColor" class="h-6 w-6">
                              <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                          </svg>
                          <p class="text-sm font-medium text-gray-700">My Orders</p>
                      </div>
                  </a>
              
              

                    <div class="relative ml-4 flex-shrink-0" x-data="{ open: false }">
                        <button @click="open = !open" type="button"
                            class="relative flex rounded-full bg-white text-sm focus:outline-none focus:ring-2 focus:ring-app-500 focus:ring-offset-2"
                            id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                            <span class="absolute -inset-1.5"></span>
                            <span class="sr-only">Open user menu</span>
                            <img class="h-8 w-8 rounded-full"
                                src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                alt="">
                        </button>
                        <div x-show="open" @click.away="open = false"
                            class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                            role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button"
                            tabindex="-1">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="block px-4 py-2 text-sm text-gray-700" role="menuitem"
                                    tabindex="-1" id="user-menu-item-2">Sign out</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    {{ $slot }}
</div>
