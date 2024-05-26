<?php

namespace App\Livewire\Order;

use App\Models\Product;
use Livewire\Component;
use Filament\Actions\Action;
use Filament\Actions\StaticAction;
use Filament\Support\Enums\MaxWidth;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Contracts\HasForms;
use Filament\Actions\Contracts\HasActions;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Actions\Concerns\InteractsWithActions;

class ListOrderReived extends Component implements HasForms, HasActions
{
    use InteractsWithActions;
    use InteractsWithForms;



    public function  viewProductAction(): Action
    {
        return  Action::make('viewProduct')
        ->icon('heroicon-m-eye')
        ->button()
        // ->slideOver()
        ->color('gray')
        
        ->modalContent(function(array $arguments){
            $product = Product::find($arguments['record'])->first();
                return  view(
                'livewire.products.product-view',
                ['record' => $product],
            );
        } )
        ->modalSubmitAction(false)
        ->modalCancelAction(fn (StaticAction $action) => $action->label('Close'))
        ->modalWidth(MaxWidth::SevenExtraLarge);
        
    }
    public function render()
    {   
        $orders = Auth::user()->orders()->where('status', 'receive')->latest()->get();
        return view('livewire.order.list-order-reived',[
            'orders'=> $orders,
        ]);
    }
}
