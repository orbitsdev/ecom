<?php

namespace App\Livewire\Products;

use App\Models\Item;
use App\Models\Order;
use App\Models\Product;


use App\Models\Variant;
use Livewire\Component;
use Filament\Actions\Action;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Filament\Actions\Contracts\HasActions;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Actions\Concerns\InteractsWithActions;

class VariantionSelection extends Component implements HasForms, HasActions
{
    use InteractsWithActions;
    use InteractsWithForms;


    public Product $record;




    public function  addToOrderWithOptionAction(): Action
    {
        return Action::make('addToOrderWithOption')
            // ->requiresConfirmation()
            ->label('Add to order')
            ->form([
                Section::make('Select Order Number ')
                ->description('Since you have previouse  order that was not submitted yet please select order number  you would like to put your new item')
                // ->extraAttributes(['style' => 'background-color:#f3f4f6; border: 1px none; '])
                ->schema([
                    Select::make('order_id')
                    ->label('Select Where to put your new item')
                    ->options(Order::latest()->get()->map(function($item){
                        return [
                            'id'=> $item->id,
                            'created_at'=>  'Order.'. $item->sku.' '.$item->created_at->format('M d, Y')
                        ];
                    })->pluck('created_at', 'id'))
                    ->searchable()
                ]),
                
            ])
            ->modalHeading('Select Order Date')
            ->action(function (array $data,array $arguments) {
           
                $variant  = Variant::find($arguments['record'])->first();

                $variant = Variant::find($arguments['record']);

                if (!$variant) {
                    throw new \Exception("Variant not found.");
                }

                $user = Auth::user();



                $order = Order::where('user_id', $user->id)
                ->where('id', $data['order_id'])
                    ->where('status', 'prepairing')
                    ->first();

                    


                if (!$order) {
                    $order = Order::create([
                        'user_id' => $user->id,
                        'status' => 'prepairing',

                    ]);
                }


                $item = Item::where('order_id', $order->id)
                    ->where('variant_id', $variant->id)
                    ->first();

                if ($item) {

                    $item->quantity += 1;
                    $item->save();
                } else {

                    Item::create([
                        'order_id' => $order->id,
                        'variant_id' => $variant->id,
                        'quantity' => 1,
                    ]);
                }
                Notification::make()
                    ->title('Item was added successfully')
                    ->success()
                    ->send();
            });
    }
    public function  addToOrderAction(): Action
    {
        return Action::make('addToOrder')
            ->requiresConfirmation()

            ->action(function (array $arguments) {

                $variant  = Variant::find($arguments['record'])->first();

                $variant = Variant::find($arguments['record']);

                if (!$variant) {
                    throw new \Exception("Variant not found.");
                }

                $user = Auth::user();



                $order = Order::where('user_id', $user->id)
                    ->where('status', 'prepairing')
                    ->first();


                if (!$order) {
                    $order = Order::create([
                        'user_id' => $user->id,
                        'status' => 'prepairing',

                    ]);
                }


                $item = Item::where('order_id', $order->id)
                    ->where('variant_id', $variant->id)
                    ->first();

                if ($item) {

                    $item->quantity += 1;
                    $item->save();
                } else {

                    Item::create([
                        'order_id' => $order->id,
                        'variant_id' => $variant->id,
                        'quantity' => 1,
                    ]);
                }
                Notification::make()
                    ->title('Item was added successfully')
                    ->success()
                    ->send();
            });
    }
    public function render()
    {
        return view('livewire.products.variantion-selection',);
    }
}
