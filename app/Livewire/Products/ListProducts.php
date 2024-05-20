<?php

namespace App\Livewire\Products;

use Filament\Tables;
use App\Models\Product;
use Livewire\Component;
use Filament\Tables\Table;
use Filament\Tables\Actions\Action;
use Illuminate\Contracts\View\View;
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
                Action::make('edit')
                    ->icon('heroicon-m-pencil')

                    ->label('Edit')
                    ->button()
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
