<?php

namespace App\Livewire\Products;

use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Livewire\Component;
use Illuminate\Contracts\View\View;

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
                Forms\Components\TextInput::make('name')
                    ->maxLength(191),
                Forms\Components\TextInput::make('sku')
                    ->label('SKU')
                    ->maxLength(191),
                Forms\Components\Textarea::make('image')
                    ->columnSpanFull(),
            ])
            ->statePath('data')
            ->model(Product::class);
    }

    public function create(): void
    {
        $data = $this->form->getState();

        $record = Product::create($data);

        $this->form->model($record)->saveRelationships();
    }

    public function render(): View
    {
        return view('livewire.products.create-product');
    }
}