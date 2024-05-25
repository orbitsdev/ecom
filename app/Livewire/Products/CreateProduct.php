<?php

namespace App\Livewire\Products;

use Filament\Forms;
use App\Models\Product;
use Livewire\Component;
use Filament\Forms\Form;
use Filament\Support\RawJs;
use Illuminate\Contracts\View\View;
use Filament\Forms\Components\Section;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\Textarea;
use Filament\Notifications\Notification;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Concerns\InteractsWithForms;
use Awcodes\FilamentTableRepeater\Components\TableRepeater;

class CreateProduct extends Component implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill();
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

                                // Forms\Components\TextInput::make('sku')
                                //     ->label('SKU')
                                //     ->maxLength(191)
                                //     ->required(),
                               




                                // RichEditor::make('description')
                                
                                //     ->toolbarButtons([

                                //         'blockquote',
                                //         'bold',
                                //         'bulletList',
                                //         'codeBlock',
                                //         'h2',
                                //         'h3',
                                //         'italic',
                                //         'link',
                                //         'orderedList',
                                //         'redo',
                                //         'strike',
                                //         // 'underline',
                                //         // 'undo',
                                //     ]),

                                Textarea::make('description')
                                ->required()
                                ->rows(5)
                                ->autoSize()



                            ]),


                    ])->columnSpan(['lg' => 2]),
                Forms\Components\Group::make()
                    ->schema([
                        Section::make('Featured Image ')
                            // ->extraAttributes(['style' => 'background-color:#f3f4f6; border: 1px none; '])
                            ->schema([
                                FileUpload::make('image')
                                ->image()

                                    ->required()
                                    ->preserveFilenames()
                                    ->maxSize(200000)
                                    ->label('Image')
                                    ->disk('public')
                                    ->directory('products'),
                            ]),
                       


                    ])->columnSpan(['lg' => 1]),




            ])
            ->columns(3)


            ->statePath('data')
            ->model(Product::class);
    }

    public function create()
    {
        $data = $this->form->getState();

        $record = Product::create($data);

        $this->form->model($record)->saveRelationships();

        Notification::make()
        ->title('Created successfully')
        ->success()
        ->send();

        return redirect()->route('product.edit',['record'=> $record])->with('success', 'Poduct successfully created! Please complete additional product details');
    }

    public function render(): View
    {
        return view('livewire.products.create-product');
    }
}
