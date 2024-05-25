<?php

namespace App\Livewire\Products;

use Filament\Forms;
use App\Models\Product;
use Livewire\Component;
use Filament\Forms\Form;
use Filament\Support\RawJs;
use Illuminate\Contracts\View\View;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\Textarea;
use Filament\Notifications\Notification;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Concerns\InteractsWithForms;
use Awcodes\FilamentTableRepeater\Components\TableRepeater;

class EditProduct extends Component implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];

    public Product $record;

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
                        Section::make('Product Details')
                            // ->extraAttributes(['style' => 'background-color:#f3f4f6; border: 1px none; '])
                            ->description('fill out all required fields before saving')
                            ->schema([
                                Forms\Components\TextInput::make('name')
                                    ->maxLength(191)
                                    ->required(),
                                         
                                Textarea::make('description')
                                ->required()
                                ->rows(5)
                                ->autoSize()

                                // Forms\Components\TextInput::make('sku')
                                //     ->label('SKU')
                                //     ->maxLength(191)
                                //     ->required(),

                                    // Forms\Components\TextInput::make('price')
                                    // ->mask(RawJs::make('$money($input)'))
                                    // ->stripCharacters(',')

                                    // ->numeric(),
    








                            ]),

                            Section::make('Variantions')
                            // ->extraAttributes(['style' => 'background-color:#f3f4f6; border: 1px none; '])
                            ->schema([

                                TableRepeater::make('product_variants')
                                     ->relationship('variants')
                                     ->label('Items')
                                    ->withoutHeader()
                                    ->columnWidths([
                                        'name' => '200px',
                                        'image' => '300px',
                                    ])
                                    ->emptyLabel('No Variants')
                                    ->minItems(1)
                                    ->maxItems(4)
                                    // ->defaultItems(2)
                                    ->schema([
                                        Forms\Components\TextInput::make('name')
                                            ->maxLength(191)
                                            ->required(),
                                        Forms\Components\TextInput::make('price')
                                            ->maxLength(191)
                                            ->required(),


                                        FileUpload::make('image')
                                        ->image()
                                            ->required()
                                            // ->preserveFilenames()
                                            ->maxSize(200000)
                                            ->label('Image')
                                            ->disk('public')
                                            ->directory('variants'),
                                    ])
                                    ->columnSpan('full')

                            ]),


                    ])->columnSpan(['lg' => 2]),
                Forms\Components\Group::make()
                    ->schema([
                        Section::make('')
                            // ->extraAttributes(['style' => 'background-color:#f3f4f6; border: 1px none; '])
                            ->schema([
                                FileUpload::make('image')
                                ->image()
                                    ->required()
                                    ->preserveFilenames()
                                    ->maxSize(200000)
                                    ->label('Featured ')
                                    ->disk('public')
                                    ->directory('products'),

                                    Toggle::make('active')
                                    ->onColor('success')
                                    ->offColor('gray')
                                    ->live()
                                    ->label(fn($state) => $state == true ?' Active': 'Inactive')
                                    ->hint('Make product active or inactive')
                                    
                                    ->afterStateUpdated(function ($record, $state) {
                                     $record->active = $state;
                                        $record->save();
                                         $active = $state == true ? 'Actived' : 'Deactivated';
                                         Notification::make()
                                         ->title('Product is '. $active )
                                         ->success()
                                         ->send();
                                        //  $message = $state == true ? 'Active' : 'Inactive';
                                      

                                    })
                                    ,
                               
                                // ->toolbarButtons([

                                //     'blockquote',
                                //     'bold',
                                //     'bulletList',
                                //     // 'codeBlock',
                                //     'h2',
                                //     'h3',
                                //     'italic',
                                //     // 'link',
                                //  'orderedList',
                                //     // 'redo',
                                //     'strike',
                                //      'underline',
                                //     // 'undo',
                                // ]),

                            ]),
                        

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
        Notification::make()
        ->title('Updated successfully')
        ->success()
        ->send();

        return redirect()->route('product.index');

    }

    public function render(): View
    {
        return view('livewire.products.edit-product');
    }
}
