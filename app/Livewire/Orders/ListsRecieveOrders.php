<?php

namespace App\Livewire\Orders;

use Filament\Tables;
use App\Models\Order;
use Livewire\Component;
use Filament\Tables\Table;
use Filament\Actions\StaticAction;
use Filament\Tables\Actions\Action;
use Illuminate\Contracts\View\View;
use Filament\Support\Enums\MaxWidth;
use Filament\Forms\Contracts\HasForms;
use Filament\Actions\Action as FAction;
use Filament\Tables\Contracts\HasTable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Tables\Concerns\InteractsWithTable;

class ListsRecieveOrders extends Component implements HasForms, HasTable
{
    use InteractsWithForms;
    use InteractsWithTable;

    public function table(Table $table): Table
    {
        return $table
        ->query(Order::query()->where('status','receive'))
            ->columns([
                Tables\Columns\TextColumn::make('sku')
                ->label('SKU')
                ->searchable(isIndividual: true),
            Tables\Columns\TextColumn::make('user.name')
            ->label('Customer')
                // ->numeric()
                ->searchable()
                ->sortable(),
            Tables\Columns\TextColumn::make('phone')
                ->searchable(),
            Tables\Columns\TextColumn::make('address')
                ->searchable(),
            Tables\Columns\TextColumn::make('payment_method')
                ->searchable(),
            Tables\Columns\TextColumn::make('rider_name')
                ->searchable(),
            Tables\Columns\TextColumn::make('status')
                ->searchable(),
            Tables\Columns\TextColumn::make('created_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
               
            ])
            ->filters([
                //
            ])
            ->actions([

                
                Action::make('print')->icon('heroicon-m-printer')->label('Print')
                ->color('gray')
              
                    ->button()
                    ->outlined()
                    ->modalSubmitAction(false)
                    ->modalCancelAction(fn (StaticAction $action) => $action->label('Close'))
                    ->disabledForm()
                    ->url(function(Model $record){
                        return route('print-order',['record'=> $record->id]);
                    })
                    ->modalWidth(MaxWidth::SevenExtraLarge)
                ,
                Action::make('view')->icon('heroicon-m-eye')->label('View')
                ->color('gray')
              
                    ->button()
                    ->outlined()
                    ->modalSubmitAction(false)
                    ->modalCancelAction(fn (StaticAction $action) => $action->label('Close'))
                    ->disabledForm()
                    ->modalContent(fn (Model $record): View => view(
                        'livewire.orders.order-summary',
                        ['record' => $record],
                    ))
                    ->modalWidth(MaxWidth::SevenExtraLarge)
                    ,

                                Action::make('edit')
                ->icon('heroicon-m-pencil')

                ->label('Manage')
                ->button()
                ->color('gray')

                ->tooltip('Manage Order Here')
                ->url(fn (Model $record): string => route('order-manage.edit', ['record' => $record])),

                Tables\Actions\DeleteAction::make()->button()
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    //
                ]),
            ]);
    }


   
    public function render(): View
    {
        return view('livewire.orders.lists-recieve-orders');
    }
}
