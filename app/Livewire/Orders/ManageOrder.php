<?php

namespace App\Livewire\Orders;

use Filament\Forms;
use App\Models\Order;
use Filament\Forms\Get;
use Livewire\Component;
use Filament\Forms\Form;
use Illuminate\Contracts\View\View;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Concerns\InteractsWithForms;
use Awcodes\FilamentTableRepeater\Components\TableRepeater;

class ManageOrder extends Component implements HasForms
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


                Forms\Components\Group::make()

                    ->schema([

                        Section::make('Order Details')
                            ->schema([

                                Forms\Components\TextInput::make('sku')
                                    ->label('SKU')
                                    ->readonly()

                                    ->maxLength(191),
                                Forms\Components\TextInput::make('phone')
                                    ->tel()
                                    ->readonly()
                                    ->maxLength(191),
                                Forms\Components\TextInput::make('address')
                                    ->readonly()
                                    ->maxLength(191),
                                Forms\Components\TextInput::make('payment_method')
                                    ->maxLength(191)
                                    ->readonly()
                                    ->default('Cash on Delivery'),
                            ]),


                        Section::make('')
                            ->schema([

                                TableRepeater::make('orders_logistics')

                                    ->relationship('logistics')
                                    ->label('Logistics')
                                    ->withoutHeader()
                                    ->columnWidths([
                                        //    'name' => '200px',
                                        //    'image' => '300px',
                                    ])
                                    ->addActionLabel('Add Logistic')
                                    ->emptyLabel('No Logistic')
                                    //    ->minItems(1)
                                    //    ->maxItems(4)
                                    // ->defaultItems(2)
                                    ->schema([
                                        Forms\Components\Textarea::make('parcel_current_location')
                                            ->rows(5)
                                            ->required(),
                                        Forms\Components\Textarea::make('storage_house')
                                            ->rows(5)
                                            ->required(),
                                        Forms\Components\Textarea::make('status')
                                        ->rows(5)
                                        ->required(),




                                    ])
                                    ->columnSpan('full')
                            ])->hidden(function (Get $get) {

                                return ($get('status') == 'pending' || $get('status') == 'prepairing') ? true : false;
                            }),




                    ])->columnSpan(['lg' => 2]),


                Forms\Components\Group::make()
                    ->schema([

                        Section::make('')
                            ->schema([
                                Select::make('status')
                                    ->options([
                                        'pending' => 'Pending',
                                        'accepted' => 'Accept',
                                        'receive' => 'Receive',
                                    ])
                                    ->live()

                            ]),
                        Section::make('Raider Details')
                            ->schema([

                                Forms\Components\TextInput::make('rider_name')
                                    ->maxLength(191)
                                    ->required()
                                    ,
                                Forms\Components\TextInput::make('rider_phone_number')
                                    ->tel()
                                    ->required()
                                    ->columnSpanFull(),
                            ]),

                        Section::make('Payment Details')
                            ->schema([



                                FileUpload::make('proof_of_payment')
                                    ->image()
                                    ->required()

                                    ->maxSize(200000)
                                    ->disk('public')
                                    ->directory('receipt')
                                    ,
                            ])->hidden(function (Get $get) {

                                return ($get('status') != 'receive' ) ? true : false;
                            }),

                    ])->columnSpan(['lg' => 1]),
            ])
            ->columns(3)
            ->statePath('data')
            ->model($this->record);
    }

    public function save()
    {
        $data = $this->form->getState();
       
        $this->record->update($data);
        // dd($this->record);

        Notification::make()
        ->title('Order Updated')
        ->success()
        ->send();

        return redirect()->route('order-manage.index');
    }

    public function render(): View
    {
        return view('livewire.orders.manage-order');
    }
}
