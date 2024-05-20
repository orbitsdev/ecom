<?php

namespace App\Livewire\Products;

use Filament\Forms;
use App\Models\Product;
use Livewire\Component;
use Filament\Forms\Form;
use Illuminate\Contracts\View\View;
use Filament\Forms\Components\Section;
use Filament\Forms\Contracts\HasForms;
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

                                Forms\Components\TextInput::make('sku')
                                    ->label('SKU')
                                    ->maxLength(191)
                                    ->required(),





                                RichEditor::make('description')
                                    ->toolbarButtons([

                                        'blockquote',
                                        'bold',
                                        'bulletList',
                                        'codeBlock',
                                        'h2',
                                        'h3',
                                        'italic',
                                        'link',
                                        'orderedList',
                                        'redo',
                                        'strike',
                                        // 'underline',
                                        // 'undo',
                                    ]),



                            ]),


                    ])->columnSpan(['lg' => 2]),
                Forms\Components\Group::make()
                    ->schema([
                        Section::make('Product Details')
                        // ->extraAttributes(['style' => 'background-color:#f3f4f6; border: 1px none; '])
                            ->schema([
                                FileUpload::make('image')

                                    ->required()
                                    ->preserveFilenames()
                                    ->maxSize(200000)
                                    ->label('Featured Image')
                                    ->disk('public')
                                    ->directory('products'),
                            ]),
                        Section::make('Variant Details')
                        // ->extraAttributes(['style' => 'background-color:#f3f4f6; border: 1px none; '])
                            ->schema([

                                TableRepeater::make('product_variants')
                                ->withoutHeader()
                                ->columnWidths([
                                    'name' => '200px',
                                    'image' => '100px',
                                ])
                                ->relationship('variants')
    ->schema([
        Forms\Components\TextInput::make('name')
        ->maxLength(191)
        ->required(),


        FileUpload::make('image')
        ->required()
        ->preserveFilenames()
        ->maxSize(200000)
        ->label('Featured Image')
        ->disk('public')
        ->directory('products'),
    ])
    ->columnSpan('full')
                                // FileUpload::make('image')

                                //     ->required()
                                //     ->preserveFilenames()
                                //     ->maxSize(200000)
                                //     ->label('Featured Image')
                                //     ->disk('public')
                                //     ->directory('products'),
                            ]),

                    ])->columnSpan(['lg' => 1]),




            ])
            ->columns(3)
            ->statePath('data')
            ->model($this->record);
    }

    public function save(): void
    {
        $data = $this->form->getState();
        $this->record->update($data);
    }

    public function render(): View
    {
        return view('livewire.products.edit-product');
    }
}
