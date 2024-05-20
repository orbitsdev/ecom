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
                <div class="w-16 h-16 rounded-full bg-green-500 flex items-center justify-center">
                    <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M2 3a2 2 0 00-2 2v10a2 2 0 002 2h16a2 2 0 002-2V5a2 2 0 00-2-2H2zm16 1a1 1 0 011 1v2H1V5a1 1 0 011-1h16zm1 4v8a1 1 0 01-1 1H2a1 1 0 01-1-1V8h18zM2 10a1 1 0 100 2h4a1 1 0 100-2H2zm6 0a1 1 0 100 2h10a1 1 0 100-2H8z" />
                    </svg>
                </div>
                <div class="ml-4">
                    <h2 class="text-lg font-semibold">Total Orders</h2>
                    <p class="text-2xl font-bold">Working in Progress</p>
                </div>
            </div>
        </div>
        <div class="bg-white shadow-md rounded-lg p-6">
            <div class="flex items-center">
                <div class="w-16 h-16 rounded-full bg-green-500 flex items-center justify-center">
                    <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M2 3a2 2 0 00-2 2v10a2 2 0 002 2h16a2 2 0 002-2V5a2 2 0 00-2-2H2zm16 1a1 1 0 011 1v2H1V5a1 1 0 011-1h16zm1 4v8a1 1 0 01-1 1H2a1 1 0 01-1-1V8h18zM2 10a1 1 0 100 2h4a1 1 0 100-2H2zm6 0a1 1 0 100 2h10a1 1 0 100-2H8z" />
                    </svg>
                </div>
                <div class="ml-4">
                    <h2 class="text-lg font-semibold">Total Sales</h2>
                    <p class="text-2xl font-bold">Working in Progress</p>
                </div>
            </div>
        </div>
    </div>
</div>
