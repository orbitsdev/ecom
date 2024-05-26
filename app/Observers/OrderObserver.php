<?php

namespace App\Observers;

use App\Models\Order;
use Illuminate\Support\Facades\Storage;

class OrderObserver
{
    /**
     * Handle the Order "created" event.
     */
    public function created(Order $order): void
    {
        if (!$order->sku) {
            // Generate random alphanumeric string
            $random_chars = strtoupper(substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 8));
    
            // Get the next available sequence number
            $sequence_number = Order::max('id') + 1;
    
            // Combine random characters and sequence number to form SKU
            $order->sku = $random_chars . '-' . $sequence_number;
            $order->save();
        }
    }

    /**
     * Handle the Order "updated" event.
     */
    public function updated(Order $order): void
    {
        //
    }

    /**
     * Handle the Order "deleted" event.
     */
    public function deleted(Order $order): void
    {
        if(!empty($order->proof_of_payment)){
            if(Storage::disk('public')->exists($order->proof_of_payment)){
                Storage::disk('public')->delete($order->proof_of_payment);
            }
        }

        $order->items->each(function($item){
            $item->delete();
        });
        
    }

    /**
     * Handle the Order "restored" event.
     */
    public function restored(Order $order): void
    {
        //
    }

    /**
     * Handle the Order "force deleted" event.
     */
    public function forceDeleted(Order $order): void
    {
        //
    }
}
