<?php

namespace App\Livewire\Orders;

use Filament\Forms;
use App\Models\Order;
use Livewire\Component;
use Filament\Forms\Form;
use Illuminate\Contracts\View\View;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Forms\Concerns\InteractsWithForms;

class EditOrder extends Component implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];

    public Order $record;

    public function mount(): void
    {
        $this->form->fill($this->record->attributesToArray());
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
              
                TextInput::make('phone')
                    ->tel()
                    ->maxLength(191)
                    ->required()
                    ,
                Textarea::make('address')
                ->required(),
                    // ->maxLength(191),
                    TextInput::make('payment_method')
                    // ->maxLength(191)
                    ->default('Cash on Delevery')
                    ->readOnly()
                    ->required()
                    
                // Textarea::make('proof_of_payment')
                //     ->columnSpanFull(),
                // TextInput::make('rider_name')
                //     ->maxLength(191),
                // Textarea::make('rider_phone_number')
                //     ->columnSpanFull(),
                // TextInput::make('status')
                //     ->required()
                //     ->maxLength(191)
                //     ->default('prepairing'),
            ])
            ->statePath('data')
            ->model($this->record);
    }

    public function save()
    {
        $data = $this->form->getState();
        $data['status']= 'pending';
        // dd($data);
        $this->record->update($data);

        Notification::make()
        ->title('Order successfully Place')
        ->success()
        ->send();

        return redirect()->route('client-dashboard');
    }

    public function render(): View
    {
        return view('livewire.orders.edit-order');
    }
}
