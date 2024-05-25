<?php

namespace App\Livewire\Users;

use App\Models\User;
use Filament\Tables;
use Livewire\Component;
use Filament\Tables\Table;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Hash;
use Filament\Forms\Components\Select;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Contracts\HasTable;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Rawilk\FilamentPasswordInput\Password;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Tables\Concerns\InteractsWithTable;

class ListUsers extends Component implements HasForms, HasTable
{
    use InteractsWithForms;
    use InteractsWithTable;


    public function userForm() :array {
        return [
            TextInput::make('name')
                ->required()
                ->maxLength(255),
            Select::make('role')
                ->options([
                    'Admin' => 'Admin',
                    'Client' => 'Client',

                ])->default('Client'),
            TextInput::make('email')
                ->required()
                ->email()
                ->unique(ignoreRecord: true)
                ->maxLength(255),
            Password::make('password')
            ->label(fn(String $operation)=> $operation == 'Create' ? 'Password' : 'New Password' )
            ->password()
            ->dehydrateStateUsing(fn(String $state)=> Hash::make($state) )
            ->dehydrated(fn(?string $state)=> filled($state))
                ->required(fn(string $operation)=> $operation ==='create')
                ->unique(ignoreRecord: true)
                ->maxLength(255),

                FileUpload::make('profile_photo_path')
                    ->image()
                ->required()
                ->preserveFilenames()
                ->maxSize(200000)
                ->label('Profile')
                ->disk('public')
                ->directory('users'),
            // ...
                ];
    }
    public function table(Table $table): Table
    {
        return $table
            ->query(User::query())
            ->columns([
                Tables\Columns\ImageColumn::make('profile_photo_path')
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),

                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('role')
                    ->searchable()
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Admin' => 'info',
                        'Client' => 'success',

                        default => 'gray',
                    }),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),




            ])

            ->headerActions([
                CreateAction::make()
                    ->form($this->userForm())->disableCreateAnother(),
            ])
            ->filters([

                SelectFilter::make('role')
                    ->options([
                        'Admin' => 'Admin',
                        'Client' => 'Client',

                    ],)
            ], layout: FiltersLayout::AboveContent)
            ->actions([
                Tables\Actions\EditAction::make()->button()->form($this->userForm()),
                Tables\Actions\DeleteAction::make()->button(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ])->label('Actions'),
            ]);
    }

    public function render(): View
    {
        return view('livewire.users.list-users');
    }
}
