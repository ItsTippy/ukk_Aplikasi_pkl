<?php

namespace App\Filament\Resources;

use Illuminate\Validation\Rule;
use Filament\Forms\Get;
use App\Filament\Resources\PklResource\Pages;
use App\Filament\Resources\PklResource\RelationManagers;
use App\Models\Pkl;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PklResource extends Resource
{
    protected static ?string $model = Pkl::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard';
    protected static ?string $navigationLabel = 'Data Siswa PKL';
   



    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('siswa_id')
                    ->label('Siswa')
                    ->relationship('siswa', 'nama')
                    ->preload()
                    ->searchable()
                    ->required()
                    ->rules(function (Get $get, $context, $record) {
                        return [
                            Rule::unique('pkls', 'siswa_id')->ignore($record?->id),
                        ];
                    })
                    ->validationMessages([
                        'unique' => 'Siswa ini sudah terdaftar PKL.',
                    ]),
                 Forms\Components\Select::make('industri_id')
                    ->label('Industri')
                    ->relationship('industri', 'nama')
                    ->searchable()
                    ->preload()
                    ->required(),
                Forms\Components\Select::make('guru_id')
                    ->label('Guru Pembimbing')
                    ->relationship('guru', 'nama')
                    ->preload()
                    ->searchable()
                    ->required(),
                Forms\Components\DatePicker::make('mulai')
                    ->required(),
                Forms\Components\DatePicker::make('selesai')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            Tables\Columns\TextColumn::make('siswa.nama')
                ->label('Nama Siswa')
                ->searchable()
                ->sortable(),
        
            Tables\Columns\TextColumn::make('industri.nama')
                ->label('Industri')
                ->searchable()
                ->sortable(),
        
            Tables\Columns\TextColumn::make('guru.nama')
                ->label('Guru Pembimbing')
                ->searchable()
                ->sortable(),
        
            Tables\Columns\TextColumn::make('mulai')
                ->date()
                ->sortable(),
        
            Tables\Columns\TextColumn::make('selesai')
                ->date()
                ->sortable(),

                Tables\Columns\TextColumn::make('durasi')
                ->label('Durasi')
                ->getStateUsing(function (Pkl $record) {
                    if ($record->mulai && $record->selesai) {
                        return \Carbon\Carbon::parse($record->mulai)
                            ->diffInDays(\Carbon\Carbon::parse($record->selesai)) . ' hari';
                    }
                    return '-';
                })
                ->sortable(),    
        
            Tables\Columns\TextColumn::make('created_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
        
            Tables\Columns\TextColumn::make('updated_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
        ])
        
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManagePkls::route('/'),
        ];
    }
}
