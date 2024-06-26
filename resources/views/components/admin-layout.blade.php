<div class="bg-gray-100">
    <!-- Static sidebar for desktop -->
 <div class="hidden lg:fixed lg:inset-y-0 lg:z-20 lg:flex lg:w-72 lg:flex-col">
   <!-- Sidebar component, swap this element with another sidebar if you like -->
   <div class="flex grow flex-col gap-y-5 overflow-y-auto border-r  nav-bg px-6">

     <nav class="flex flex-1 flex-col">
         <div class="flex items-center justify-center">
             <img class="h-40 w-auto" src="{{asset('images/app_logo.png')}}" alt="Your Company">
         </div>
       <ul role="list" class="flex flex-1 flex-col gap-y-7">
         <li>
           <ul role="list" class="-mx-2 space-y-1">
             <li>
               <!-- Current: "bg-gray-50 text-app-900", Default: "text-white hover:text-app-900 hover:bg-gray-50" -->
               <a href="{{route('dashboard')}}" class="{{ request()->routeIs('dashboard') ? 'active-link' : 'inactive-link' }}">


                 <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                     <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z" />
                   </svg>

                 Dashboard
               </a>
             </li>
             <li>
               <a href="{{route('user.index')}}" class=" {{   request()->routeIs('user.index') ? 'active-link' : 'inactive-link' }}">
                 <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                     <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                   </svg>

                 Users
               </a>
             </li>
             <li>
               <a href="{{route('product.index')}}" class="{{ (request()->routeIs('product.index') || request()->routeIs('product.create') || request()->routeIs('product.edit'))? 'active-link' : 'inactive-link' }}">
                 <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                     <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                   </svg>

                 Products
               </a>
             </li>
             <li>
               <a href="{{route('order-manage.index')}}" class="{{ (request()->routeIs('order-manage.index') )? 'active-link' : 'inactive-link' }}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                </svg>
                

                  Orders
               </a>
             </li>
             <li>
               <a href="{{route('order-manage.receive-orders')}}" class="{{ (request()->routeIs('order-manage.receive-orders') )? 'active-link' : 'inactive-link' }}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="m7.875 14.25 1.214 1.942a2.25 2.25 0 0 0 1.908 1.058h2.006c.776 0 1.497-.4 1.908-1.058l1.214-1.942M2.41 9h4.636a2.25 2.25 0 0 1 1.872 1.002l.164.246a2.25 2.25 0 0 0 1.872 1.002h2.092a2.25 2.25 0 0 0 1.872-1.002l.164-.246A2.25 2.25 0 0 1 16.954 9h4.636M2.41 9a2.25 2.25 0 0 0-.16.832V12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 12V9.832c0-.287-.055-.57-.16-.832M2.41 9a2.25 2.25 0 0 1 .382-.632l3.285-3.832a2.25 2.25 0 0 1 1.708-.786h8.43c.657 0 1.281.287 1.709.786l3.284 3.832c.163.19.291.404.382.632M4.5 20.25h15A2.25 2.25 0 0 0 21.75 18v-2.625c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125V18a2.25 2.25 0 0 0 2.25 2.25Z" />
                </svg>
                
                
                

                 Receive Orders
               </a>
             </li>

           </ul>
         </li>

         
       </ul>
       <div class="py-4 flex items-center gap-x-4">
        @if (Auth::user()->profile_photo_path)
            <img class="h-10 w-10 rounded-full" src="{{ Auth::user()->getUserImage() }}" alt="{{ Auth::user()->name }}">
        @else
            <div class="h-10 w-10 rounded-full bg-indigo-700 flex items-center justify-center text-white font-bold">
                {{ substr(Auth::user()->name, 0, 1) }}
            </div>
        @endif
        <span class="text-white font-semibold">{{ Auth::user()->name }}</span>
        <form action="{{ route('logout') }}" method="POST" class="ml-auto">
            @csrf
            <button type="submit" class="px-4 py-2 bg-indigo-600 text-sm font-semibold leading-6 text-white rounded hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                Logout
            </button>
        </form>
    </div>
    
     </nav>
   </div>
 </div>



 <main class="py-10 lg:pl-72">
   <div class="px-4 sm:px-6 lg:px-8">

     {{$slot}}
   </div>
 </main>
</div>
