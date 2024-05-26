<div class="container mx-auto p-4">
    <h1 class="text-2xl font-semibold mb-6">Dashboard</h1>
    
    <div class="grid grid-cols-4 sm:grid-cols-4 gap-6">
        <!-- Users Card -->
        <div class="bg-white shadow-md rounded-lg p-6">
            <div class="flex items-center">
                <div class="w-16 h-16 rounded-full bg-blue-500 flex items-center justify-center">
                    <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 0a10 10 0 100 20A10 10 0 0010 0zm5 15.83A8.01 8.01 0 0110 18c-1.54 0-2.97-.44-4.17-1.2.02-.09.03-.18.05-.27A2.06 2.06 0 016 15c1.1 0 2-.9 2-2 0-.02-.01-.04-.01-.06 1.68.16 3.3.16 4.98 0 0 .02-.01.04-.01.06 0 1.1.9 2 2 2 .48 0 .93-.17 1.29-.44a8.12 8.12 0 01-.06.23zM10 12a4 4 0 110-8 4 4 0 010 8zm6-4a6 6 0 10-12 0 6 6 0 0012 0z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-4">
                    <h2 class="text-lg font-semibold">Total Users</h2>
                    <p class="text-2xl font-bold">{{ $totalUsers }}</p>
                </div>
            </div>
        </div>
        
        <!-- Products Card -->
        <div class="bg-white shadow-md rounded-lg p-6">
            <div class="flex items-center">
                <div class="w-16 h-16 rounded-full bg-green-500 flex items-center justify-center">
                    <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M2 3a2 2 0 00-2 2v10a2 2 0 002 2h16a2 2 0 002-2V5a2 2 0 00-2-2H2zm16 1a1 1 0 011 1v2H1V5a1 1 0 011-1h16zm1 4v8a1 1 0 01-1 1H2a1 1 0 01-1-1V8h18zM2 10a1 1 0 100 2h4a1 1 0 100-2H2zm6 0a1 1 0 100 2h10a1 1 0 100-2H8z" />
                    </svg>
                </div>
                <div class="ml-4">
                    <h2 class="text-lg font-semibold">Total Products</h2>
                    <p class="text-2xl font-bold">{{ $totalProducts }}</p>
                </div>
            </div>
        </div>
        <div class="bg-white shadow-md rounded-lg p-6">
            <div class="flex items-center">
                <div class="w-16 h-16 rounded-full bg-pink-500 flex items-center justify-center">
                    <svg class="w-8 h-8 text-white"  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                      </svg>
                      
                </div>
                <div class="ml-4">
                    <h2 class="text-lg font-semibold">Total Orders</h2>
                    <p class="text-2xl font-bold">{{$totalPendingOrders}}</p>
                </div>
            </div>
        </div>
        <div class="bg-white shadow-md rounded-lg p-6">
            <div class="flex items-center">
                <div class="w-16 h-16 rounded-full bg-yellow-500 flex items-center justify-center">
                    <svg class="w-8 h-8 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 3.75H6.912a2.25 2.25 0 0 0-2.15 1.588L2.35 13.177a2.25 2.25 0 0 0-.1.661V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18v-4.162c0-.224-.034-.447-.1-.661L19.24 5.338a2.25 2.25 0 0 0-2.15-1.588H15M2.25 13.5h3.86a2.25 2.25 0 0 1 2.012 1.244l.256.512a2.25 2.25 0 0 0 2.013 1.244h3.218a2.25 2.25 0 0 0 2.013-1.244l.256-.512a2.25 2.25 0 0 1 2.013-1.244h3.859M12 3v8.25m0 0-3-3m3 3 3-3" />
                      </svg>
                      
                </div>
                <div class="ml-4">
                    <h2 class="text-lg font-semibold">Total Receive / Delivered</h2>
                    <p class="text-2xl font-bold">{{$delivered}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
