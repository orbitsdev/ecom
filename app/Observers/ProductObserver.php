<?php

namespace App\Observers;

use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductObserver
{
    /**
     * Handle the Product "created" event.
     */
    public function created(Product $product): void
    {
        if (!$product->sku) {
        // Generate random alphanumeric string
        $random_chars = strtoupper(substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 8));

        // Get the next available sequence number
        $sequence_number = Product::max('id') + 1;

        // Combine random characters and sequence number to form SKU
        $product->sku = $random_chars . '-' . $sequence_number;
        $product->save();
    }

    }

    /**
     * Handle the Product "updated" event.
     */
    public function updated(Product $product): void
    {
        //
    }

    /**
     * Handle the Product "deleted" event.
     */
    public function deleted(Product $product): void
    {

        if(!empty($product->image)){
            if(Storage::disk('public')->exists($product->image)){
                Storage::disk('public')->delete($product->image);
            }
        }
        $product->variants->each(function($item){
            $item->variant();
        });
    }

    /**
     * Handle the Product "restored" event.
     */
    public function restored(Product $product): void
    {
        //
    }

    /**
     * Handle the Product "force deleted" event.
     */
    public function forceDeleted(Product $product): void
    {
        //
    }
}
