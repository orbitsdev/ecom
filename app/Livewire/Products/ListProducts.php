<?php

namespace App\Livewire\Products;

use Filament\Tables;
use App\Models\Product;
use Livewire\Component;
use Filament\Tables\Table;
use Filament\Actions\StaticAction;
use Filament\Tables\Actions\Action;
use Illuminate\Contracts\View\View;
use Filament\Support\Enums\MaxWidth;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Contracts\HasTable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Tables\Concerns\InteractsWithTable;

class ListProducts extends Component implements HasForms, HasTable
{
    use InteractsWithForms;
    use InteractsWithTable;

    public function table(Table $table): Table
    {
        return $table
            ->query(Product::query())
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('sku')
                    ->label('SKU')
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('price')
                    ->label('price')
                    ->searchable(isIndividual: true)->sortable(),
                    
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),

            ])
            ->headerActions([
                Action::make('create')
                    ->icon('heroicon-m-plus')
                    ->label('Create')
                    ->button()

                    ->url(fn (): string => route('product.create'))
            ])
            ->filters([
                //
            ])
            ->actions([
                Action::make('view')
                    ->icon('heroicon-m-eye')
                    ->button()
                    // ->slideOver()
                    ->color('gray')
                    ->action(fn (Product $record) => $record)
                    ->modalContent(fn (Product $record): View => view(
                        'livewire.products.product-view',
                        ['record' => $record],
                    ))
                    ->disabledForm()
                    ->modalSubmitAction(false) 
                    ->modalCancelAction(fn (StaticAction $action) => $action->label('Close'))
                    ->modalWidth(MaxWidth::SevenExtraLarge)
                    ,
                Action::make('edit')
                    ->icon('heroicon-m-pencil')

                    ->label('Edit')
                    ->button()
                    ->color('gray')

                    ->tooltip('Modify Details Here')
                    ->url(fn (Model $record): string => route('product.edit', ['record' => $record])),
                Tables\Actions\DeleteAction::make()->button()
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ])->label('Actions'),
            ]);
    }

    public function render(): View
    {
        return view('livewire.products.list-products');
    }
}
