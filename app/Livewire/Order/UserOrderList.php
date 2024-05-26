<?php

namespace App\Livewire\Order;

use App\Models\Item;
use Livewire\Component;
use Filament\Actions\Action;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Contracts\HasForms;
use Illuminate\Database\Eloquent\Model;
use Filament\Notifications\Notification;
use Filament\Actions\Contracts\HasActions;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Actions\Concerns\InteractsWithActions;

class UserOrderList extends Component implements HasForms, HasActions
{
    use InteractsWithActions;
    use InteractsWithForms;



    public function  checkoutAction(): Action
    {
        return Action::make('checkout')
        // ->icon('heroicon-m-plus')
        ->extraAttributes(['style'=> 'width:100%'])
        ->label('Checkout')
        ->url(function(array $arguments){
            
            return route('order.edit', ['record'=> $arguments['record']]);
        })
        //  ->color('gray')
         ;
    }
    public function  addQuantityAction(): Action
    {
        return Action::make('addQuantity')
        ->icon('heroicon-m-plus')
        ->iconButton()
         ->color('gray')
            ->action(function (array $arguments) {
                $item = Item::where('id',$arguments['record'])->where('order_id', $arguments['order'])->first();
                $item->quantity++;
                $item->save();
            });
    }
    public function  subQuantityAction(): Action
    {
        return Action::make('subQuantity')
        ->icon('heroicon-m-minus')
        ->iconButton()
         ->color('gray')
            ->action(function (array $arguments) {
                $item = Item::where('id',$arguments['record'])->where('order_id', $arguments['order'])->first();
                if($item->quantity >2){
                    $item->quantity--;
                    $item->save();
                }
            });
    }

    public function render()

    {

        $orders = Auth::user()->orders()->where('status','prepairing')->get();
        return view('livewire.order.user-order-list',[
            'orders'=> $orders
        ]);
    }
}
