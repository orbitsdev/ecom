<div class="shadow-md">

    <div class="max-w-4xl mx-auto bg-white p-6  rounded-md" id="print-area">
        <div class="text-center border-b border-gray-200 pb-4 mb-6">
            <h1 class="text-3xl font-bold">Order Details</h1>
            <p class="text-gray-600">Order # <span class="font-bold">{{$record->sku}}</span></p>
            <p class="text-gray-600">Date: May 26, 2024</p>
        </div>
        <div class="mb-6">
            <h2 class="text-xl font-semibold mb-2">Customer Information</h2>
            <p class="text-gray-800">Name: {{$record->user->name}}</p>
            <p class="text-gray-800">Phone: {{$record->phone}}</p>
            <p class="text-gray-800">Email: {{$record->user->email}}</p>
            <p class="text-gray-800">Address: {{$record->address}}</p>
          
           
        </div>
        <div class="mb-6">
            <h2 class="text-xl font-semibold mb-2">Shipping Information</h2>
            <p class="text-gray-800">Rider Name: {{$record->rider_name}}</p>
            <p class="text-gray-800">Rider Phone: {{$record->rider_phone_number}}</p>
        </div>
        <div class="mb-6">
            <h2 class="text-xl font-semibold mb-2">Payment Information</h2>
            <p class="text-gray-800">Payment Method: {{$record->payment_method}}</p>

        </div>
        <div>
            <h2 class="text-xl font-semibold mb-4">Items</h2>
            <table class="min-w-full bg-white w-full">
                <thead>
                    <tr>
                        <th class="py-2 text-left text-gray-600 font-semibold border-b border-gray-200">Item</th>
                        <th class="py-2 text-left text-gray-600 font-semibold border-b border-gray-200">Quantity</th>
                        <th class="py-2 text-right text-gray-600 font-semibold border-b border-gray-200">Price</th>
                        <th class="py-2 text-right text-gray-600 font-semibold border-b border-gray-200">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($record->items as $item)
                    <tr>
                        <td class="py-2 border-b border-gray-200">{{$item->variant->name}}</td>
                        <td class="py-2 border-b border-gray-200">{{$item->quantity}}</td>
                        <td class="py-2 border-b border-gray-200 text-right">₱{{number_format($item->variant->price)}}</td>
                        <td class="py-2 border-b border-gray-200 text-right">₱{{number_format($item->itemPrice())}}</td>
                    </tr>  
                    @endforeach
                  
                  
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3" class="py-2 text-right font-semibold text-gray-800">Total</td>
                        <td colspan="3" class="py-2 text-right font-semibold text-gray-800"> ₱{{number_format($record->totalSummary())}}</td>
                    </tr>
                    
                </tfoot>
            </table>
        </div>
    </div>
    <div class="max-w-4xl mx-auto flex items-center justify-center mt-4">
        <x-filament::button onclick="printDiv('print-area')" style="width:100%">Print</x-filament::button>

    </div>

    <script>
        function printDiv(divName) {


            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;

        }
    </script>
    
</div>
